<?php

namespace Workflow\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('hasRole', function ($expression) {
            $code = "<?php if(Auth::check() && Auth::User()->hasRole($expression)): ?>";
            return $code;
        });

        Blade::directive('endHasRole', function(){
            return "<?php endif ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
