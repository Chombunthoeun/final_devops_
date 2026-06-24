<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Batch;

class EnrollmentController extends Controller
{
    public function index(): View
    {
        $enrollments = Enrollment::with(['student','batch'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create(): View
    {
        $students = Student::all();
        $batches = Batch::all();
        return view('enrollments.create', compact('students','batches'));
    }

    public function store(Request $request): RedirectResponse
    {
        Enrollment::create($request->all());
        return redirect('enrollments')->with('flash_message','Enrollment Added!');
    }

    public function show($id): View
    {
        $enrollment = Enrollment::with(['student','batch'])->find($id);
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit($id): View
    {
        $enrollment = Enrollment::find($id);
        $students = Student::all();
        $batches = Batch::all();
        return view('enrollments.edit',compact('enrollment','students','batches'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $enrollment = Enrollment::find($id);
        $enrollment->update($request->all());
        return redirect('enrollments')->with('flash_message','Updated!');
    }

    public function destroy($id): RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message','Deleted!');
    }
}