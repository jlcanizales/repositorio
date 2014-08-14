@extends('images.home')
	
	
	@section('titulo')
		Files DB
	@stop
	
	@include('includes.styledropzone')

	@section('contenido')
		@parent
		<div class="container">
			<div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-5">
			  	
				

			  	<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-upload"></i> Dropzone Archivos en BD</h3>
				  </div>
				 	
					{{Form::open(array(
				 	'url'=>'images/filesdb',
				 	'files'=>true,
				 	'class'=>'dropzone',
				 	'id'=>'my-dropzone',
				 	'method'=>'post',
				 	))}}
					

					{{Form::close()}}
				
				  </div>
				</div>
			


			  </div>
			  <div class="col-md-4"></div>
			</div>
		</div>


	@stop


