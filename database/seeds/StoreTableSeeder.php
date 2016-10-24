<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store')->delete();
        DB::table('store')->insert([
        	'name' => 'Store1',
        	'address' => 'One Washington Square',
        	'address2' => null,
        	'city' => 'San Jose',
        	'state' => 'California',
        	'zip' => 95113,
        	'country' => 'United States',
        	'phone' => 4085555555,
        	'salesTax' => 8.50
        	]);
    }
}
