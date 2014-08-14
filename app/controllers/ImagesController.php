<?php 

class ImagesController extends BaseController
{	
	public function __construct(){
		//bloqueo de acceso si no esta logueado
		$this->beforeFilter('auth');
	}

	//cuando se loguea entra al home 
	public function getIndex()
	{
		return View::make('images.home');
	}


	//ejemplo de dropzone solo sube archivos al server
	public function getDropzone()
	{
		return View::make('images.dropzone');
	}


	public function postDropzone()
	{		
		
			$file = Input::file('file');

			$secureName=sha1($file->getClientOriginalName());

			$dir = public_path().'/uploads/';

			$subir=$file->move($dir,$secureName.'.'.$file->guessExtension());	

	}

	//sube un solo archivo 
	public function getSimple()
	{
		return View::make('images.simple')->with('estado',false);
	}

	public function postSimple()
	{	
		

		//obtenemos el campo
		$file = Input::file('file');
		//ciframos el nombre 
		
		$url_imagen= sha1($file->getClientOriginalName());

		//se sube a la carpeta public
		$destinoPath = public_path().'/uploads/';
	
		//destino de nuestro archivo y despues el nombre del archivo y su extension
		$subir=$file->move($destinoPath,$url_imagen.'.'.$file->guessExtension());
		
		return View::make('images.simple')->with('estado',true);
				
				
				
		
		
	
	}


	//sube y guarda en la BD un file 
	public function getFilesdb()
	{
		return View::make('images.filesdb');

	}
	public function postFilesdb()
	{	
		$fileInput=Input::file('file');

		if (Input::hasFile('file')) 
		{	//id del usuario en sesion
			$id_user=Auth::user()->id;
			//nombre sin cifrar
			$nameNormal=$fileInput->getClientOriginalName();
			//ciframos el nombre 
			$fileName=sha1($nameNormal);
			//path de public and uploads
			$path = public_path().'/uploads/'.$id_user.'/';
			//extencion, pdf, jpg 
			$fileType=$fileInput->guessExtension();
			//obtengo el tamaño
			$fileSize=$fileInput->getClientSize()/1024;
			 	

			 //Ahora procedemos a guardarlo en la BD
			
			 //obtengo el objeto usuario con el id de sesion
			 $usuario=User::find($id_user);

			 //creo un objeto archivo para guardarlo en la BD
			 $file 					=	new Archivo;
			 //obtengo valores
			 $file->nombreCifrado	=	$fileName;
			 $file->nombreNormal	= 	$nameNormal;
			 $file->estado  		= 	0;
			 $file->ruta 			=	$path.$fileName.".".$fileInput->getClientOriginalExtension();
			 $file->tipo 			=	$fileType;
			 $file->tamaño 			=	$fileSize;
			 $file->clientOriginalName=$fileInput->getClientOriginalName();
			 $file->clientOriginalExtension=$fileInput->getClientOriginalExtension();
			 $file->mimeType=$fileInput->getMimeType();
			 $file->realPath=$fileInput->getRealPath();

			 //asocio el archivo con el metodo user(que esta en el modelo Archivo) con su user
			 $file->user()->associate($usuario);
			
			//creamos la carpeta si no existe
			 if(!is_dir($path))
			 {
			 	mkdir($path,0,true);
			 	chmod($path,0755);
			 }
		
			 //guardamos el file en el server y en la BD

			try {
				if($fileInput->move($path,$fileName.'.'.$fileInput->getClientOriginalExtension()))
				{
					try {
						if(!$file->save())
							unlink($path.$fileName.'.'.$fileInput->getClientOriginalExtension());
					} 
					catch (Exception $e) {
						return Response::make('Database error! ' . $e->getCode());
					}
					
				}
			} 
			catch (Exception $ex) {
				return Response::make('Server error! ' . $ex->getCode());
			}

				
		
		}
	}

	

	public function getListarfiles()

	{	$id_user=Auth::user()->id;

		$model=new Archivo;
		//obtengo archivos donde id es igual al del usuario en sesion y el estado de los archivos es 0, con get obtengo todos
		$files=$model->where('user_id','=',$id_user)->where('estado','=',0)->get();
		/*
		//id del usuario en sesion
			//$id_user=Auth::user()->id;
		//obtengo el usuario de sesion
			//$usuario=User::find($id_user);
		//obtengo files del usuario
			//$files=$usuario->archivo;*/

		//return de vista
		return View::make('images.listarfiles',array('files'=>$files));
	}


	public function getDeletefile($file_id)
	{	
		/*
			Tenemos tres opciones.

			1.- Borrar archivo del server y de la bd
			2.-Cambiar estado de file, que sera que fue borrado, pero tenerlo en bd temporalemnte


		*/
			////////FORMA 1 //////////


		$file=Archivo::find($file_id);
		
		
		if(unlink($file->ruta))
		{
			$file->delete();
			return Redirect::to('images/listarfiles')->with('estado', 'ok_delete');
		}
		else
		return Redirect::to('images/listarfiles');


		//////////////FIN F1////////////////


		//////FORMA 2 funcion//////////////////
	
		/*$file= Archivo::where('id','=',$file_id)->update(
			array(
				'estado'=>1
				));

		return Redirect::to('images/listarfiles');*/

		/////////////FIN F2/////////////////

	}

	public function getContentfile($file_id)
	{	//obtengo el archivo de la BD
		$file=Archivo::find($file_id);
		//guardo la ruta
		$ruta=$file->ruta;

		
		//obtengo el contenido del archivo en la BD
		$codigo=file_get_contents($ruta);
		//muestro convierto los cafracteres especiales en entidades html
		$codigo=htmlspecialchars($codigo);

	

		return View::make('images/contentfile',array('codigo'=>$codigo,'file'=>$file));
		//var_dump($codigo);

	}

	public function getZipdb()
	{
		return View::make('images.zipdb');
	}

	public function postZipdb()
	{			
		/*
			Recibiremos el archivo zip y lo mancenamos en public/uploads carpeta del usuario
			 el contenido
		*/	
			 //obtenemos el id del usuario en sesion para su carpeta
			$id_user=Auth::user()->id;
			//obtenemos la ruta donde se guadara el contenido del zip
			$path = public_path().'/uploads/'.$id_user.'/'.$_FILES['file']['name'];
			 //guardamos el nombre temporal de archivo ya que no esta realmente en le server
			$fileZip=$_FILES['file']['tmp_name'];

				
			//creamos un objeto ZipArchive
			$zip=new ZipArchive;
			//validamos el tipo de archivo sea zip
			if ( $_FILES['file']['type'] == 'application/x-zip-compressed' || $_FILES['file']['type'] == 'application/zip')
			{
				//abrimos el zip
				if($zip->open($fileZip) === true)
				{	//extraemos contenido en le path indicado
					if($zip->extractTo($path) === true)
					{	
						echo "pues parece que ahora si";
					}
					//cerramos el objeto zip
					$zip->close();
					
				}
			}	
			
	}






}





