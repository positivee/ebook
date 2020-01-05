<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price', '4', '2');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('link', '400');
            $table->string('file', '400');

            $table->bigInteger('bookstore_id')->unsigned()->index();
            $table->foreign('bookstore_id')->references('id')->on('bookstores')->onDelete('cascade');

            $table->bigInteger('book_id')->unsigned()->index();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}