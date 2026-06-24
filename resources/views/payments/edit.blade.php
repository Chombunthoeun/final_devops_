@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit Payment</h4>
    </div>
    <div class="card-body">
    <form action="{{ url('payments/' . $payment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Payment No</label>
    <input type="text" name="payment_no"
        value="{{ $payment->payment_no }}"
        class="form-control">
    <label>Amount</label>
    <input type="number" name="amount"
        value="{{ $payment->amount }}"
        class="form-control">
    <label>Date</label>
    <input type="date" name="payment_date"
        value="{{ $payment->payment_date }}"
        class="form-control">
    <label>Method</label>
    <select name="method" class="form-control">
        <option value="cash" {{ $payment->method == 'cash' ? 'selected' : '' }}>Cash</option>
        <option value="bank" {{ $payment->method == 'bank' ? 'selected' : '' }}>Bank</option>
        <option value="online" {{ $payment->method == 'online' ? 'selected' : '' }}>Online</option>
    </select>
    <br>
    <button class="btn btn-primary">Update</button>
    </form>
    </div>
</div>

@endsection