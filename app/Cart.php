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


    public function exists($userId, $productId){
    	$query = DB::table('cart')->where('user_id', $userId)->where('product_id', $productId)->exist();
    	if($query){
    		DB::table('cart')->where('user_id', $userId)->where('product_id',$productId)->increment('quantity');
    	}
    	else{
    		DB::table('cart')->insert([
    			['user_id' => $userId],
    			['product_id' => $productId],
    			['quantity' => 1]
    		]);
    	}
    }

    public function incrementCartProductQuantity(){
        $this->increment('quantity');
    }



}
