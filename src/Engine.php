<?php

namespace Leaf\Viewi;

use Leaf\Viewi\Adapter;
use Viewi\App;
use Viewi\PageEngine;
use Viewi\Routing\Route;

class Engine
{
    protected string $dir;

    /**@var \Leaf\App */
    protected $instance;

    /**@var Adapter */
    protected $adapter;

    /**
     * Set leaf instance for viewi engine
     * 
     * @param \Leaf\App $instance Your Leaf app instance
     */
    public function setLeafInstance($instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initialize the viewi engine
     * 
     * @param array $dir Directory containing your Viewi app
     */
    public function init($config = [], $publicConfig = null)
    {
        $config = array_merge([
            PageEngine::SOURCE_DIR => getcwd() . '/viewi-app/Components',
            PageEngine::SERVER_BUILD_DIR =>  getcwd() . '/viewi-app/build',
            PageEngine::PUBLIC_ROOT_DIR => getcwd(),
            PageEngine::DEV_MODE => true,
            PageEngine::RETURN_OUTPUT => true,
            PageEngine::COMBINE_JS => true
        ], $config);

        Route::setAdapter(new Adapter($this->instance ?? app()));
        App::init($config, $publicConfig);
    }

    /**
     * Compile viewi for production
     */
    public function compile()
    {
        App::getEngine()->compile();
    }

    /**
     * Viewi get route
     * 
     * @param string $url The url to load
     * @param string $component The component to load for route
     */
    public function get(string $url, string $component)
    {
        Route::get($url, $component);
    }

    /**
     * Viewi post route
     * 
     * @param string $url The url to load
     * @param string $component The component to load for route
     */
    public function post(string $url, string $component)
    {
        Route::post($url, $component);
    }

    /**
     * Viewi put route
     * 
     * @param string $url The url to load
     * @param string $component The component to load for route
     */
    public function put(string $url, string $component)
    {
        Route::put($url, $component);
    }

    /**
     * Viewi patch route
     * 
     * @param string $url The url to load
     * @param string $component The component to load for route
     */
    public function patch(string $url, string $component)
    {
        Route::patch($url, $component);
    }

    /**
     * Viewi delete route
     * 
     * @param string $url The url to load
     * @param string $component The component to load for route
     */
    public function delete(string $url, string $component)
    {
        Route::delete($url, $component);
    }
}
