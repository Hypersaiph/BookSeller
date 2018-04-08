<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('language_id')->unsigned();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('edition')->nullable();
            $table->dateTime('publication_date')->nullable();
            $table->string('cover_image', 155);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('language_id')->references('id')->on('languages')->nullable();
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
