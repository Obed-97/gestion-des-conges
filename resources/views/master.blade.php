<!DOCTYPE html>
<html>
	<head>
		@include('layouts.head')
	</head>
	<body>


		@yield('content')

	    @yield('extra-js')

		@include('layouts.footer')

		@include('layouts.script')

		@include('sweetalert::alert')


	</body>
</html>