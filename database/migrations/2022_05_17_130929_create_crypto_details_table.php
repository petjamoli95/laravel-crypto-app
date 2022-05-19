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
            $table->decimal('current_price', 16, 6)->unsigned();
            $table->bigInteger('market_cap')->unsigned();
            $table->integer('market_cap_rank')->unsigned();
            $table->bigInteger('fully_diluted_valuation')->unsigned()->nullable();
            $table->bigInteger('total_volume')->unsigned();
            $table->decimal('high_24h', 16, 6)->unsigned();
            $table->decimal('low_24h', 16, 6)->unsigned();
            $table->decimal('price_change_24h', 16, 6);
            $table->decimal('price_change_percentage_24h', 16, 6);
            $table->bigInteger('market_cap_change_24h');
            $table->decimal('market_cap_change_percentage_24h', 26, 6);
            $table->bigInteger('circulating_supply')->unsigned();
            $table->bigInteger('total_supply')->unsigned()->nullable();
            $table->bigInteger('max_supply')->unsigned()->nullable();
            $table->decimal('ath', 16, 6)->unsigned();
            $table->decimal('ath_change_percentage', 16, 6);
            $table->dateTime('ath_date');
            $table->decimal('atl', 16, 6)->unsigned();
            $table->decimal('atl_change_percentage', 16, 6);
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
