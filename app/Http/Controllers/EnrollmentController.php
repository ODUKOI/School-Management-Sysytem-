<?php
// app/Http/Controllers/EnrollmentController.php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        // Fetch students with their enrolled subjects
        $students = Student::with('subjects')->get();

        // Pass the data to the view
        return view('backend.enrollments.index', compact('students'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();

        // Pass them to the view
        return view('backend.enrollments.create', compact('students', 'subjects'));
    }

    // Method to enroll a student in a subject
    public function enroll(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Enrollment::create([
            'student_id' => $validated['student_id'],
            'subject_id' => $validated['subject_id'],
        ]);

        return redirect()->route('enroll.create')->with('success', 'Student enrolled successfully.');
    }

    // Method to view all students enrolled in a subject
    public function showSubjectEnrollments($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $students = $subject->enrollments()->with('student')->get()->pluck('student');

        return view('subjects.enrollment_list', compact('subject', 'students'));
    }
    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $subjects = Subject::all();

        return view('backend.enrollments.edit', compact('enrollment','students','subjects'));
    }

    public function update(Request $request, $id)
    {
    $validated = $request->validate([
    'student_id' => 'required|exists:students,id',
    'subject_id' => 'required|exists:subjects,id',
    ]);

    $enrollment = Enrollment::findOrFail($id);
    $enrollment->update([
        'student_id' => $validated['student_id'],
        'subject_id' => $validated['subject_id'],
    ]);

    return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
}

public function destroy($id)
{
    $enrollment = Enrollment::findOrFail($id);
    $enrollment->delete();

    return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
}

}
