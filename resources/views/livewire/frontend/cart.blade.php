<div>
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
<!-- End Hero Section -->



    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    @if(session()->has('delete_info'))
                    <div class="alert alert-info">{{ session('delete_info') }}</div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-total">Total</th>
                        <th class="product-remove">Remove</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($carts as $cart)
                    <tr>
                        <td class="product-thumbnail">
                        <a href="{{ route('single_product', $cart->product_id) }}"><img src="{{ asset('uploads/products/tumbnail/').'/'.$cart->rel_to_product->image }}" alt="Image" width="100" class="img-fluid"></a>
                        </td>
                        <td class="product-name">
                        <a href="{{ route('single_product', $cart->product_id) }}" style="text-decoration: none;"><h2 class="h5 text-black">{{ $cart->rel_to_product->name }}</h2></a>
                        </td>
                        <td>{{ $cart->price }}</td>
                        <td>
                        <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                            <div class="input-group-prepend">
                            <button wire:click='Decrement({{ $cart->id }})' class="btn btn-outline-black" type="button">&minus;</button>
                            </div>
                            <input readonly type="text" class="form-control text-center quantity-amount" value="{{ $cart->quantity }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                            <button wire:click='Increment({{ $cart->id }})' class="btn btn-outline-black" type="button">&plus;</button>
                            </div>
                        </div>

                        </td>
                        <td>{{ $cart->total_price }}</td>
                        <td><a wire:click='cartDelete({{ $cart->id }})' class="btn btn-black btn-sm">X</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6"><h4 class="text-center">No Product added yet!</h4></td>
                    </tr>
                    @endforelse



                    </tbody>
                </table>
                </div>
            </form>
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                    <a href="{{ route('shop') }}" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>
                </div>
                <div class="col-md-6">
                </div>
                </div>

                {{-- Coupon Apply Form --}}
                <form wire:submit='CouponApply' class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    @if(session()->has('coupon_success'))
                        <div class="alert alert-success">
                            {{ session('coupon_success') }}
                        </div>
                    @endif
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" wire:model='coupon_code' class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        @if(session()->has('coupon_error'))
                            <strong class="text-danger">{{ session('coupon_error') }}</strong>
                        @endif
                        @error('coupon_code')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-black">Apply Coupon</button>
                    </div>
                </form>

            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                <div class="col-md-7">
                    <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="text-black">Subtotal</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">{{ $sub_total }}</strong>
                    </div>
                    </div>
                @if($coupon_discount != null)
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="text-black">Coupon Discount</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">{{ $coupon_discount }}</strong>
                    </div>
                    </div>
                @endif
                    <div class="row mb-5">
                    <div class="col-md-6">
                        <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">{{ $total }}</strong>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-black btn-lg py-3 btn-block" >Proceed To Checkout</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
