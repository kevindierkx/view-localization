<?php namespace PCextreme\ViewLocalization;

use Illuminate\Support\ServiceProvider;
use PCextreme\ViewLocalization\FileViewFinder as LocalizationFileViewFinder;

class ViewLocalizationServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('pcextreme/view-localization', 'view-localization', __DIR__);
    }

    /**
     * Register bindings for the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLocalizationViewFinder();
        $this->registerBootingEvent();
    }

    /**
     * Register the view finder implementation.
     *
     * @return void
     */
    public function registerLocalizationViewFinder()
    {
        $this->app->bindShared('view-localization.finder', function($app)
        {
            $paths = $app['config']['view.paths'];

            return new LocalizationFileViewFinder($app['files'], $app['translator'], $paths);
        });
    }

    /**
     * Register the booting event.
     *
     * @return void
     */
    protected function registerBootingEvent()
    {
        $this->app->booting(function ($app) {
            $view = $app['view'];

            $view->setFinder($app['view-localization.finder']);
        });
    }
}
