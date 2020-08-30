<?php

namespace Donsoft\Zendesk\Providers;

use Donsoft\Zendesk\Services\ZendeskService;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

class ZendeskServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {


        $packageName = 'zendesk';
        $configPath = __DIR__.'/../../config/zendesk.php';

        $this->mergeConfigFrom(
            $configPath, $packageName
        );

        $this->publishes([
            $configPath => config_path(sprintf('%s.php', $packageName)),
        ]);


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
