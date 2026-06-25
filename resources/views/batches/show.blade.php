@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Batch Detail</h4>
    </div>
    <div class="card-body">
        <h5>
            Batch Name:
            {{ $batch->name }}
        </h5>
        <p>
            Course:
            {{ optional($batch->course)->name }}
        </p>
        <p>
            Start Date:
            {{ $batch->start_date }}
        </p>
        <p>
            End Date:
            {{ $batch->end_date }}
        </p>
        <p>
            Time:
            {{ $batch->time }}
        </p>
        <a href="{{ url('batches') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>
</div>

@endsection