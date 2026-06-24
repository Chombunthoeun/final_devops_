@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Payment Details</h4>
    </div>
    <div class="card-body">
    <p>Payment No: {{ $payment->payment_no }}</p>
    <p>Student: {{ optional($payment->enrollment->student)->name }}</p>
    <p>Amount: ${{ $payment->amount }}</p>
    <p>Date: {{ $payment->payment_date }}</p>
    <p>Method: {{ $payment->method }}</p>
    <p>Remarks: {{ $payment->remarks }}</p>
    <a href="{{ url('payments') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

@endsection