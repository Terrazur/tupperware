<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('order_id');
            $table->string('user_id');
            $table->string('color');
            $table->string('design');
            $table->string('design_type');
            $table->string('item');
            $table->string('qty');
            $table->string('addr');
            $table->string('pay_method');
            $table->string('pay_status');
            $table->string('order_status');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
