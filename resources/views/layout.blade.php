<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="{{ url('css/open-iconic-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/animate.css') }}">

	<link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
	<link rel="stylesheet"href="{{ url('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}">

	<link rel="stylesheet" href="{{ url('css/aos.css') }}">

	<link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">

	<link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.css') }}">
	<link rel="stylesheet" href="{{ url('css/jquery.timepicker.css') }}">


	<link rel="stylesheet" href="{{ url('css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ url('css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body class="goto-here">
<body>

   @include('inc.header')
   
	

   @yield('content')

   @include('inc.footer')

  
</body>

	


<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ url('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('js/jquery.stellar.min.js') }}"></script>
<script src="{{ url('js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('js/aos.js') }}"></script>
<script src="{{ url('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ url('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('js/scrollax.min.js') }}"></script>
<script
    src="{{ url('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false') }}"></script>
<script src="{{ url('js/google-map.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
</body>
</html>