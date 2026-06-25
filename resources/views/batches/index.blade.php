@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Batches Applications</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('batches/create') }}"
           class="btn btn-success btn-sm">
            Add New Batch
        </a>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Batch Name</th>
                <th>Courses</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            @foreach($batches as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    {{ optional($item->course)->name }}
                </td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->time }}</td>
                <td>
                    <a href="{{ url('batches/' . $item->id) }}"
                       class="btn btn-info btn-sm">
                        View
                    </a>
                    <a href="{{ url('batches/' . $item->id . '/edit') }}"
                       class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ url('batches/' . $item->id) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete Batch?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection