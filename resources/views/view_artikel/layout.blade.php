<!DOCTYPE html>

<style type="text/css"> 
	@media print{ #not-print { display: none; } } 
</style>

<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>
<body>
	<br>
	<h1 id="not-print"><center>DATA ARTIKEL</center></h1><br>
	<div class="container">
		@yield('content')
	</div>  
</body>
</html>