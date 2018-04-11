<?php
/**
 * The functions file.
 *
 * @package Lud-Skeleton-Theme/Templates
 */
?>
<?php

require 'resources/vendor/autoload.php';

require_once(__DIR__.'/app/class-lud-util.php');
require_once(__DIR__.'/app/class-lud-theme.php');

global $theme;

$theme = new \App\Lud_Theme();
