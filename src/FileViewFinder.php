<?php namespace PCextreme\ViewLocalization;

use Illuminate\View\FileViewFinder as IlluminateFileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\Translator;

class FileViewFinder extends IlluminateFileViewFinder
{
    /**
     * The translator implementation.
     *
     * @var \Illuminate\Translation\Translator
     */
    protected $translator;

    /**
     * Create a new file view loader instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  array  $paths
     * @param  array  $extensions
     * @return void
     */
    public function __construct(Filesystem $files, Translator $translator, array $paths, array $extensions = null)
    {
        $this->translator = $translator;

        parent::__construct($files, $paths, $extensions);
    }

    /**
     * Find the given view in the list of paths.
     *
     * @param  string  $name
     * @param  array   $paths
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    protected function findInPaths($name, $paths)
    {
        $locale = $this->translator->getLocale();
        $fallback = $this->translator->getFallback();

        foreach ((array) $paths as $path) {
            foreach ($this->getPossibleViewFiles($name) as $file) {
                // Check the locale directory first.
                if ($this->files->exists($viewPath = $path.'/'.$locale.'/'.$file)) {
                    return $viewPath;

                // Validate the fallback and check the directory.
                } elseif (isset($fallback) && $this->files->exists($viewPath = $path.'/'.$fallback.'/'.$file)) {
                    return $viewPath;

                // If both directories don't contain the view file check the default location.
                } if ($this->files->exists($viewPath = $path.'/'.$file)) {
                    return $viewPath;
                }
            }
        }

        throw new \InvalidArgumentException("View [$name] not found.");
    }
}
