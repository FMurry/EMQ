<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';



    public function products(){
    	return $this->hasMany('App\Products', 'id', 'product_id');
    }

    public function users(){
    	return $this->hasMany('App\User','id','user_id');
    }
}
