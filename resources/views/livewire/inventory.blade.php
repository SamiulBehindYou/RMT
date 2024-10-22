<div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('quantity_add'))
                <div class="alert alert-success">
                    {{ session('quantity_add') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">New Quantity</h3>
                </div>
                <div class="card-body">
                    <form wire:submit='addQuantity' method="post">
                        <div class="form-group col-md-12 text-center">
                            <h5>Select product by single Name or ID <small class="text-danger">(Select single field)</small></h5><br>
                            @error('product_name')
                                <strong class="text-danger">Product Name or ID not selected!</strong>
                            @enderror
                            @error('product_id')
                                <strong class="text-danger">Product Name or ID not selected!</strong>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Product name</label>
                                <select id="select-product" wire:model="product_name" placeholder="Pick a Product">
                                    <option value="">Select a prodcut...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Product ID</label>
                                <select id="select-id" wire:model="product_id" placeholder="Pick a ID">
                                    <option value="">Select a ID...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="" class="form-label">Select Color <small class="text-secondary">(If eligible)</small></label>
                                <select id="select-color" wire:model="color_id" placeholder="Pick a Color">
                                    <option value="">Select a Color...</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label">Select Size <small class="text-secondary">(If eligible)</small></label>
                                <select id="select-size" wire:model="size_id" placeholder="Pick a Size">
                                    <option value="">Select a Size...</option>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label">New Quantity</label>
                                <input type="text" wire:model="quantity" class="form-control">
                                @error('quantity')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2 text-center">
                            <button wire:loading.remove wire:target='addQuantity()' type="submit" class="btn btn-primary btn-lg">Add</button>
                            <button wire:loading wire:target='addQuantity()' class="btn-custom border-0" type="button" disabled>
                                <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                Adding...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Inventory</h3>
                </div>
                <div class="card-body">
                    @if(session()->has('delete_entry'))
                        <div class="alert alert-info">
                            {{ session('delete_entry') }}
                        </div>
                    @endif
                    <table class="table text-center" id="datatableX">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product name</th>
                                <th>Product ID</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $sl=>$inventory)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $inventory->rel_to_product->name }}</td>
                                <td>{{ $inventory->rel_to_product->product_id }}</td>
                                <td><span class="text-{{ $inventory->rel_to_color != null ? 'facebook': 'danger' }}">{{ $inventory->rel_to_color != null ? $inventory->rel_to_color->color_name: 'No color' }}</span></td>
                                <td><span class="text-{{ $inventory->rel_to_size != null ? 'facebook': 'danger' }}">{{ $inventory->rel_to_size != null ? $inventory->rel_to_size->size: 'No size' }}</span></td>
                                <td>{{ $inventory->quantity }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a wire:click='DeleteEntry({{ $inventory->id }})' class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
