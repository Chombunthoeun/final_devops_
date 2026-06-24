@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Batch</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('batches/' . $batch->id) }}"
              method="POST">
            @csrf
            @method('PUT')
            <label>Batch Name</label>
            <input type="text"
                   name="name"
                   value="{{ $batch->name }}"
                   class="form-control">
            <label>Course</label>
            <select name="course_id"
                    class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ $course->id == $batch->course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <label>Start Date</label>
            <input type="date"
                   name="start_date"
                   value="{{ $batch->start_date }}"
                   class="form-control">
            <label>End Date</label>
            <input type="date"
                   name="end_date"
                   value="{{ $batch->end_date }}"
                   class="form-control">
            <label>Time</label>
            <input type="text"
                   name="time"
                   value="{{ $batch->time }}"
                   class="form-control">
            <br>
            <button class="btn btn-primary">
                Update Batch
            </button>
        </form>
    </div>
</div>

@endsection