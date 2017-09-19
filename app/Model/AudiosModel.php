<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AudiosModel extends Model
{
    protected $table = 'audios';

	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	 */
	
	protected $guarded = ['id'];
	
	protected $fillable = [
		'audio',
		'palabra'
		];
}
