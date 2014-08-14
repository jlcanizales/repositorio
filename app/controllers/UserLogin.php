<?php

class UserLogin extends BaseController
{	

	public function user()
	{	

		//reglas de validacion de user
		$rules = array(
			'username' => 'required|min:3|max:30',
			'password' => 'required|min:3|max:30'
			);	

		//mensajes 
		$messages = array(
			'required'=> 'El campo :attribute es obligatorio',
			'min' => 'El campo :attribute no puede tener menos de :min caracteres',
			'max' => 'El campo :attribute no puede tener más de :max caracteres',
			);



		$validation = Validator::make(Input::all(),$rules,$messages);
		//si la validacion falla redirigimos al formulario de login con los errores

		if($validation->fails())
		{	//Regresa a la url anterio y le manda los errores que obtuvo con la validation
			return Redirect::back()->withInput()->withErrors($validation);
		}
		else
		{		
				$userdata=array(
				'username'=>Input::get('username'),
				'password'=>Input::get('password'),
				);
				//si el usuario existe 
			if(Auth::attempt($userdata))
			{	// si existe el usuario lo llevamos al home y mandamos el objeto usuario a la vista home
				
				return View::make('images/home');
			}
			else
			{	//con ->with enviamos login_errors y su valor true que 
				//sera enviada al login, es una variable de sesion
				return Redirect::to('/')->with('login_errors',true);
			}
		}


		
	}
	//lo deslogueamos y mandamos a la raiz que es el formulario de login
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}




}