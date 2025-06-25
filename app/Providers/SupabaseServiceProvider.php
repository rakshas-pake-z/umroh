<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Supabase\CreateApi;

class SupabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('supabase', function ($app) {
            return CreateApi::create(
                config('services.supabase.url'),
                config('services.supabase.key')
            );
        });
    }
}