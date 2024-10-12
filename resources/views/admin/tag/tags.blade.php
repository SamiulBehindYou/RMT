@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Add Brand</h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Brand Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $sl=>$tag)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('brand.remove', $tag->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="4"><h3>No Data found</h3></td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Add Tag</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tag name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
