<?php

namespace Donsoft\Zendesk\Providers;

use Donsoft\Zendesk\Services\ZendeskService;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

class ZendeskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


        $source = realpath($raw =__DIR__.'/../../config/zendesk.php') ?: $raw;

        $this->publishes([$source => config_path('zendesk.php')]);

        $this->mergeConfigFrom($source, 'zendesk');



    }

    /**
     * Bootstrap services.
     *
     * @return ZendeskService
     */
    public function boot()
    {

       // $this->mergeConfigFrom(__DIR__.'/config/zendesk.php','zendesk');
        return new ZendeskService;
    }
}
