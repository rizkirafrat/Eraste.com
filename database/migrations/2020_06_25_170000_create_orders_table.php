<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_code',20);
            $table->unsignedBigInteger('id_product');
            $table->mediumInteger('qty');
            $table->bigInteger('total_order');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);


            $table->index(['id_product', 'order_code']);
            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
