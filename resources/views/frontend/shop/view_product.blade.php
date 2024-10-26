@extends('frontend.layout')

@section('main')

<div class="product-section">
    <div class="container">
        <div class="row" id="shopnow">

            @foreach ($products as $product)
            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mt-4 mb-md-0">
                <a class="product-item" href="{{ route('single_product',$product->id) }}">
                    <img src="{{ asset('uploads/products/tumbnail').'/'.$product->image }}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <strong class="product-price">{{ $product->price }} BDT</strong>

                    <span class="icon-cross">
                        <img src="{{ asset('frontend') }}/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            <div class="text-primary">
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection
