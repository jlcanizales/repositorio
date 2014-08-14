<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

//login
//Route::method('uri',Controllername@methodController)

Route::post('login','UserLogin@user');
Route::get('logout','UserLogin@logout');


//sistema
//REStful  

Route::controller('images','ImagesController');






/*

Route::get('login',array('before'=>'auth.basic',function(){
	return View::make('hello');

Route::get('registrar',function(){
	$user=new User;
	$user->username="doggy";
	$user->email="ferefuc@hotmail.com";
	$user->password=Hash::make('123456');

	$user->save();

	return "listo";
});


Route::get('creartabla',function(){

		Schema::create('users',function($table){
			
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->timestamps();

		});



});
*/













