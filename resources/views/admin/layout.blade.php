
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>RMT.com</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('admin') }}/vendors/core/core.css">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('admin') }}/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="{{ asset('admin') }}/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
  <!-- Layout styles -->
	<link rel="stylesheet" href="{{ asset('admin') }}/css/demo_1/style.css">
  <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.png" />

    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    {{-- Selectize --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"/>

    {{-- DataTable --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    {{-- Selector with Search --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
          RMT<span>.com</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Salers</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Customers</span>
            </a>
          </li>
          <li class="nav-item nav-category">web controls</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brand" role="button" aria-expanded="false" aria-controls="brand">
              <i class="link-icon" data-feather="bold"></i>
              <span class="link-title">Brand</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="brand">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('brand.add') }}" class="nav-link">Add & View</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('brand.trash') }}" class="nav-link">Trash</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="category">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">Category</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('add.categroy') }}" class="nav-link">Add Category</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categroy') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categroy.trashed') }}" class="nav-link">Trash</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#subcategory" role="button" aria-expanded="false" aria-controls="subcategory">
              <i class="link-icon" data-feather="git-pull-request"></i>
              <span class="link-title">Sub Categories</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="subcategory">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('add_subcategroy') }}" class="nav-link">Add SubCategory</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('subcategroy') }}" class="nav-link">SubCategories</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('subcategroy.trash') }}" class="nav-link">Trash</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ route('tag.index') }}" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Tags</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('color.size') }}" class="nav-link">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Color & Size</span>
            </a>
          </li>

          <li class="nav-item nav-category">Products and Sales</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" role="button" aria-expanded="false" aria-controls="product">
              <i class="link-icon" data-feather="shopping-bag"></i>
              <span class="link-title">Product</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="product">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('product.index') }}" class="nav-link">Add & View product</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('product.trash') }}" class="nav-link">Trash</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ route('inventory') }}" class="nav-link">
              <i class="link-icon" data-feather="archive"></i>
              <span class="link-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sales.offline') }}" class="nav-link">
              <i class="link-icon" data-feather="shopping-cart"></i>
              <span class="link-title">On Store Sales</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sales.online') }}" class="nav-link">
              <i class="link-icon" data-feather="shopping-cart"></i>
              <span class="link-title">Online Sales</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#invoice" role="button" aria-expanded="false" aria-controls="invoice">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Invoices</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="invoice">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('viewInvoice') }}" class="nav-link">View invoice</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('invoice.trash') }}" class="nav-link">Trash</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ route('coupon.index') }}" class="nav-link">
              <i class="link-icon" data-feather="percent"></i>
              <span class="link-title">Coupon</span>
            </a>
          </li>


        </ul>
      </div>
    </nav>
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Settings</h6>
        <div class="form-group border-bottom">
          <div class="form-check form-check-inline">
              <a href="#" class="btn btn-primary">Customizable</a>
          </div>
          <div class="form-check form-check-inline">
              <a href="#" class="btn btn-primary">Customizable</a>
          </div>
          <div class="form-check form-check-inline">
              <a href="#" class="btn btn-primary">Customizable</a>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="../demo_1/dashboard-one.html">
            <img src="{{ asset('admin') }}/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="../demo_2/dashboard-one.html">
            <img src="{{ asset('admin') }}/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav>
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-form">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i data-feather="search"></i>
								</div>
							</div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="languageDropdown">
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
							</div>
            </li>
						<li class="nav-item dropdown nav-apps">
							<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="grid"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="appsDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">Web Apps</p>
									<a href="javascript:;" class="text-muted">Edit</a>
								</div>
								<div class="dropdown-body">
									<div class="d-flex align-items-center apps">
										<a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
										<a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
										<a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
										<a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
									</div>
								</div>
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown nav-messages">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="mail"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="messageDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">9 New Messages</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
								<div class="dropdown-body">
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Leonardo Payne</p>
												<p class="sub-text text-muted">2 min ago</p>
											</div>
											<p class="sub-text text-muted">Project status</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Carl Henson</p>
												<p class="sub-text text-muted">30 min ago</p>
											</div>
											<p class="sub-text text-muted">Client meeting</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Jensen Combs</p>
												<p class="sub-text text-muted">1 hrs ago</p>
											</div>
											<p class="sub-text text-muted">Project updates</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Amiah Burton</p>
												<p class="sub-text text-muted">2 hrs ago</p>
											</div>
											<p class="sub-text text-muted">Project deadline</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="figure">
											<img src="https://via.placeholder.com/30x30" alt="userr">
										</div>
										<div class="content">
											<div class="d-flex justify-content-between align-items-center">
												<p>Yaretzi Mayo</p>
												<p class="sub-text text-muted">5 hr ago</p>
											</div>
											<p class="sub-text text-muted">New record</p>
										</div>
									</a>
								</div>
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown nav-notifications">
							<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell"></i>
								<div class="indicator">
									<div class="circle"></div>
								</div>
							</a>
							<div class="dropdown-menu" aria-labelledby="notificationDropdown">
								<div class="dropdown-header d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium">6 New Notifications</p>
									<a href="javascript:;" class="text-muted">Clear all</a>
								</div>
								<div class="dropdown-body">
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="user-plus"></i>
										</div>
										<div class="content">
											<p>New customer registered</p>
											<p class="sub-text text-muted">2 sec ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="gift"></i>
										</div>
										<div class="content">
											<p>New Order Recieved</p>
											<p class="sub-text text-muted">30 min ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="alert-circle"></i>
										</div>
										<div class="content">
											<p>Server Limit Reached!</p>
											<p class="sub-text text-muted">1 hrs ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="layers"></i>
										</div>
										<div class="content">
											<p>Apps are ready for update</p>
											<p class="sub-text text-muted">5 hrs ago</p>
										</div>
									</a>
									<a href="javascript:;" class="dropdown-item">
										<div class="icon">
											<i data-feather="download"></i>
										</div>
										<div class="content">
											<p>Download completed</p>
											<p class="sub-text text-muted">6 hrs ago</p>
										</div>
									</a>
								</div>
								<div class="dropdown-footer d-flex align-items-center justify-content-center">
									<a href="javascript:;">View all</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								@if(Auth::user()->image == null)
                                <img src="{{ asset('uploads/profile.jpg') }}" alt="profile">
                                @else
                                <img src="{{ asset('uploads/users/'.Auth::user()->image) }}" alt="profile">
                                @endif
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										@if(Auth::user()->image == null)
                                        <img src="{{ asset('uploads/profile.jpg') }}" alt="profile">
                                        @else
                                        <img src="{{ asset('uploads/users/'.Auth::user()->image) }}" alt="profile">
                                        @endif
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
										<p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="{{ route('profile.edit') }}" class="nav-link">
												<i data-feather="edit"></i>
												<span>Edit Profile</span>
											</a>
										</li>
										<li class="nav-item">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            <button type="submit" class="btn text-danger m-0 p-0">
												<i data-feather="log-out"></i>
												<span class='ml-1 pl-2'>Log Out</span>
											</button>
                                            </form>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-content">

