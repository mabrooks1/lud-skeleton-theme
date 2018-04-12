<?php
/**
 * The functions file.
 *
 * @package Lud-Skeleton-Theme/Templates
 */
?>
<?php

require 'resources/vendor/autoload.php';

require_once( __DIR__ . '/app/class-lud-util.php' );
require_once( __DIR__ . '/app/class-lud-theme.php' );

global $theme;

$theme = new \App\Lud_Theme();

$data_generator = \App\Lud_Util::load_module( 'lud-testing-data' );

$args = array(
	'name' => 'name',
	'company' => 'company',
	'address' => 'address',
);

print_r( $data_generator->get_data_set( $args ) );
