<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('pages.home', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        return view('pages.add', ['student' => $student]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
        $validated = $request->validate([
        'name' => 'string',
        'section' => 'string',
        'year' => 'integer',
        'grades.*.english' => 'integer|min:0|max:100',
        'grades.*.math' => 'integer|min:0|max:100',
        'grades.*.science' => 'integer|min:0|max:100',
        'grades.*.history' => 'integer|min:0|max:100',
        ]);

        $student->create([
            'name' => $validated['name'],
            'section' => $validated['section'],
            'year' => $validated['year'],
        ]);


        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $student->load('grades');
        
        return view('pages.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
       $validated = $request->validate([
        'name' => 'string',
        'section' => 'string',
        'year' => 'integer',
        'grades.*.english' => 'integer|min:0|max:100',
        'grades.*.math' => 'integer|min:0|max:100',
        'grades.*.science' => 'integer|min:0|max:100',
        'grades.*.history' => 'integer|min:0|max:100',
       ]);
       

       $student->update([
            'name' => $validated['name'],
            'section' => $validated['section'],
            'year' => $validated['year'],
        ]);

        $student->updateGrades($validated['grades']);

       return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
