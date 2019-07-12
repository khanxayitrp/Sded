<!doctype html>
<html lang="en">

@include('partial.header')

<body id="page-top">

 @include('partial.navbar')

  <div id="wrapper">

   @include('partial.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">
		
		@yield('content')
       

     @include('partial.footer')

</body>

</html>