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
    protected $table = 'reviews';



    public function product(){
    	return $this->hasOne('App\Products', 'id', 'product_id');
    }

    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
