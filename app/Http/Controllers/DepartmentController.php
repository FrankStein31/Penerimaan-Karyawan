<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentQuestion;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'description' => 'required|string',
            'questions' => 'required|array|size:10',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ]);

        $department = Department::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        foreach ($request->questions as $questionData) {
            $department->questions()->create($questionData);
        }

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        $department->load('questions');
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,' . $department->id,
            'description' => 'required|string',
            'questions' => 'required|array|size:10',
            'questions.*.question' => 'required|string',
            'questions.*.option_a' => 'required|string',
            'questions.*.option_b' => 'required|string',
            'questions.*.option_c' => 'required|string',
            'questions.*.option_d' => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ]);

        $department->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $department->questions()->delete();
        foreach ($request->questions as $questionData) {
            $department->questions()->create($questionData);
        }

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}