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
                <form action="#" method="POST">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="inputEmail4">Product Name</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Product name" name="name">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Product ID</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="product_id" name="product_id">
                        @error('product_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Brand</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="brand" name="brand">
                        @error('brand')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Sub Category</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="subcategory" name="subcategory">
                        @error('subcategory')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group col-md-3">
                        <label for="inputPassword4">Made in</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="made_in" name="made_in">
                        @error('made_in')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group col-md-3">
                        <label class="form-label">Tags</label>
                            <select id="select-tag" name="tag_id[]" class="demo-default" multiple placeholder="Select Tag">
                                <option value="">Select Tag</option>
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
                    </div>

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
                        <img class="mt-2" id="img" width="142" height="142" />
                        @error('image')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
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
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            Filled the form properly!
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
                <table id="dataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Product_id</th>
                            <th>Brand</th>
                            <th>SubCategory</th>
                            <th>MadeIn</th>
                            <th>Image</th>
                            <th>Tax</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
