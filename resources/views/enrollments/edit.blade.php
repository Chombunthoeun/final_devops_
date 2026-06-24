@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Edit Page</div>
        <div class="card-body">
            <form action="{{ url('enrollments/' . $enrollment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Enroll No</label>
            <input type="text" name="enroll_no"
                value="{{ $enrollment->enroll_no }}"
                class="form-control">
            <label>Student</label>
            <select name="student_id" class="form-control">
                @foreach($students as $student)
                <option value="{{ $student->id }}"
                    {{ $student->id == $enrollment->student_id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
                @endforeach
            </select>

            <label>Batch</label>
            <select name="batch_id" class="form-control">
            @foreach($batches as $batch)
                <option value="{{ $batch->id }}"
                    {{ $batch->id == $enrollment->batch_id ? 'selected' : '' }}>
                    {{ $batch->name }}
                </option>
            @endforeach
            </select>

            <label>Join Date</label>
            <input type="date" name="join_date"
                value="{{ $enrollment->join_date }}"
                class="form-control">

            <label>Fee</label>
            <input type="number" name="fee"
                value="{{ $enrollment->fee }}"
                class="form-control">

            <br>
            <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection