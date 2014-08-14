@extends('layout.base')

@section('titulo')
	login
@stop
@include('includes.mycss')
	
@section('contenido')

<div class="jumbotron">
  <h1>Bienvenido al Demo<i class="fa fa-beer fa-2x"></i></h1>
  <p>Repositorio</p>
</div>
	<div class="container">
		<div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-5">
			
		  	<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title"><i class="fa fa-user"></i> Login</h3>
			  </div>
			  <div class="panel-body">
			  	@if (Session::has('login_errors'))
			  		<div class="alert alert-danger" role="alert">El usuario o la contraseña no se encontro</div>
                   
                    @else
                    <div class="alert alert-info" role="alert">Introduce tus datos para iniciar sesión</div>
                  
                    @endif
				


				
				@if($errors->has())
					@if($errors->has('username'))
						 
<div class="alert alert-danger" role="alert">{{ $errors->first('username') }}</div>

					@endif
					@if($errors->has('password'))		
						 
<div class="alert alert-danger" role="alert"> {{ $errors->first('password') }}</div>

					@endif

				@endif

						
					<form role="form" id="loginform" action="login" method="post">
						  <div class="form-group">
						    <div class="input-group">
						      <div class="input-group-addon"><i class="fa fa-user"></i></div>
						      <input class="form-control" type="text" name="username" id="username"placeholder="Username" >
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="input-group">
						      <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
						      <input class="form-control" type="password" name="password" id="password"placeholder="Constraseña" >
						    </div>
						  </div>
						 

						  <button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
						</form>
					

			  		
			  </div>
			</div>

			
		  </div>
		  <div class="col-md-4"></div>
		</div>
	</div>
@stop
