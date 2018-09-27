<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topUp extends Model
{
    public $table = 'topup';
	public $primaryKey='id';
	public $timestamps=false;

    protected $fillable = [
    	'user_id','amount','status',
    ];
}
