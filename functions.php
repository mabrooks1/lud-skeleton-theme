<?php

require 'resources/vendor/autoload.php';

add_action('after_setup_theme', function () {
    WPEmerge::boot();

    require 'app/framework.php';
});