<?php

require 'resources/vendor/autoload.php';

global $theme;

$theme = new \App\Lud_Theme();

print_r(\App\Lud_Util::newModule('Lud_Filter'));