@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Repair Services</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($repairs as $sl=>$repair)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $repair->title }}</td>
                                <td><img src="{{ asset('uploads/repair/'.$repair->image) }}" alt=""></td>
                                <td class="text-wrap">{{ $repair->description }}</td>
                                <td>
                                    <a href="{{ route('repair.restore', $repair->id) }}" class="btn btn-success">Restore</a>
                                    <a href="{{ route('repair.per_delete', $repair->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"><h4 class="text-center">No data on Trash!</h4></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
