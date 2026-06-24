<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
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
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_message', 'Student Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): view
    {
        $students = Student::find($id);
        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): View
    {
        $students = Student::find($id);
        return view('students.edit')->with('students', $students);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $students = Student::find($id);
        $input = $request->all();
        $students->update($input);
        return redirect('students')->with('flash_message', 'students Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Students deleted!'); 
    }
}
