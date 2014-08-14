@extends('images.home')

@section('titulo')
lista files
@stop

@section('contenido')
@parent

<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-offset-2">
			<div class="panel panel-primary">
				<!-- Default panel contents -->
				<div class="panel-heading"><span class="glyphicon glyphicon-folder-open"></span>  Files</div>
				<div class="panel-body">
					<div class="alert alert-info" role="alert"> Aquí estan tus archivos {{Auth::user()->username}} <i class="fa fa-files-o"></i> </div>	
					
					@if(Session::has('estado'))
					<div class='alert alert-success'>
						<button type='button' class='close' data-dismiss='alert'>×</button>
						Archivo borrado
					</div>

					@endif

				</div>

				<!-- List group -->
				<ul class="list-group">
					@foreach($files as $file)
					<div class="row">
						<div class="col-md-8">
								
									
								@if ($file->clientOriginalExtension=='py')

									<a href="{{url('images/contentfile',array($file->id,$secure = null))}}" class="list-group-item list-group-item-info">
								
								@elseif ($file->clientOriginalExtension=='c') 
									<a href="{{url('images/contentfile',array($file->id,$secure = null))}}" class="list-group-item list-group-item-danger">
								
								@elseif ($file->clientOriginalExtension=='h') 
									<a href="{{url('images/contentfile',array($file->id,$secure = null))}}" class="list-group-item list-group-item-danger">
						
								@else
									<a href="{{url('images/contentfile',array($file->id,$secure = null))}}" class="list-group-item list-group-item-warning">			

								@endif

									<i class="fa fa-file"></i>
									<span class="badge">{{

										number_format(doubleval($file->tamaño),2,'.',' ').'KB'}}</span>
										{{$file->nombreNormal}} 
									</a>
								</div><!--Fin del col 8 -->



								<div class="col-md-4">
									<a href="{{url('images/deletefile',array($file->id,$secure = null))}}">
										<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar"><span class="glyphicon glyphicon-trash"></span></button>
									</a>
									<a href="{{url('images/contentfile',array($file->id,$secure = null))}}">
										<button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="ver"><span class="glyphicon glyphicon-search"></span></button>
									</a>
									<!-- Button trigger modal -->
					                  <button class="btn btn-warning" data-toggle="modal" data-target="<?php echo '#myModal'.$file->id ?>">
					                  <i class="fa fa-files-o"></i>
					                  </button>
									
								
								</div><!--fin del col4 -->
						
					</div><!-- fin row-->
												<!-- Modal -->
							<div class="modal fade" id="<?php echo 'myModal'.$file->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-files-o"></i> Reemplazar File {{$file->nombreNormal}}</h4>
							      </div>
							      <div class="modal-body">
							        {{Form::open(array(
											 	'url'=>'images/reemplazarfiles',
											 	'files'=>true
											 	))}}
							 					<div class="alert alert-warning" role="alert">Recuerda que al reemplazar tu archivo no podrás recuperarlo.</div>
													{{ Form::label('file', 'Archivo:')}}
													{{ Form::file('file',array('class'=>'btn btn-warning'))}}
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							        {{ Form::submit('Reemplazar',array('class'=>'btn btn-warning'))}}
							        {{Form::close()}}
							      </div>
							    </div>
							  </div>
							</div>
							@endforeach

						</ul>
					</div><!-- fin panel priomary--> 
				</div><!--fin col 7 ofset 2 -->
			</div><!-- fin row-->
		</div><!--fin container -->







		
@stop

