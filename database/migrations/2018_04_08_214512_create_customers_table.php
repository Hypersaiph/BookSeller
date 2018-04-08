<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 155)->nullable();
            $table->string('surname', 155)->nullable();
            $table->string('nit', 60)->nullable();
            $table->string('email', 155)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 45)->nullable();
            $table->decimal('latitude', 9,6)->nullable();
            $table->decimal('longitude', 9,6)->nullable();
            $table->string('note', 255)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
