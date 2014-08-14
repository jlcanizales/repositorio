@extends('images.home')

@section('titulo')
Content File
@stop

@include('includes.highlight')

@section('contenido')
@parent
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-2">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Código de {{$file->nombreNormal}} <small> {{$file->created_at}}</small> </h3>
				  </div>
				  <div class="panel-body">
				 
					
					<pre>
						<code>
							{{$codigo}}
						</code>
					</pre>
					
					


					<script>
					
					
						hljs.initHighlightingOnLoad();
					</script>

				   		
				 
				  </div>
				</div>
			</div>
			
		</div>
	</div>

	
	


@stop
