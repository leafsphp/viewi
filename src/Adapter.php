<?php

namespace Leaf\Viewi;

use Leaf\Viewi\RawResponse;
use Viewi\Routing\RouteAdapterBase;
use Viewi\Routing\Router;

class Adapter extends RouteAdapterBase
{
    /**@var \Leaf\App */
    private $leafInstance;

    public function __construct(\Leaf\App $leafInstance)
    {
        $this->leafInstance = $leafInstance;
    }

    public function register($method, $url, $component, $defaults)
    {
        if ($url === '*') {
            $this->leafInstance->set404(function () use ($url) {
                $response = Router::handle($url, 'get');
                response()->markup($response);
            });
        } else {
            $this->leafInstance->get($url, function () use ($url) {
                $response = Router::handle($url, 'get');
                response()->markup($response);
            });
        }
    }

    public function handle($method, $url, $params = null)
    {
        $originResponse = $this->leafInstance->response();
        // new response instance
        $internalResponse = new RawResponse();
        $internalResponse->makeInternal(); // make it not to send output
        // set as current response instance
        \Leaf\Config::set("response", ["instance" => $internalResponse]);
        // handle url internally
        $this->leafInstance->handleUrl(strtoupper($method), $url);
        // set original response back
        \Leaf\Config::set("response", ["instance" => $originResponse]);
        // return data to Viewi
        return $internalResponse->getRawData();
    }
}
