<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{ asset('frontend') }}/favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link href="{{ asset('frontend') }}/css/tiny-slider.css" rel="stylesheet">
		<link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
		<title>RMT.com</title>

        @yield('css')
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="{{ route('index') }}">RMT<span>.com</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item {{ Route::is('index') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('index') }}">Home</a>
						</li>
						<li class="nav-item {{ Route::is('shop') ? 'active' : '' }}"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
						<li class="nav-item {{ Route::is('view.repair') ? 'active' : '' }}"><a class="nav-link" href="{{ route('view.repair') }}">Repair</a></li>
						<li class="nav-item {{ Route::is('services') ? 'active' : '' }}"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
						<li class="nav-item {{ Route::is('aboutus') ? 'active' : '' }}"><a class="nav-link" href="{{ route('aboutus') }}">About us</a></li>
						<li class="nav-item {{ Route::is('contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="{{ route('cart') }}"><i class="bi bi-cart4 h4"></i></a></li>

                        @auth('customer')
						<li><a class="nav-link mx-1" href="{{ route('customer.profile') }}"><i class="bi bi-person-circle h4"></i></a></li>
						<li><a class="nav-link mx-1" href="{{ route('customer.logout') }}"><i class="bi bi-box-arrow-right h4"></i></a></li>
                        @else
						<li><a class="nav-link mx-1" href="{{ route('customer.login') }}"><i class="bi bi-box-arrow-in-right h4"></i></a></li>
                        @endauth
					</ul>
				</div>
			</div>

		</nav>
		<!-- End Header/Navigation -->


@yield('main')


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					{{-- <img src="{{ asset('frontend') }}/images/sofa.png" alt="Image" class="img-fluid"> --}}
				</div>

@livewire('frontend.subscriber')

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">RMT.com</a></div>
						{{-- <p class="mb-4"></p> --}}

						<ul class="list-unstyled custom-social">
                            @if ($settings->facebook && $settings->facebook_status == 0)
							    <li><a target="blank" href="{{ $settings->facebook }}"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                            @endif
                            @if ($settings->twiter && $settings->twiter_status == 0)
							    <li><a target="blank" href="{{ $settings->twiter }}"><span class="fa fa-brands fa-twitter"></span></a></li>
                            @endif
                            @if ($settings->instagram && $settings->instagram_status == 0)
							    <li><a target="blank" href="{{ $settings->instagram }}"><span class="fa fa-brands fa-instagram"></span></a></li>
                            @endif
                            @if ($settings->youtube && $settings->youtube_status == 0)
							    <li><a target="blank" href="{{ $settings->youtube }}"><span class="fa fa-brands fa-linkedin"></span></a></li>
                            @endif
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-4">
								<ul class="list-unstyled">
									<li><a href="{{ route('index') }}">Home</a></li>
									<li><a href="{{ route('shop') }}">Shop</a></li>
									<li><a href="{{ route('view.repair') }}">Repair</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-4">
								<ul class="list-unstyled">
									<li><a href="{{ route('aboutus') }}">About us</a></li>
									<li><a href="{{ route('services') }}">Services</a></li>
									<li><a href="{{ route('contact') }}">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-4">
								<ul class="list-unstyled">
									@if ($settings->facebook && $settings->facebook_status == 0)
                                        <li><a target="blank" href="{{ $settings->facebook }}">Faecbook</a></li>
                                    @endif
                                    @if ($settings->twiter && $settings->twiter_status == 0)
                                        <li><a target="blank" href="{{ $settings->twiter }}">Twiter</a></li>
                                    @endif
                                    @if ($settings->instagram && $settings->instagram_status == 0)
                                        <li><a target="blank" href="{{ $settings->instagram }}">Instagram</a></li>
                                    @endif
                                    @if ($settings->youtube && $settings->youtube_status == 0)
                                        <li><a target="blank" href="{{ $settings->youtube }}">YouTube</a></li>
                                    @endif
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="#">Samiul</a>
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->


		<script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
		<script src="{{ asset('frontend') }}/js/tiny-slider.js"></script>
		<script src="{{ asset('frontend') }}/js/custom.js"></script>

        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Bootstrap and jQuery --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        @if (session('success'))
        <script>
            Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
            });
        </script>
        @endif

        @if (session('error'))
        <script>
            Swal.fire({
            position: "center",
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 1500
            });
        </script>
        @endif

        @yield('script')
	</body>

</html>
