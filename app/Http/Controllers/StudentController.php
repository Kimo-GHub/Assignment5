<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //
        $query = Student::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('min_age')) {
            $query->where('age', '>=', $request->min_age);
        }

        if ($request->filled('max_age')) {
            $query->where('age', '<=', $request->max_age);
        }

        $students = $query->get();

        if ($request->ajax()) {
            return view('students.partials.student_rows', compact('students'))->render();
        }

        return view('students.index', compact('students'));
    }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:50',
            'age' => 'required|integer|min:1'
        ]);
        Student::create([
            'name' => $request->name,
            'age' => $request->age
        ]);
        return redirect()->route('index')->with('success','Student added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = Student::findOrFail($id);
        return view('show', compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::findOrFail($id);
        return view('edit', compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:50',
            'age' => 'required|integer|min:1'
        ]);
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'age' => $request->age
        ]);
        return redirect()->route('index')->with('success','Student Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('index')->with('success', 'Student deleted successfully.');

    }
}
