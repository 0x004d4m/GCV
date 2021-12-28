<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('credit');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client');

            $table->unsignedBigInteger('balance_request_id');
            $table->foreign('balance_request_id')->references('id')->on('balance_request');

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
        Schema::dropIfExists('wallet');
    }
}
