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
                    <div class="mb-2">
                        <input type="text" wire:model="customer" class="form-control" placeholder="Customer name">
                        <input type="text" wire:model="reference" class="form-control" placeholder="Referance/Mobile">
                    </div>
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
                                <td><button class="btn btn-primary" wire:click='Invoice({{ $invoice->id }})'>{{ $invoice->invoice_id }}</button></td>
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
                    <h3 class="text-white text-center">Invoices on: {{ $preview }}</h3>
                </div>


                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">

                            <label class="form-label">Select Product</label>
                            <form wire:submit='SelectProduct'>
                            <div class="row">
                                <div class="col-9">
                                    <select wire:model="selectedproduct" placeholder="Pick a Product" class="form-control select-search">
                                        <option value="">Select a product...</option>
                                        @foreach ($inventories as $inventory)
                                            <option value="{{ $inventory->product_id }}">{{ $inventory->rel_to_product->name }} -->Quantity: {{ $inventory->quantity }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <div class="">
                                        <button class="btn btn-primary"  type="submit" wire:loading.remove wire:target='SelectProduct()'>Select Product</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>


                    </div>


            {{-- AddBill form  --}}
                    <form wire:submit='AddBill'>
                    <div class="form-row">
                        <div class="form-group col-md-8"></div>
                        <div class="form-group col-md-1 mt-4 text-center">
                            <label class="form-label  mt-2">Price</label>
                        </div>
                        <div class="form-group col-md-3  mt-4">
                            <input readonly type="text" value="" wire:model='price' class="form-control bg-white" id="price">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-8">
                            @if ($i_info != null)
                            <div class="row">

             {{-- Hide if Size not available --}}
                                @foreach ($i_info as $color)
                                @if ($color->color_id != null)
                                <div class="col-1">
                                    <label class="form-label  mt-2">Color</label>
                                </div>
                                <div class="col-5">
                                    <select wire:model="color_id" id="" class="form-control">
                                        <option>Select Color</option>
                                        @foreach ($i_info as $color)
                                            @if ($color->color_id != null)
                                                <option value="{{ $color->color_id }}">{{ $color->rel_to_color->color_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @break
                                @endif
                                @endforeach

            {{-- Hide if Size not available --}}
                                @foreach ($i_info as $size)
                                @if ($size->size_id != null)

                                <div class="col-1">
                                    <label class="form-label  mt-2">Size</label>
                                </div>
                                <div class="col-5">
                                    <select wire:model="size_id" id="" class="form-control">
                                        <option>Select Size</option>
                                        @foreach ($i_info as $size)
                                            @if ($size->size_id != null)
                                                <option value="{{ $size->size_id }}">{{ $size->rel_to_size->size }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @break
                                @endif
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label mt-2">Quantity</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" wire:model='quantity' value="" class="form-control" onchange="calculate()" id="quantity">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8"></div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label  mt-2">Discount (%)</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" wire:model='discount' value="" class="form-control" onchange="calculate()" id="discount" placeholder="%">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8"></div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label mt-2">Total</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" wire:model='total_price' value="" class="form-control" id="total">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9 ">
                            <h5 for="">Customer name: <strong class="text-success">{{ $previewName != null ? $previewName:'' }}</strong></h5>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" wire:loading.remove wire:target='AddBill()' class="btn btn-primary btn-lg col">Add</button>
                        </div>
                    </div>
                </form>


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
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bills as $sl=>$bill)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $bill->rel_to_product->name }}</td>
                                <td>{{ $bill->color_id != null ? $bill->rel_to_color->color_name:'No Color!' }}</td>
                                <td>{{ $bill->size_id != null ? $bill->rel_to_size->size:'No Size!' }}</td>
                                <td>{{ $bill->price }}</td>
                                <td>{{ $bill->quantity }}</td>
                                <td>{{ $bill->discount }}</td>
                                <td>{{ $bill->total_price }}</td>
                                <td>
                                    <a wire:click='DeleteItem({{ $bill->id }})' class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                    <div class="row border-top border-primary">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <a href="#" class="btn btn-danger btn-lg mt-4">Drop Invoice</a>
                            <a wire:click='CheckOut()' class="btn btn-primary btn-lg mt-4">Check out!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>