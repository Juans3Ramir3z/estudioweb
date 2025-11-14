<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id','desc')->get();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|String|max:255',
            'email'=>'required|email|unique:students,email',
            'age'=>'required|integer|min:0'
        ]);

        Student::create($data);
        return redirect()->route('students.index')->with('success','Estudiante creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student=Student::findOrFail($id);
        return view ('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student=Student::findOrFail($id);
        return view ('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student=Student::findOrFail($id);

        $data=$request->validate([
            'name'=>'required|String|max:255',
            'email'=>'required|email|unique:students,email'.$student->id,
            'age'=>'required|integer|min:0'
        ]);

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado');
    }
}


