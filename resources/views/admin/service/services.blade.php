@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Services</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Meta title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $sl=>$service)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ ucfirst($service->title) }}</td>
                                <td><img src="{{ asset('uploads/icons/'.$service->icon) }}" alt=""></td>
                                <td class="text-wrap">{{ ucfirst($service->meta_title) }}</td>
                                <td class="text-{{ $service->status == 0 ? 'success':'danger' }}">{{ $service->status == 0 ? 'Active':'Not active' }}</td>
                                <td>
                                    <a href="{{ route('service.status', $service->id) }}" class="btn btn-facebook">Change status</a>
                                    <a href="{{ route('service.delete', $service->id) }}" class="btn btn-danger">Delete</a>
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
                <h3 class="text-center text-white">Add Services</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Icon</label>
                        <input type="file" name="icon" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img id="blah" width="150" class="rounded mt-2">
                        @error('icon')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Meta title</label>
                        <textarea name="meta_title" rows="5" class="form-control"></textarea>
                        @error('meta_title')
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
