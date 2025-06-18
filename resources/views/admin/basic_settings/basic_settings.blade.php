@extends('admin.layout')

@section('main')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Title</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('title') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
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
                <h3 class="text-center text-white">Tag Line</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tag.line') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Tag Line</label>
                        <input type="text" name="tag_line" class="form-control">
                        @error('tag_line')
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
                <h3 class="text-center text-white">Landing Image</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('landing.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Upload image <small class="text-danger">(Please use Squre size and background removed!)</small></label>
                        <input type="file" name="landing_image" class="form-control">
                        @error('landing_image')
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
</div>

{{-- Row --}}
<div class="row mt-4">

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Facebook</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.facebook') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Facebook</label>
                        <input type="text" name="facebook" class="form-control">
                        @error('facebook')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button> <a class="ml-3" href="{{ route('settings.facebook_status') }}"><i class="link-icon text-{{ $settings->facebook_status == 0 ? 'success':'danger' }}" data-feather="toggle-{{ $settings->facebook_status == 0 ? 'right':'left' }}"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Icon</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('icon') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Icon <small class="text-danger">(Please use background removed icon!)</small></label>
                        <input type="file" name="icon" class="form-control">
                        @error('icon')
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
                <h3 class="text-center text-white">Logo</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('logo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control">
                        @error('logo')
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
</div>

{{-- Row --}}
<div class="row mt-4">

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Twiter</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.twiter') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Twiter</label>
                        <input type="text" name="twiter" class="form-control">
                        @error('twiter')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button> <a class="ml-3" href="{{ route('settings.twiter_status') }}"><i class="link-icon text-{{ $settings->twiter_status == 0 ? 'success':'danger' }}" data-feather="toggle-{{ $settings->twiter_status == 0 ? 'right':'left' }}"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Instragram</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.instagram') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Instragram</label>
                        <input type="text" name="instagram" class="form-control">
                        @error('instagram')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button> <a class="ml-3" href="{{ route('settings.instagram_status') }}"><i class="link-icon text-{{ $settings->instagram_status == 0 ? 'success':'danger' }}" data-feather="toggle-{{ $settings->twiter_status == 0 ? 'right':'left' }}"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">YouTube</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.youtube') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">YouTube</label>
                        <input type="text" name="youtube" class="form-control">
                        @error('youtube')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Update</button> <a class="ml-3" href="{{ route('settings.youtube_status') }}"><i class="link-icon text-{{ $settings->youtube_status == 0 ? 'success':'danger' }}" data-feather="toggle-{{ $settings->twiter_status == 0 ? 'right':'left' }}"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Row --}}
<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">About us (Demo View)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 m-auto">
                        <h3 class="text-center">{{ $settings->about_title }}</h3>
                    </div>
                </div>
                <div>
                    {!! $settings->about_description !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Update About</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.about') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">About Tile</label>
                        <input type="text" name="about_title" value="{{ $settings->about_title }}" class="form-control">
                        @error('about_title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="summernote" rows="5" class="form-control">{{ $settings->about_description }}</textarea>
                        @error('description')
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
</div>
@endsection
