<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        DB::listen(function ($query){
            Log::info("Query : {$query->sql}");
        });

        // Relation::enforceMorphMap([
        //     'product' => Product::class,
        //     'voucher' => Voucher::class,
        //     'customer' => Customer::class
        // ]);
    }
}
