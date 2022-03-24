<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartitems', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id')->unsigned()->nullable();
            $table->unsignedBigInteger('userdetail_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('userdetail_id')->references('id')->on('userdetails');
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
        Schema::dropIfExists('cartitems');
    }
}
