@extends('layout')
@section('content')

<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      Students Page
    </div>
    <div class="card-body">
      <h5 class="card-title">
        Name: {{ $students->name }}
      </h5>
      <p class="card-text">
        Address: {{ $students->address }}
      </p>
      <p class="card-text">
        Mobile: {{ $students->mobile }}
      </p>
      <hr>
      <a href="{{ url('/students') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
  </div>
</div>

@endsection