@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Payments</h2>
    </div>
    <div class="card-body">
    <a href="{{ url('payments/create') }}" class="btn btn-success btn-sm">
        Add Payment
    </a>
    <br><br>
    <table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Payment No</th>
        <th>Student</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Method</th>
        <th>Remarks</th>
        <th>Action</th>
    </tr>
    @foreach($payments as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->payment_no }}</td>
        <td>{{ optional($item->enrollment->student)->name }}</td>
        <td>${{ $item->amount }}</td>
        <td>{{ $item->payment_date }}</td>
        <td>{{ $item->method }}</td>
        <td>{{ $item->remarks }}</td>
        <td>
            <a href="{{ url('payments/' . $item->id) }}" class="btn btn-info btn-sm">View</a>
            <a href="{{ url('payments/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ url('payments/' . $item->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
            <a href="{{ url('/report/'.$item->id) }}"
                class="btn btn-secondary btn-sm"
                target="_blank">
                Print
            </a>
        </td>
    </tr>
    @endforeach
    </table>
    </div>
</div>

@endsection