<?php

declare(strict_types=1);

use Leaf\Viewi\Engine;

if (!function_exists('viewi')) {
  function viewi(): Engine
  {

    if (!(\Leaf\Config::getStatic('viewi'))) {
      \Leaf\Config::singleton('viewi', function () {
        return new Engine();
      });
    }

    return \Leaf\Config::get('viewi');
  }
}
