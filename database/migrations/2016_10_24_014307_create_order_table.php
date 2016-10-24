<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('store_id');
            $table->integer('orderaddress_id');
            $table->integer('orderpayment_id');
            $table->decimal('cost',10,2);
            $table->decimal('total',10,2);
            $table->decimal('tax',10,2);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }
}
