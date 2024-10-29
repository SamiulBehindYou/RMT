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
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->number }}</td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">Message</th>
                        </tr>
                        <tr>
                            <td colspan="4">{{ $message->message }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
