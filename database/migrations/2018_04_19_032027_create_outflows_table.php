<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outflows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_type_id')->unsigned();
            $table->integer('sale_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->decimal('selling_price', 8,2)->nullable();
            $table->foreign('book_type_id')->references('id')->on('book_types')->nullable();
            $table->foreign('sale_id')->references('id')->on('sales')->nullable();
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
        Schema::dropIfExists('outflows');
    }
}
