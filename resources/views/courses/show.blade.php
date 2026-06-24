@extends('layout')
@section('content')

<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      Courses Page
    </div>
    <div class="card-body">
      <h5 class="card-title">
        Course Name: {{ $courses->name }}
      </h5>
      <p class="card-text">
        Syllabus: {{ $courses->syllabus }}
      </p>
      <p class="card-text">
        Syllabus: {{ $courses->syllabus }}
      </p>
      <hr>
      <a href="{{ url('/courses') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
  </div>
</div>

@endsection