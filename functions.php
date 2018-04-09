<?php

require 'resources/vendor/autoload.php';

add_action('after_setup_theme', function () {
    WPEmerge::boot([
        'providers' => [
            \WPEmergeTwig\View\ServiceProvider::class,
        ],
    ]);
    $container = WPEmerge::getContainer();
    $container[WPEMERGE_VIEW_ENGINE_KEY] = $container->raw(WPEMERGETWIG_VIEW_TWIG_VIEW_ENGINE_KEY);

    require 'app/framework.php';
});