<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    /*
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';


    public function product(){
    	return $this->hasOne('App/Products','id','product_id');
    }
}
