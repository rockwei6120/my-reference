<?php
/**
 * Created by PhpStorm.
 * User: bexpc
 * Date: 2018/8/20
 * Time: 下午 01:44
 */
namespace Bex\Bulletin;

use Illuminate\Support\ServiceProvider;

class BulletinServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $namespace = 'Bex\Bulletin';
        $config_folder = "Bulletin";//config存放目錄

        $this->loadTranslationsFrom(__DIR__ . '/lang', $namespace);

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes(
            [__DIR__ . '/config' => config_path($config_folder)], $namespace
        );

    }
}