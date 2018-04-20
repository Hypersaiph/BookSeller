<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inflows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_type_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->foreign('book_type_id')->references('id')->on('book_types')->nullable();
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
        Schema::dropIfExists('inflows');
    }
}
