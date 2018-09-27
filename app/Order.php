<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public $table = 'order';
	public $primaryKey='order_id';
    protected $fillable = [
    	'user_id','color','design','design_type','item','qty','pay_method','pay_status','addr','order_status'
    ];
}
