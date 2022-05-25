<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đại học ngoại ngữ</title>

	<link rel="stylesheet" type="text/css" href="/css/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui/jquery-ui.js"></script>

	<link rel="stylesheet" type="text/css" href="/css/header.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-6.1.1-web/css/all.css">
</head>
<body>
	@include('layouts.header')
	@include('layouts.slide')
	@yield('content')
	@include('layouts.footer')
</body>
</html>