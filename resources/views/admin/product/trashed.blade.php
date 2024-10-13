@extends('admin.layout')
@section('main')

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Products</h3>
            </div>
            <div class="card-body">
                <table id="{{ $products->count() > 0 ? 'datatable':'' }}" style="width:100%" class="display table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Product_id</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Made In</th>
                            <th>Image</th>
                            <th>Tax</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index=>$product)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->rel_to_brand->brand }}</td>
                            <td>{{ $product->rel_to_subcategory->rel_to_category->category_name }}</td>
                            <td>{{ $product->rel_to_subcategory->subcategory_name }}</td>
                            <td>{{ $product->made_in }}</td>
                            <td><img src="{{ asset('uploads/products/tumbnail/'.$product->image) }}"></td>
                            <td>{{ $product->tax != null ? $product->tax:'' }}<span class="text-danger">{{ $product->tax != null ? '':'Not Difined!' }}</span></td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('restore.product', $product->id) }}" class="btn btn-success">Restore</a>
                                <a href="{{ route('product.per.delete', $product->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11"><h3>No Products</h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
