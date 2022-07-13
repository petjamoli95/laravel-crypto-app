<?php

namespace App\Providers;

use App\Interfaces\CryptoInterface;
use App\Interfaces\CryptoDetailsInterface;
use App\Repositories\CryptoRepository;
use App\Repositories\CryptoDetailsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CryptoInterface::class, CryptoRepository::class);
        $this->app->bind(CryptoDetailsInterface::class, CryptoDetailsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
