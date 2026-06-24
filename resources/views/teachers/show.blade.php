@extends('layout')
@section('content')

<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      Teachers Page
    </div>
    <div class="card-body">
      <h5 class="card-title">
        Name: {{ $teachers->name }}
      </h5>
      <p class="card-text">
        Address: {{ $teachers->address }}
      </p>
      <p class="card-text">
        Mobile: {{ $teachers->mobile }}
      </p>
      <hr>
      <a href="{{ url('/teachers') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
  </div>
</div>
@endsection