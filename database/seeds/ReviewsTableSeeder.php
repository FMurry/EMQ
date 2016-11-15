<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->delete();
        $review1 = new Review();
        $review1->rating = 1;
        $review1->product_id = 0;
        $review1->review = "Terrible Product!";

        $review2 = new Review();
        $review2->rating = 2;
        $review2->product_id = 0;
        $review2->review = "Bad Product!";

        $review3 = new Review();
        $review3->rating = 3;
        $review3->product_id = 0;
        $review3->review = "Okay Product!";

        $review4 = new Review();
        $review4->rating = 4;
        $review4->product_id = 0;
        $review4->review = "Great Product!";

        $review5 = new Review();
        $review5->rating = 5;
        $review5->product_id = 0;
        $review5->review = "Amazing Product!";

        $reviews = [$review1,$review2,$review3,$review4,$review5];

        //For 16 Products.....
        for ($i=1; $i < 16; $i++) { 
            //For 10 times per product
            for ($j=0; $j <10 ; $j++) {
                $review = $reviews[rand(0,4)];
                $review->product_id = $i; 
                DB::table('reviews')->insert([
                        'rating' => $review->rating,
                        'product_id' => $review->product_id,
                        'user_id' => 1,
                        'review' => $review->review
                    ]);
            }
        }

        // DB::table('reviews')->insert(array(
        //     [
        //     'rating' => 5,
        //     'product_id' => 1,
        //     'user_id' => 1,
        //     'review' => 'Amazing Product!'],
        //     [
        // 	'rating' => 4,
        // 	'product_id' => 8,
        // 	'user_id' => 1,
        // 	'review' => 'Great Product!'],
        // 	[
        // 	'rating' => 5,
        // 	'product_id' => 8,
        // 	'user_id' => 1,
        // 	'review' => 'Amazing Product!'],
        // 	[
        // 	'rating' => 2,
        // 	'product_id' => 8,
        // 	'user_id' => 1,
        // 	'review' => 'Terrible Product!'],
        // 	[
        // 	'rating' => 3,
        // 	'product_id' => 8,
        // 	'user_id' => 1,
        // 	'review' => 'Okay Product!']
        // 	));
    }
}
