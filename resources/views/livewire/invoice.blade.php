<div>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Invoices</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('new_invoice'))
                        <div class="alert alert-success">
                            {{ session('new_invoice') }}
                        </div>
                    @endif
                    <div class="mb-2 text-center">
                        <a wire:click='CreateInvoice()' class="btn btn-primary">Create new</a>
                    </div>
                    <table class="table text-center">
                        <tr>
                            <th>SL</th>
                            <th>Invoice</th>
                        </tr>
                        @forelse ($invoices as $sl=>$invoice)
                            <tr>
                                <td>{{ $sl+ $invoices->firstItem() }}</td>
                                <td><button class="btn btn-primary" wire:click='Invoice({{ $invoice->invoice_id }})'>{{ $invoice->invoice_id }}</button></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">No Invoices</td>
                            </tr>
                        @endforelse

                    </table>
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
        @if($preview != null)
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Make Invoices on: {{ $preview }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label class="form-label">Select Product</label>
                            <select onchange="ProductSelect()" id="product" id="select-product" placeholder="Pick a Product">
                                <option value="">Select a product...</option>
                                @foreach ($inventories as $inventory)
                                    <option value="{{ $inventory->rel_to_product->name }}">{{ $inventory->rel_to_product->name }} -->Quantity: {{ $inventory->quantity }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-1 mt-4 text-center">
                            <label class="form-label  mt-2">Price</label>
                        </div>
                        <div class="form-group col-md-3  mt-4">
                            <input type="text" class="form-control" name="product">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Colors</label>
                            @if ($showColorsSizes != null)
                            <select id="select-product" placeholder="Pick a color">
                                <option value="">Select a color...</option>
                                @foreach ($showColorsSizes as $color)
                                    <option value="">{{ $color->color_name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label  mt-2">Quantity</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="product">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8"></div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label  mt-2">Discount</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="product">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8"></div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label mt-2">Total</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" class="form-control" name="product">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9 "></div>
                        <div class="form-group col-md-3">
                            <button class="btn btn-primary btn-lg col">Add</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-center">Bills</h3>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1gsdfg</td>
                                <td>1gsdfgafsdf</td>
                                <td>1gsasf</td>
                                <td>1gsaasfda</td>
                                <td>1gsaasfda</td>
                                <td>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row border-top border-primary">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <a href="#" class="btn btn-danger btn-lg mt-4">Drop Invoice</a>
                            <a href="#" class="btn btn-primary btn-lg mt-4">Check out!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
