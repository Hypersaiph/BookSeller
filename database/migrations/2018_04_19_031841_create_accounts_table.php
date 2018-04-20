<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned();
            $table->string('code', 45)->nullable();
            $table->decimal('amount', 8,2)->nullable();
            $table->decimal('penalty', 8,2)->nullable();
            $table->date('payment_date')->nullable();
            $table->date('limit_payment_date')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
