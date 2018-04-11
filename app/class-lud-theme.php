<?php
/**
 * Lud-Skeleton-Theme Lud_Theme File.
 *
 * @class    Lud_Theme
 * @package  Lud-Skeleton-Theme/Classes
 */

namespace App;

/**
 * Lud_Theme Class
 */
class Lud_Theme {

    /**
     * The theme version.
     *
     * @var string
     */
    protected $version = '1.0.0';

    /**
     * The modules object.
     *
     * @var object
     */
    public $modules;

    /**
     * Sets up the Lud_Theme Class
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'clean_assets' ) );
        $this->cleanup();

        require_once( __DIR__ . '/class-lud-module.php' );

        $this->modules = Lud_Util::get_theme_modules();
    }

    /**
     * Adds the assets to WordPress
     */
    public function assets() {
        wp_enqueue_style(
            'app',
            Lud_Util::asset_url( 'app', 'css' ),
            array(),
            null
        );

        wp_enqueue_script(
            'script-name',
            Lud_Util::asset_url( 'app', 'js' ), [],
            null,
            true
        );
    }

    /**
     * Removes unneeded assets
     */
    public function clean_assets() {
        if ( ! is_admin() ) {
            wp_deregister_script( 'wp-embed' );
        }
    }

    /**
     * Removes unneeded actions
     */
    public function cleanup() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
    }

}
