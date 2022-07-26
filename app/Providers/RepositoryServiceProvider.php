<?php

namespace App\Providers;

use App\Interfaces\CryptoDetailsInterface;
use App\Interfaces\CryptoInterface;
use App\Repositories\CryptoDetailsRepository;
use App\Repositories\CryptoRepository;
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
