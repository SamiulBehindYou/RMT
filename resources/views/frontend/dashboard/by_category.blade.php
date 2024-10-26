@extends('frontend.layout')

@section('main')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 m-auto">
            <h3 class="text-center">Category wise view </h3>
        </div>
    </div>
</div>
<div class="product-section">
    <div class="container">
        <div class="row">

            @foreach ($products as $product)
            @if ($product->rel_to_subcategory->category_id != $category_id)
                @continue
            @endif
            <div class="col-12 col-md-4 col-lg-3 mb-5 mt-4 mb-md-0">
                <a class="product-item" href="#">
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
