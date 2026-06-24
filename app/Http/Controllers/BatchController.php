<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Models\Batch;
use App\Models\Course;

class BatchController extends Controller
{
    public function index(): View
    {
        $batches = Batch::with('courses')->get();
        return view('batches.index', compact('batches'));
    }

    public function create(): View
    {
        $courses = Course::all();
        return view('batches.create', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        Batch::create($request->all());
        return redirect('batches')->with('flash_message', 'Batch Added Successfully!');
    }

    public function show($id): View
    {
        $batch = Batch::with('course')->find($id);
        return view('batches.show', compact('batch'));
    }

    public function edit($id): View
    {
        $batch = Batch::find($id);
        $courses = Course::all();
        return view('batches.edit',compact('batch', 'courses'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $batch = Batch::find($id);
        $batch->update($request->all());
        return redirect('batches')->with('flash_message', 'Batch Updated Successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Batch Deleted Successfully!');
    }
}