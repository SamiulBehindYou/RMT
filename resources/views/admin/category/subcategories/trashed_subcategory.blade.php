@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Subcategory Trash</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>SL</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Deleted on</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($subcategories as $sl=>$subcategory)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $subcategory->rel_to_category->category_name }}</td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>{{ $subcategory->deleted_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('subcategory.trash.restore', $subcategory->id) }}" class="btn btn-success btn-sm">Restore</a>
                            <a href="{{ route('subcategroy.trash.delete', $subcategory->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
