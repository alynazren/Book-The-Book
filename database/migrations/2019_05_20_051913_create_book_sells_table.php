<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_sells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->year('year');
            $table->string('isbn');
            $table->string('coverPage');
            $table->decimal('price',5,2);
            $table->integer('status_id')->unsigned();
            $table->string('bookSell_id')->unique();
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
        Schema::dropIfExists('book_sells');
    }
}
