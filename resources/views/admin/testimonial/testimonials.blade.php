@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Testimonials</h3>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonials as $sl=>$testimonial)
                            <tr>
                                <td>{{ $sl + 1 }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->role }}</td>
                                <td><img src="{{ asset('uploads/testimonials/').'/'.$testimonial->image }}" alt=""></td>
                                <td class="text-wrap">{{ $testimonial->message }}</td>
                                <td class="text-{{ $testimonial->status == 0 ? 'success':'danger' }}">{{ $testimonial->status == 0 ? 'Active':'Not Active' }}</td>
                                <td>
                                    <a href="{{ route('testimonial.status', $testimonial->id) }}" class="btn btn-facebook">Change status</a>
                                    <a href="{{ route('testimonial.delete', $testimonial->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"><h5>No Testimonials!</h5></td>
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
                <h3 class="text-white text-center">Add Testimonial</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Role</label>
                        <input type="text" name="role" class="form-control">
                        @error('role')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                        <img id="img" class="mt-3 rounded" width="150"><br>
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Message</label>
                        <textarea name="message" id=""  rows="5" class="form-control"></textarea>
                        @error('message')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
