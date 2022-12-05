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
        Schema::create('crypto_details', function (Blueprint $table) {
            $table->id();
            $table->string('api_id');
            $table->string('symbol');
            $table->string('name');
            $table->string('image');
            $table->decimal('current_price')->unsigned();
            $table->bigInteger('market_cap')->unsigned();
            $table->integer('market_cap_rank')->unsigned();
            $table->bigInteger('fully_diluted_valuation')->unsigned()->nullable();
            $table->bigInteger('total_volume')->unsigned();
            $table->decimal('high_24h')->unsigned()->nullable();
            $table->decimal('low_24h')->unsigned()->nullable();
            $table->decimal('price_change_24h')->nullable();
            $table->decimal('price_change_percentage_24h')->nullable();
            $table->bigInteger('market_cap_change_24h')->nullable();
            $table->decimal('market_cap_change_percentage_24h')->nullable();
            $table->bigInteger('circulating_supply')->unsigned();
            $table->bigInteger('total_supply')->unsigned()->nullable();
            $table->bigInteger('max_supply')->unsigned()->nullable();
            $table->string('ath');
            $table->decimal('ath_change_percentage');
            $table->dateTime('ath_date');
            $table->decimal('atl')->unsigned();
            $table->string('atl_change_percentage');
            $table->dateTime('atl_date');
            $table->integer('roi')->nullable();
            $table->dateTime('last_updated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crypto_details');
    }
};
