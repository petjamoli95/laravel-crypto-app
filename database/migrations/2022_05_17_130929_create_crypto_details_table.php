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
            $table->integer('current_price')->unsigned();
            $table->bigInteger('market_cap')->unsigned();
            $table->integer('market_cap_rank')->unsigned();
            $table->bigInteger('fully_diluted_valuation')->unsigned();
            $table->bigInteger('total_volume')->unsigned();
            $table->integer('high_24h')->unsigned();
            $table->integer('low_24h')->unsigned();
            $table->integer('price_change_24h');
            $table->integer('price_change_percentage_24');
            $table->bigInteger('market_cap_change_24');
            $table->integer('market_cap_change_percentage_24h');
            $table->bigInteger('circulating_supply')->unsigned();
            $table->bigInteger('total_supply')->unsigned();
            $table->bigInteger('max_supply')->unsigned();
            $table->integer('ath')->unsigned();
            $table->integer('ath_change_percentage');
            $table->date('ath_date');
            $table->integer('atl')->unsigned();
            $table->integer('atl_change_percentage');
            $table->date('atl_date');
            $table->integer('roi');
            $table->date('last_updated');
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
