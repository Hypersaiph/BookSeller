<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->decimal('price', 7,2);
            $table->integer('pages')->nullable();
            $table->string('isbn10', 60)->nullable();
            $table->string('isbn13', 60)->nullable();
            $table->string('serial_cd', 60)->nullable();
            $table->time('duration')->nullable();
            $table->decimal('weight', 4,2)->nullable();
            $table->decimal('width', 4,2)->nullable();
            $table->decimal('height', 4,2)->nullable();
            $table->decimal('depth', 4,2)->nullable();
            $table->foreign('book_id')->references('id')->on('books')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_types');
    }
}
