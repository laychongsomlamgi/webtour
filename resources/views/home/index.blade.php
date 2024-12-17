<!doctype html>
<html lang="en">
<head>
@include('home.head')

<title>Hoang Viet Tour</title>
</head>
<body>

	<div id="myContainer">
		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close">
					<span class="icofont-close js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>

		@include('home.header')


		@yield('content')
		<!-- footer -->
		@include('home.footer')
		<!-- /footer -->

		<div id="overlayer"></div>
		<div class="loader">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
	</div>

	@include('home.script')

</body>

</html>