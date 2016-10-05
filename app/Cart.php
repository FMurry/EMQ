<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cart';



    public function product(){
    	//Relation (Foreign Object, Foreign ID, Local ID)
    	return $this->hasOne('App\Products', 'id', 'product_id');
    }

}
