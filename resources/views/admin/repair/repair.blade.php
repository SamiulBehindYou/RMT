@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-8">
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
                            <th>Status</th>
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
                                <td class="text-{{ $repair->status == 0 ? 'success':'danger' }}">{{ $repair->status == 0 ? 'Active':'Not active' }}</td>
                                <td>
                                    <a href="{{ route('repair.status', $repair->id) }}" class="btn btn-facebook">Change status</a>
                                    <a href="{{ route('repair.delete', $repair->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"><h4 class="text-center">No data found!</h4></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Add Repair Services</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('repair.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img id="blah" width="150" class="rounded mt-2">
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                        @error('description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
