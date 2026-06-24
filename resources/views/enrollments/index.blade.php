@extends('layout')

@section('content')

<div class="card">

    <div class="card-header">
        <h2>Enrollment Application</h2>
    </div>

    <div class="card-body">

        <a href="{{ url('enrollments/create') }}" class="btn btn-success btn-sm">
            Add New
        </a>

        <br><br>

        <table class="table table-bordered">

            <tr>
                <th>#</th>
                <th>Enroll No</th>
                <th>Student</th>
                <th>Batch</th>
                <th>Join Date</th>
                <th>Fee</th>
                <th>Action</th>
            </tr>

            @foreach($enrollments as $item)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->enroll_no }}</td>
                <td>{{ optional($item->student)->name }}</td>
                <td>{{ optional($item->batch)->name }}</td>
                <td>{{ $item->join_date }}</td>
                <td>{{ $item->fee }}</td>

                <td>
                    <a href="{{ url('enrollments/' . $item->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ url('enrollments/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a>

                    <form action="{{ url('enrollments/' . $item->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </table>

    </div>

</div>

@endsection