<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Review;

class ReviewController extends Controller
{
    //

	public function getReviews($product_id){
		return view('/');
	}
	public static function reviewCount($product_id){
		return count(Review::where('product_id',$product_id)->get());
	}

    public static function calculateAverage($product_id){
    	$reviews = Review::where('product_id',$product_id)->get();
    	if(count($reviews) == 0){
    		return 0;
    	}
    	else{
    		$total = 0.0;
    		foreach ($reviews as $review) {
    			$total += $review->rating;
    		}

    		return $total/count($reviews);
    	}
    }

    /**
    *   Gets Top 5 reviews based on how helpful they were
    *
    **/
    public static function getPopularReviews($product_id){
        $reviews = Review::where('product_id', $product_id)
        ->orderBy('helpful','desc')
        ->take(5)
        ->get();
        return $reviews;
    }
}
