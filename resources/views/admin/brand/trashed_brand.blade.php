@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Brand Trash</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>SL</th>
                        <th>Brand</th>
                        <th>Deleted on</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($brands as $sl=>$brand)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $brand->brand }}</td>
                        <td>{{ $brand->deleted_at }}</td>
                        <td>
                            <a href="{{ route('brand.trash.restore', $brand->id) }}" class="btn btn-success btn-sm">Restore</a>
                            <a href="{{ route('brand.trash.delete', $brand->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><h3>No trash found!</h3></td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
