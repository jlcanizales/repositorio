@extends('layout.base')

@section('titulo')
	Home
@stop

@include('includes.mycss')

@section('contenido')
		


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    	<a class="navbar-brand" href="#"><i class="fa fa-home"></i>Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{url('images/simple')}}">Simple</a></li>
		<li><a href="{{url('images/dropzone')}}">DropZone</a></li>
		<li><a href="{{url('images/filesdb')}}"><i class="fa fa-database"></i>Files DB</a></li>
    <li><a href="{{url('images/zipdb')}}"><i class="fa fa-file-archive-o"></i>Solución ZIP </a></li>
		<li><a href="{{url('images/listarfiles')}}"><i class="fa fa-folder-open"></i>Ver Archivos </a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
      	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Sesion:  {{Auth::user()->username}} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('logout')}}">Logout <i class="fa fa-sign-out"></i></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

		

		<div class="container">
			<div class="row">
				{{ HTML::image('images/hong.jpg','Lo sentimos',array('class'=>'img-responsive','id'=>'imagen')) }}
			</div>
		</div>


	

@stop



				
				