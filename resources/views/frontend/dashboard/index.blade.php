@extends('frontend.layout')

@section('main')



		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Gaming Phone <span clsas="d-block">Play game</span></h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="#shopnow" class="btn btn-secondary me-2">Shop Now</a><a href="{{ route('shop') }}" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{ asset('uploads/products/original/670e0a6a6f825.webp') }}" width="95%" class="">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

        {{-- top Category start --}}
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center text-primary text-white">Top categories</h2>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    @foreach ($categories as $category)
                                    <div class="col-1">
                                        <a href="{{ route('by_category',$category->id) }}"><img src="{{ asset('uploads/categories').'/'.$category->category_image }}" width="100"></a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- top Category end --}}


        {{-- top Brand start --}}
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center text-primary text-white">Top Brands</h2>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    @foreach ($brands as $brand)
                                    <div class="col-2">
                                        <a href="{{ route('by_brand', $brand->id) }}" class="btn btn-primary">{{ $brand->brand }}</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- top Brand end --}}

		<!-- Start Product Section -->
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
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('frontend') }}/images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Shipping</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('frontend') }}/images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('frontend') }}/images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="{{ asset('frontend') }}/images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Returns</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="{{ asset('frontend') }}/images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->


		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">

                                @foreach ($testimonials as $testimonial)
                                @if ($testimonial->status == 0)
                                    <div class="item">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8 mx-auto">

                                                <div class="testimonial-block text-center">
                                                    <blockquote class="mb-5">
                                                        <p>&ldquo;{{ $testimonial->message }}&rdquo;</p>
                                                    </blockquote>

                                                    <div class="author-info">
                                                        <div class="author-pic">
                                                            <img src="{{ asset('uploads/testimonials'.'/'.$testimonial->image) }}" alt="Maria Jones" class="img-fluid">
                                                        </div>
                                                        <h3 class="font-weight-bold">{{ $testimonial->name }}</h3>
                                                        <span class="position d-block mb-3">{{ $testimonial->role }}</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END item -->
                                @endif
                                @endforeach

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->



@endsection
