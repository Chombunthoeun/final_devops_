<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\response;
use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): view
    {
        $courses = Course::all();
        return view ('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Course::create($input);
        return redirect('courses')->with('flash_message', 'Courses Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): view
    {
        $courses = Course::find($id);
        return view('courses.show')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): View
    {
        $courses = Course::find($id);
        return view('courses.edit')->with('courses', $courses);
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
        $courses = Course::find($id);
        $input = $request->all();
        $courses->update($input);
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
        Course::destroy($id);
        return redirect('courses')->with('flash_message', 'Courses deleted!'); 
    }
}
