<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image');
            $table->integer('amount');

            $table->unsignedBigInteger('balance_status_id');
            $table->foreign('balance_status_id')->references('id')->on('balance_status');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client');

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
        Schema::dropIfExists('balance_request');
    }
}
