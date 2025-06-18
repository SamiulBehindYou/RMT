@extends('frontend.layout')

@section('main')

<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>{{ getBasicSettings()->about_us_page_title }}</h1>
                    <p>{{ getBasicSettings()->about_us_page_meta_title }}</p>
                    <p><a href="{{ route('shop') }}" class="btn btn-secondary me-2">Shop Now</a><a href="{{ route('shop') }}" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    {{-- <img src="{{ asset('uploads/products/original/670e0a6a6f825.webp') }}" width="95%" class=""> --}}
                </div>
            </div>
        </div>
    </div>
</div>

		<!-- Start Team Section -->
		<div class="untree_co-section">
			<div class="container">

				<div class="row mb-5">
					<div class="col-lg-5 mx-auto text-center">
						<h2 class="section-title">{{ $settings->about_title }}</h2>
					</div>
				</div>

				<div class="row">
                    <div class="col-md-12">
                        {!! $settings->about_description !!}
                    </div>
				</div>
			</div>
		</div>
		<!-- End Team Section -->

@endsection
