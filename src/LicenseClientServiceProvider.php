<?php

namespace Kerackser\LicenseClient;

use Illuminate\Support\ServiceProvider;

class LicenseClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publicar archivo de configuración
        $this->publishes([
            __DIR__ . '/path/to/config/license_client.php' => config_path('license_client.php'),
        ], 'config');

        // Registrar middleware CheckLicense
        $this->app['router']->aliasMiddleware('check_license', CheckLicense::class);
    }
}
