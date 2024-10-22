@extends('admin.layout')

@section('main')

<div class="row">
    <div class="col-md-12">

        {{------------------------- Add Product --------------------}}
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Add Product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                {{-- Row --}}
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="inputEmail4">Product Name</label>
                        <input type="text" class="form-control" placeholder="Product name" name="name">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Product ID</label>
                        <input type="text" class="form-control" placeholder="product_id" name="product_id">
                        @error('product_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                    </div>

                {{-- Row --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Purchase Price</label>
                            <input type="number" class="form-control" placeholder="Purchase Price" name="purchase">
                            @error('purchase')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Tags</label>
                                <select id="select" name="tag_id[]" class="demo-default" multiple placeholder="Select Tag">
                                    <option value="">Select Tag</option>
                                    <optgroup label="Tags">
                                        @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('tag_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Tax <small class="text-info">(If eligible)</small></label>
                            <input type="number" class="form-control" placeholder="tax" name="tax">
                            @error('tax')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                          </div>
                    </div>

            {{-- Row --}}
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Price</label>
                        <input type="number" class="form-control"  placeholder="Price" id="price" name="price">
                        @error('price')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Discount (%)</label>
                        <input type="number" class="form-control" placeholder="Discount" id="discount" onblur="dis()" name="discount">
                        @error('discount')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">After Discount</label>
                        <input type="number" readonly class="form-control bg-white" placeholder="After_discount" id="after_discount" name="after_discount">
                        @error('after_discount')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                    </div>

            {{-- Row --}}

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Brand</label>
                            <select name="brand" class="form-control select-search">
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Sub Category</label>
                            <select name="subcategory" class="form-control select-search">
                                <option value="">Select subcategory</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                @endforeach
                            </select>
                            @error('subcategory')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Made in</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Made_in" name="made_in">

                            @error('made_in')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

        {{-- Row --}}
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="inputCity">Short Description</label>
                        <textarea name="short_description" rows="12" class="form-control"></textarea>
                        @error('short_description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputCity">Product Image</label>
                            <input type="file" class="form-control" id="inputCity" name="image" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                            @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <div><img class="mt-2" id="img" width="142" height="142"/></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="summernote" rows="5" class="form-control"></textarea>
                        @error('description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <label class="form-check-label" for="gridCheck">
                            <input class="form-check-input" required type="checkbox" id="gridCheck">
                            I filled the form properly!
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                  </form>
            </div>
        </div>
    </div>
</div>

{{------------------------- Product Table ---------------------}}

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center">Products</h3>
            </div>
            <div class="card-body">
                <table id="datatable" style="width:100%" class="display table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Product_id</th>
                            <th>Price</th>
                            <th>Discount %</th>
                            <th>After Discount</th>
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
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>{{ $product->after_discount }}</td>
                            <td>{{ $product->rel_to_brand != null ? $product->rel_to_brand->brand:'Brand Deleted!' }}</td>
                            <td>{{ $product->rel_to_subcategory != null ? ($product->rel_to_subcategory->rel_to_category != null ? $product->rel_to_subcategory->rel_to_category->category_name:'Category deleted!'):'Category Not Available' }}</td>
                            <td>{{ $product->rel_to_subcategory != null ? $product->rel_to_subcategory->subcategory_name:'SubCategory deleted!' }}</td>
                            <td>{{ $product->made_in }}</td>
                            <td><img src="{{ asset('uploads/products/tumbnail/'.$product->image) }}"></td>
                            <td>{{ $product->tax != null ? $product->tax:'' }}<span class="text-danger">{{ $product->tax != null ? '':'Not Difined!' }}</span></td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="#" class="btn btn-facebook">Edit</a>
                                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="14"><h3>No Products</h3></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection


@section('footer')

<script>
function dis(){
    let price = document.getElementById("price").value;
    let discount = document.getElementById("discount").value;

    let total_discount = (discount/100)*price;
    let after_discount = price - total_discount;
    document.getElementById("after_discount").value = after_discount;
};
</script>

<script>
    let table = new DataTable('#datatable');
</script>


@endsection
