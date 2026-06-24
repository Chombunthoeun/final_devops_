<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\response;
use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::all();
        return view ('teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        teacher::create($input);
        return redirect('teachers')->with('flash_message', 'Teacher Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): view
    {
        $teachers = Teacher::find($id);
        return view('teachers.show')->with('teachers', $teachers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): View
    {
        $teachers = Teacher::find($id);
        return view('teachers.edit')->with('teachers', $teachers);
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
        $teachers = Teacher::find($id);
        $input = $request->all();
        $teachers->update($input);
        return redirect('teachers')->with('flash_message', 'Teachers Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id): RedirectResponse
    {
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message', 'Teachers deleted!'); 
    }
}
