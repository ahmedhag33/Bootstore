<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('desc')->nullable();
            $table->smallInteger('rate')->nullable();
            $table->string('photo')->nullable();
            $table->enum('type', ['purchasable', 'downloadable']);
            $table->string('file')->nullable(); //if downloadable
            $table->float('price')->nullable(); //if purchasable
            $table->float('discount')->nullable(); //if purchasable
            $table->float('new_price')->nullable(); //if purchasable
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('publisher_id')->unsigned()->nullable();
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('author_id')->references('id')->on('authors');
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
        Schema::dropIfExists('books');
    }
}
