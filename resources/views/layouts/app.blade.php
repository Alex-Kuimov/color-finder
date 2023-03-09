<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
	@vite(['resources/js/app.js'])

	<title>@yield('title')</title>
</head>

<body class="d-flex flex-column h-100">
	<div id="app" class="h-100">
        @yield('content')
	</div>
</body>
</html>
