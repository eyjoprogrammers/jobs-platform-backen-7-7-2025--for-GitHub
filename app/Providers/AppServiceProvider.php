<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function boot()
{
    Factory::guessFactoryNamesUsing(function (string $modelName) {
        return 'Database\\Factories\\'.class_basename($modelName).'Factory';
    });

    // تعيين لغة Faker إلى العربية
    $this->app->singleton(\Faker\Generator::class, function () {
        return FakerFactory::create('ar_EG'); // أو ar_EG أو ar_JO حسب لهجتك المفضلة
    });
}
}
