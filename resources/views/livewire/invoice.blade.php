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
                    <h3 class="text-white text-center">Invoices on: {{ $preview }} <small class="text-white">{{ $previewName != null ? $previewName:'' }}</small></h3>
                </div>


                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            
                            <label class="form-label">Select Product</label>
                            <form wire:submit='SelectProduct'>
                            <div class="row">
                                <div class="col-10">
                                    <select onchange="ProductSelect()" wire:model="selectedproduct" placeholder="Pick a Product" class="form-control select-search">
                                        <option value="">Select a product...</option>
                                        @foreach ($inventories as $inventory)
                                            <option value="{{ $inventory->product_id }}">{{ $inventory->rel_to_product->name }} -->Quantity: {{ $inventory->quantity }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <div class="ml-5">
                                        <button class="btn btn-primary"  type="submit" wire:loading.remove>Select</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="form-group col-md-1 mt-4 text-center">
                            <label class="form-label  mt-2">Price</label>
                        </div>
                        <div class="form-group col-md-3  mt-4">
                            <input type="text" value="{{ $p_info != null ? $p_info->price:'' }}" class="form-control" name="product">
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
                                    <select name="" id="" class="form-control">
                                        @php
                                            $noColor = null;
                                        @endphp
                                        @foreach ($i_info as $color)
                                            @if ($color->color_id != null)
                                                <option value="{{ $color->color_id }}">{{ $color->rel_to_color->color_name }}</option>
                                            @else
                                                @if($noColor == null)
                                                <option value="">No Color!</option>
                                                    @php
                                                        $noColor = 1;
                                                    @endphp
                                                @endif
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
                                    <select name="" id="" class="form-control">
                                        @php
                                            $noSize = null;
                                        @endphp
                                        @foreach ($i_info as $size)
                                            @if ($size->size_id != null)
                                                <option value="{{ $size->size_id }}">{{ $size->rel_to_size->size }}</option>
                                            @else
                                                @if($noSize == null)
                                                <option value="">No Size!</option>
                                                    @php
                                                        $noSize = 1;
                                                    @endphp
                                                @endif
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
                            <label class="form-label  mt-2">Quantity</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" value="{{ $p_info != null ? 1:'' }}" class="form-control" name="product">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8"></div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label  mt-2">Discount (%)</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" value="{{ $p_info != null ? $p_info->discount:'' }}" class="form-control" name="product" placeholder="%">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8"></div>
                        <div class="form-group col-md-1 text-center">
                            <label class="form-label mt-2">Total</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="text" value="{{ $p_info != null ? $p_info->after_discount:'' }}" class="form-control" name="product">
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
