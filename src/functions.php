<?php

declare(strict_types=1);

use Leaf\Viewi\Engine;

if (!function_exists('viewi')) {
    function viewi(): Engine
    {
        $viewi = Leaf\Config::get('viewi')['instance'] ?? null;

        if (!$viewi) {
            $viewi = new Engine();
            Leaf\Config::set('viewi', ['instance' => $viewi]);
        }

        return $viewi;
    }
}
