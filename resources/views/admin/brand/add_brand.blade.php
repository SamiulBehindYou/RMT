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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $sl=>$brand)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $brand->brand }}</td>
                            <td>{{ $brand->created_at->diffForHumans() }}</td>
                        </tr>

                        @empty
                        <tr>
                            <td></td>
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
                <h3 class="text-center text-white">Add Brand</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Brand name</label>
                        <input type="text" name="brand" class="form-control">
                        @error('brand_name')
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
