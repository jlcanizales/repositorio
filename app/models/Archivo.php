<?php 

class Archivo extends Eloquent
{	
	protected $table = 'files';
	
	public function user()
	{	//muchos files pertenecen a un usuario
		return $this->belongsTo('User');
	}
	


}