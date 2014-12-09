<?php namespace Kevindierkx\ViewLocalization;

use Illuminate\Support\ServiceProvider;
use Kevindierkx\ViewLocalization\FileViewFinder as LocalizationFileViewFinder;

class ViewLocalizationServiceProvider extends ServiceProvider {

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->package('kevindierkx/view-localization', 'view-localization', __DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->registerLocalizationViewFinder();
        $this->registerBootingEvent();
    }

    /**
     * {@inheritdoc}
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
     */
    protected function registerBootingEvent()
    {
        $this->app->booting(function ($app) {
            $view = $app['view'];

            $view->setFinder($app['view-localization.finder']);
        });
    }

}
