@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Enrollment Page
    </div>
    <div class="card-body">
        <h5>
            Student:
            {{ optional($enrollment->student)->name }}
        </h5>
        <p>
            Course:
            {{ optional($enrollment->course)->name }}
        </p>
        <p>
            Date: {{ $enrollment->enroll_date }}
        </p>
        <p>
            Status: {{ $enrollment->status }}
        </p>
        <p>
            Remarks: {{ $enrollment->remarks }}
        </p>
        <a href="{{ url('enrollments') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>
</div>

@endsection