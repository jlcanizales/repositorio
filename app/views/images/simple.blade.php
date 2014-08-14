@extends('images.home')
	
	
	@section('titulo')
		simple file
	@stop
	
	@section('contenido')
		@parent
		<div class="container">
			<div class="row">
			  <div class="col-md-3"></div>
			  <div class="col-md-5">
			  	
			  	@if ($estado==true)
			  		<div class="alert alert-success" role="alert">Se subio correctamente</div>
                   
                    @else
                    <div class="alert alert-info" role="alert">Selecciona un archivo</div>
                  
                 @endif


			  	<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">DropZone File Upload</h3>
				    	
				  </div>
				 	
					{{Form::open(array(
				 	'url'=>'images/simple',
				 	'files'=>true
				 	))}}
 
						{{ Form::label('file', 'File:')}}
						{{ Form::file('file')}}
						 
						{{ Form::submit('Upload',array('class'=>'btn btn-success'))}}
					 
					{{Form::close()}}

			

	  	
				  </div>
				</div>
			  

			  </div>
			  <div class="col-md-4"></div>
			</div>
		</div>


	@stop


