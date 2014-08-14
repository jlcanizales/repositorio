<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> @yield('titulo') </title>
	
<!-- 
	La carpeta Views esta ligada con la carpeta 
	miProyecto/public 
	por eso podemos incluir Bootstrap(un tema) con
	URL::to('css/bootstrap.min.css'), 
	de la misma manera podemos incluir js 
	
-->
{{ HTML::script('js/jquery.min.js')}}
{{ HTML::style('css/bootstrap.min.css')}}
{{ HTML::style('css/bootstrap.css')}}
{{ HTML::style('font-awesome/css/font-awesome.min.css')}}
{{ HTML::script('js/bootstrap.js')}}


</head>
<body>

	@yield('contenido')


</body>
</html>