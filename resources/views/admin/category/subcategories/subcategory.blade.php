@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Sub Category Table</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr>
                        <th width='30'><p>All </p><input type="checkbox" name="selection"></th>
                        <th>SL</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Products</th>
                        <th>Created on</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($subcategories as $sl=>$subcategory)
                    <tr>
                        <td><input type="checkbox" name="selection"></td>
                        <td>{{ $sl+1 }}</td>
                        <td>
                            @if ($subcategory->rel_to_category != null)
                                {{ $subcategory->rel_to_category->category_name }}
                            @else
                                <span class="text-danger">Category Deleted!</span>
                            @endif
                        </td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>{{ $subcategory->products == null ? 'No Products':$subcategory->products }}</td>
                        <td>{{ $subcategory->created_at }}</td>
                        <td>
                            <a href="{{ route('subcategory.delete', $subcategory->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center"><h3>No data to show</h3></td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
