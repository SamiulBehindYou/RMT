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
		<link href="{{ asset('frontend') }}/css/tiny-slider.css" rel="stylesheet">
		<link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
		<title>RMT.com</title>
	</head>

	<body>


        <!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-6">
							<div class="intro-excerpt">
								<h1>Register Now!</h1>
								<p class="mb-4">Register to be our customers!</p>
                                <p><a href="{{ route('index') }}" class="btn btn-white-outline">Back to home</a></p>
							</div>
						</div>
						<div class="col-lg-6 mt-3">
							<div class="hero-img-wrap text-white">
                                <form action="{{ route('register.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Enter your name</label>
                                        <input type="text" class="form-control bg-transparent text-white" value="{{ old('name') }}" name="name">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Enter your email</label>
                                        <input type="text" class="form-control bg-transparent text-white" value="{{ old('email') }}" name="email">
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Enter your password</label>
                                        <input type="password" class="form-control bg-transparent text-white" name="password">
                                        @error('password')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Enter your confirm password</label>
                                        <input type="password" class="form-control bg-transparent text-white" name="password_confirmation">

                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-secondary me-2" type="submit">Register</button>
                                    </div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->



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
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Mobile</a></li>
									<li><a href="#">Earphone</a></li>
									<li><a href="#">Servicing</a></li>
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

        @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}", 'success!');

            // Swal.fire({
            // position: "center",
            // icon: "success",
            // title: "{{ session('success') }}",
            // showConfirmButton: false,
            // timer: 1500
            // });
        </script>
        @endif
	</body>

</html>
