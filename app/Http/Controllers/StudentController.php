<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Level;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Student::with('level')->get();  // Eager load the 'level' relationship
        return view('backend.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('backend.student.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'index_number' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|max:10',
                'section' => 'nullable|string|max:50',
                'level_id' => 'required|exists:levels,id', // Validate level_id
                'upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
            ]);

            // Generate a unique admission ID (ADM followed by timestamp and a random number)
            $admissionId = 'ADM' . time() . rand(1000, 9999);

            // Fetch the level based on level_id
            $level = Level::find($request->level_id);

            // If the level does not exist, return with error message
            if (!$level) {
                return redirect()->route('student.create')->with('error', 'Selected level does not exist.');
            }

            // Create a new student record
            $student = new Student();
            $student->name = $validatedData['name'];
            $student->index_number = $validatedData['index_number'];
            $student->date_of_birth = $validatedData['date_of_birth'];
            $student->gender = $validatedData['gender'];
            $student->section = $validatedData['section'];
            $student->level_id = $validatedData['level_id']; // Store the level_id
            $student->level = $level->level_name; // Store the level_name

            // Handle file upload
            if ($request->hasFile('upload')) {
                $fileName = time() . '_' . $request->file('upload')->getClientOriginalName();
                $request->file('upload')->move(public_path('uploads'), $fileName);
                $student->upload = $fileName; // Store the uploaded file name
            }

            // Set the admission ID
            $student->admission_id = $admissionId;

            // Save the student record to the database
            $student->save();

            // If the student is created successfully, redirect with success message
            return redirect()->route('student.create')->with('success', 'Student added successfully.');
        } catch (\Exception $e) {
            // If there is any error, redirect with an error message
            return redirect()->route('student.create')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('backend.student.show', compact('student'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the student and the levels
        $student = Student::findOrFail($id);
        $levels = Level::all();  // Retrieve all levels to populate the dropdown

        return view('backend.student.edit', compact('student', 'levels'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'index_number' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|max:10',
                'level_id' => 'required|exists:levels,id',  // Ensure the level exists
                'upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example for file upload
            ]);

            // Find the student by ID
            $student = Student::findOrFail($id);

            // Fetch the selected level
            $level = Level::find($request->level_id);
            if (!$level) {
                return redirect()->route('student.edit', $student->id)->with('error', 'Selected level does not exist.');
            }

            // Update the student record
            $student->name = $validatedData['name'];
            $student->index_number = $validatedData['index_number'];
            $student->date_of_birth = $validatedData['date_of_birth'];
            $student->gender = $validatedData['gender'];
            $student->level_id = $validatedData['level_id'];  // Update level_id
            $student->level = $level->level_name;  // Store the level_name in the student table

            // Handle the file upload if exists
            if ($request->hasFile('upload')) {
                // Remove old file if it exists
                if ($student->upload) {
                    $existingFile = public_path('uploads/' . $student->upload);
                    if (file_exists($existingFile)) {
                        unlink($existingFile);  // Delete the old file
                    }
                }

                // Save the new uploaded file
                $fileName = time() . '_' . $request->file('upload')->getClientOriginalName();
                $request->file('upload')->move(public_path('uploads'), $fileName);
                $student->upload = $fileName;
            }

            // Save the updated student record
            $student->save();

            // If the student is updated successfully, redirect with a success message
            return redirect()->route('student.edit', $student->id)->with('success', 'Student updated successfully.');
        } catch (\Exception $e) {
            // If there is any error, redirect with an error message
            return redirect()->route('student.edit', $id)->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
