<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PhotoShow with Laravel</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">
</head>
<body>
	@include('inc.topbar')
	<br>
	<div class="row">
		@include('inc.messages')
		<div class="column">
			@yield('content')
		</div>
	</div>
</body>
</html>
