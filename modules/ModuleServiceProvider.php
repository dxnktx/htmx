<?php

namespace Modules;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ServiceProvider\RouteServiceProvider;
use Illuminate\Support\Facades\Blade;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    
    public function register() { 
        $this->app->register('Modules\JangKeyte\src\Providers\JangKeyteServiceProvider');
        $this->app->register('Modules\JangKeyte\src\Providers\JangKeyteStubServiceProvider');
        $this->app->register('Modules\Authetication\src\Providers\AutheticationServiceProvider');
        $this->app->register('Modules\Authetication\src\Providers\PermissionsServiceProvider');
        $this->app->register('Modules\TripBooking\src\Providers\TripBookingServiceProvider');
    }

    public function boot()
    {

    }
}