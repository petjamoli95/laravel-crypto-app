<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_detail_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('crypto_detail_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            $table->foreign('crypto_detail_id')
              ->references('id')
              ->on('crypto_details')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crypto_user');
    }
};
