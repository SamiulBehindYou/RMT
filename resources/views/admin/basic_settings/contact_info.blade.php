@extends('admin.layout')

@section('main')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Address</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('address') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control">
                        <small>Current: {{ $settings->address }}</small>
                        @error('address')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Email</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('email') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control">
                        <small>Current: {{ $settings->email }}</small>
                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Phone</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('phone') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control">
                        <small>Current: {{ $settings->phone }}</small>
                        @error('phone')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
