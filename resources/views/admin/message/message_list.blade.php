@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Messages</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr class="">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Sent at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $sl=>$message)
                            <tr class="{{ $message->status == 0 ? 'bg-primary text-white':'' }}">
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->number }}</td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('single.message', $message->id) }}" class="btn btn-facebook">View</a>
                                    <a href="{{ route('delete.message', $message->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="6"><h4 class="text-center">No Messages!</h4></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
