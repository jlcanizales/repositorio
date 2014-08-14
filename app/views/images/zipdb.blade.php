@extends('images.home')
	
	
	@section('titulo')
		Zip
	@stop
	
	@include('includes.styledropzone')

	@section('contenido')
		@parent
		<div class="container">
			<div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-5">
			  	
				

			  	<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-file-archive-o"></i> Ingresa el zip con tu solución</h3>
				  </div>
				 	
					{{Form::open(array(
				 	'url'=>'images/zipdb',
				 	'files'=>true,
				 	'class'=>'dropzone',
				 	'method'=>'post',
				 	'id'=>'my-dropzone'
				 	))}}
					

					{{Form::close()}}
				
				  </div>
				</div>

			<script>
				Dropzone.options.myDropzone = 
				{
		            maxFiles: 1,
		            acceptedFiles: '.zip',
		           // acceptedMimeTypes:'application/zip',
					    
				}
			</script>
				


			  </div>
			  <div class="col-md-4"></div>
			</div>
		</div>


	@stop