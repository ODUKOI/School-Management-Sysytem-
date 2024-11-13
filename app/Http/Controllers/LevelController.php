<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all(); // Assuming you have a Level model for the levels and sections
        return view('backend.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'level_name' => 'required|string|max:255',
            'section' => 'required|string|in:O-Level,A-Level', // Only allow O-Level or A-Level
        ]);

        // Using 'new Level()' to create a new level and save it
        $level = new Level();
        $level->level_name = $request->level_name;
        $level->section = $request->section;
        $level->save(); // Save to the database

        // Redirect back with a success message
        return redirect()->route('levels.create')->with('success', 'Level added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('backend.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'level_name' => 'required|string|max:255',
            'section' => 'required|string|in:O-Level,A-Level', // Ensure valid section
        ]);

        // Find the level by ID and update it
        $level = Level::findOrFail($id);
        $level->level_name = $request->level_name;
        $level->section = $request->section;
        $level->save(); // Save the updated data

        // Redirect back with success message
        return redirect()->route('levels.index')->with('success', 'Level updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the level by ID
        $level = Level::findOrFail($id);

        // Delete the level
        $level->delete();

        // Redirect with a success message
        return redirect()->route('levels.index')->with('success', 'Level deleted successfully!');
    }
}
