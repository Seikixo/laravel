<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortColumn = $request->input('sort', 'name');
        $sortDirection = $request->input('direction', 'asc');

        $sectionFilter = $request->input('section');
        $yearFilter = $request->input('year');

        Log::info('Year Filter:', ['year' => $yearFilter]);
        Log::info('Section Filter:', ['section' => $sectionFilter]);

        $sections = Student::select('section')->distinct()->get();
        $years = Student::select('year')->distinct()->get();

        $students = Student::withAvgGrade()
            ->filterBySection($sectionFilter)
            ->filterByYear($yearFilter)
            ->search($search)
            ->orderBy($sortColumn, $sortDirection)
            ->paginate(5);

        return view('pages.home', [
            'students' => $students, 
            'sort' => $sortColumn, 
            'direction' => $sortDirection,
            'sections' => $sections,
            'selectedSection' => $sectionFilter,
            'years' => $years,
            'selectedYear' => $yearFilter,
        ]);
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
    public function store(StudentRequest $request)
    {
        $validated = $request->validated();

        $student = Student::create([
            'name' => $validated['name'],
            'section' => $validated['section'],
            'year' => $validated['year'],
        ]);

        $student->addGrades($validated['grades']);
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
    public function update(StudentRequest $request, Student $student)
    {
       $validated = $request->validated();
       

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
