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
	<header class="p-3 bg-dark text-white">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a href="/" class="nav-link px-2 text-white">Главная</a></li>
					<li><a href="/about/" class="nav-link px-2 text-white">О проекте</a></li>
				</ul>

				<div class="text-end">
					<button type="button" class="btn btn-warning">
						Поддержать проект
					</button>
				</div>
			</div>
		</div>
	</header>
	<div id="app">
        @yield('content')
	</div>
	<footer class="footer mt-auto p-3 bg-dark text-white">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				Color finder © 2023
			</div>
		</div>
	</footer>
</body>
</html>
