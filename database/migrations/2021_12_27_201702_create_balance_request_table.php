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
            $table->integer('status');// 0 pending, 1 accepted, 2 rejected

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
