<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('sale_type_id')->unsigned();
            $table->string('code', 45)->nullable();
            $table->boolean('is_billed')->nullable();
            $table->integer('months')->unsigned()->nullable();
            $table->decimal('anual_interest', 5,2)->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('sale_type_id')->references('id')->on('sale_types')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
