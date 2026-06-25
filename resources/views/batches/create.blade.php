@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Batches</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('batches') }}" method="POST">
            @csrf
            <label>Batch Name</label>
            <input type="text"
                   name="name"
                   class="form-control">
            <label>Course</label>
            <select name="course_id"
                    class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <label>Start Date</label>
            <input type="date"
                   name="start_date"
                   class="form-control">
            <label>End Date</label>
            <input type="date"
                   name="end_date"
                   class="form-control">
            <label>Time</label>
            <input type="text"
                   name="time"
                   class="form-control">
            <br>
            <button class="btn btn-success">
                Save Batch
            </button>
        </form>
    </div>
</div>

@endsection