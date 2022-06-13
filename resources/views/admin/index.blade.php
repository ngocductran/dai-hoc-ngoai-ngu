<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets/dashboard/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/dashboard/css/font-awesome.css')}}">

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('assets/dashboard/css/style.css')}}">
	@stack('css')
</head>
<body>
	<!-- Navbar Header -->
	@include('admin.dashboard.navbar')
	<!-- End Navbar -->

	<div class="container-fluid page-body-wrapper">
		<!-- Sidebar -->
		@include('admin.dashboard.sidebar')
		<!-- End Sidebar -->
		<div class="mobile-menu-overlay"></div>
		<!-- Main -->
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					@yield('content')
				</div>
			</div>
		</div>
		<!-- End Main -->
	</div>
</body>
</html>

<script src="{{asset('assets/dashboard/js/jQuery.js')}}"></script>
<script src="{{asset('assets/dashboard/js/script.js')}}"></script>
<script src="{{asset('assets/dashboard/js/process.js')}}"></script>
<script src="{{asset('assets/dashboard/js/layout-settings.js')}}"></script>
<script src="{{asset('assets/dashboard/js/dashboard.js')}}"></script>
@stack('scripts')

