@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Enrollment Page
    </div>
    <div class="card-body">
        <form action="{{ url('enrollments') }}" method="POST">
        @csrf
        <label>Enroll_No</label>
        <input type="text" name="enroll_no" class="form-control">
        <label>Student</label>
        <select name="student_id" class="form-control">
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
        <label>Batch</label>
        <select name="batch_id" class="form-control">
            @foreach($batches as $batch)
                <option value="{{ $batch->id }}">{{ $batch->name }}</option>
            @endforeach
        </select>
        <label>Join_Date</label>
        <input type="date" name="join_date" class="form-control">
        <label>Fee</label>
        <input type="number" name="fee" class="form-control">
        <br>
        <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection