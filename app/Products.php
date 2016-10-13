<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';


    public function isAvailable(){
        if( $this->quantity > 0 ){
            $this->quantity--;
            $this->save(); //Need to always save changes.
            return true;
        }
        return false;
    }


}
