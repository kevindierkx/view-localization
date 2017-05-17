<?php namespace Kevindierkx\ViewLocalization;

use Illuminate\Support\ServiceProvider;
use Kevindierkx\ViewLocalization\FileViewFinder as LocalizationFileViewFinder;

class ViewLocalizationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('view-localization.finder', function ($app) {
            $paths = $app['config']['view.paths'];
            return new LocalizationFileViewFinder($app['files'], $app['translator'], $paths);
        });

        $this->app->booting(function ($app) {
            $view = $app['view'];
            $view->setFinder($app['view-localization.finder']);
        });
    }
}
