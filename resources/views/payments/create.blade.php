@extends('layout')
@section('content')

    <div class="card">
    <div class="card-header">
        <h4>Payments</h4>
    </div>
    <div class="card-body">
    <form action="{{ url('payments') }}" method="POST">
    @csrf
    <label>Payment No</label>
    <input type="text" name="payment_no" class="form-control">
    <label>Enrollment</label>
    <select name="enrollment_id" class="form-control">
    @foreach($enrollments as $enroll)
    <option value="{{ $enroll->id }}">
        {{ $enroll->enroll_no }}
    </option>
    @endforeach
    </select>
    <label>Amount</label>
    <input type="number" name="amount" class="form-control">
    <label>Payment Date</label>
    <input type="date" name="payment_date" class="form-control">
    <label>Method</label>
    <select name="method" class="form-control">
        <option value="cash">Cash</option>
        <option value="bank">Bank</option>
        <option value="online">Online</option>
    </select>
    <label>Remarks</label>
    <textarea name="remarks" class="form-control"></textarea>
    <br>
    <button class="btn btn-success">Save</button>
    </form>
    </div>
    </div>

@endsection