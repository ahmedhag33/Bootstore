<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id')->unsigned()->nullable();
            $table->unsignedBigInteger('user_detail_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('user_detail_id')->references('id')->on('user_details');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
