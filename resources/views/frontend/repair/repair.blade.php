@extends('frontend.layout')

@section('main')

<div class="product-section">
    <div class="container">
        <div class="row" id="shopnow">

            @forelse ($repairs as $repair)
            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mt-4 mb-md-0">
                <a class="product-item" href="{{ route('single_product',$repair->id) }}">
                    <img src="{{ asset('uploads/repair').'/'.$repair->image }}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{ $repair->title }}</h3>
                </a>
            </div>
            @empty
            <div class="col-md-12 m-auto">
                <h4 class="text-center">No repair service found!</h4>
            </div>
            @endforelse
        </div>
        <div class="mt-4">
            <div class="text-primary">
                {{-- {{ $repairs->links('vendor.pagination.bootstrap-5') }} --}}
            </div>
        </div>
    </div>
</div>

@endsection
