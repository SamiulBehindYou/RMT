@extends('frontend.layout')

@section('main')

<!-- Start We Help Section -->
<div class="we-help-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="imgs-grid">
                    <div class="grid grid-1" style="height:100%"><img src="{{ asset('uploads/products/original').'/'.$product->image }}" ></div>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <h2 class="section-title mb-4">{{ $product->name }}</h2>
                <p>{{ $product->short_description }}</p>

                <a href="{{ route('shop') }}" class="btn">Add to cart</a>
                <a href="{{ route('shop') }}" class="btn">Explore more</a>
            </div>
        </div>
    </div>
</div>
<!-- End We Help Section -->

<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div>
                {!! $product->description !!}
            </div>
        </div>
    </div>
</div>

@endsection