@yield('main')

			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2021 <a href="" target="_blank">RMT.com</a>. All rights reserved</p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('admin') }}/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('admin') }}/vendors/chartjs/Chart.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/jquery.flot/jquery.flot.js"></script>
  <script src="{{ asset('admin') }}/vendors/jquery.flot/jquery.flot.resize.js"></script>
  <script src="{{ asset('admin') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('admin') }}/vendors/progressbar.js/progressbar.min.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('admin') }}/vendors/feather-icons/feather.min.js"></script>
	<script src="{{ asset('admin') }}/js/template.js"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{ asset('admin') }}/js/dashboard.js"></script>
  <script src="{{ asset('admin') }}/js/datepicker.js"></script>
	<!-- end custom js for this page -->

    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Write your top blogs here!',
            tabsize: 2,
            height: 300
        });
    </script>

    {{-- Selectize --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
    <script>
        $('#select').selectize({ sortField: 'text' })
    </script>

    {{-- DataTable --}}
    {{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script> --}}
    <script src="{{ asset('admin') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('admin') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>

    {{-- Selector with Search --}}
    <script>
        $(document).ready(function () {
            $('.select-search').selectize({
                sortField: 'text'
            });
        });
    </script>


        {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    @if (session('info'))
    <script>
        Swal.fire({
        position: "center",
        icon: "info",
        title: "{{ session('info') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif

    @if (session('status'))
    <script>
        Swal.fire({
        position: "center",
        icon: "success",
        title: "{{ session('status') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
    @endif

    @yield('footer')

</body>
</html>
