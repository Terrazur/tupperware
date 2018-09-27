<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public $table = 'template';
	public $primaryKey='template_id';
	public $timestamps=false;
    protected $fillable = [
    	'image',
    ];
}
