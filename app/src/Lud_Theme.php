<?php

/**
 * Lud_Theme File
 * PHP version 7
 *
 * @category Controllers
 * @package  App
 * @author   Level Up Digital <info@levelup-digital.co.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace App;

/**
 * Lud_Theme Class
 *
 * @category Controllers
 * @package  App
 * @author   Level Up Digital <info@levelup-digital.co.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class Lud_Theme
{
    protected $version = '1.0.0';

    public $modules;

    /**
     * Sets up the Lud_Theme Class
     *
     * @return void
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'assets'));
        add_action('wp_enqueue_scripts', array($this, 'cleanAssets'));
        $this->cleanup();

        $this->modules = Lud_Util::getThemeModules();
    }

    /**
     * Adds the assets to WordPress
     *
     * @return void
     */
    public function assets()
    {
        wp_enqueue_style(
            'app',
            Lud_Util::assetUrl('app', 'css'),
            array(),
            null
        );

        wp_enqueue_script(
            'script-name',
            Lud_Util::assetUrl('app', 'js'), [],
            null,
            true
        );
    }

    /**
     * Removes unneeded assets
     *
     * @return void
     */
    public function cleanAssets()
    {
        if (!is_admin()) {
            wp_deregister_script('wp-embed');
        }
    }

    /**
     * Removes unneeded actions
     *
     * @return void
     */
    public function cleanup()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
    }

}
