<?php

use Illuminate\Database\Seeder;

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
        DB::table('reviews')->insert(array([
        	'rating' => 4,
        	'product_id' => 8,
        	'user_id' => 1,
        	'review' => 'Great Product!'],
        	[
        	'rating' => 5,
        	'product_id' => 8,
        	'user_id' => 1,
        	'review' => 'Amazing Product!'],
        	[
        	'rating' => 2,
        	'product_id' => 8,
        	'user_id' => 1,
        	'review' => 'Terrible Product!'],
        	[
        	'rating' => 3,
        	'product_id' => 8,
        	'user_id' => 1,
        	'review' => 'Okay Product!']
        	));
    }
}
