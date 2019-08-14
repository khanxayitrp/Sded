<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partial.header')

<body class="bg-dark">

 
		
		@yield('content')
       


</body>

</html>