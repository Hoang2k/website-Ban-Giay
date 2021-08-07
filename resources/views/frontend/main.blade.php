<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Giày</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="frontend/css/bootstrap.css">
	<link rel="stylesheet" href="frontend/css/style.css" >
	<link rel="stylesheet" href="frontend/font-awesome-4.7.0/css/font-awesome.min.css">
	
</head>
<body onload="setup()">
   @include('frontend.header');
   
   @yield('content')

@include('frontend.footer');

    <script src="frontend/js/jquery-3.5.1.min.js"></script>
    <script src="frontend/js/bootstrap.js"></script>
    <script src="frontend/js/script.js"></script>
</body>
</html>