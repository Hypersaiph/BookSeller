<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookPublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_publishers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_type_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->foreign('book_type_id')->references('id')->on('book_types')->nullable();
            $table->foreign('publisher_id')->references('id')->on('publishers')->nullable();
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
        Schema::dropIfExists('book_publishers');
    }
}
