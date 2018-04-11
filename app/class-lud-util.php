<?php
/**
 * Lud_Util File
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
 * Lud_Util Class
 *
 * @category Controllers
 * @package  App
 * @author   Level Up Digital <info@levelup-digital.co.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class Lud_Util {


    /**
     * Returns the url for a theme asset
     *
     * @param string $file The filename to search for.
     * @param string $extension The extension of the file.
     *
     * @return string
     */
    public static function asset_url( $file, $extension ) {
        $found_file = '';

        $files = array_diff(
            scandir( get_stylesheet_directory() . "/build/$extension" ),
            [ '..', '.' ]
        );

        foreach ( $files as $asset ) {
            $regex = '/' . $file . '.*?\.' . $extension . '/';

            $match_results = preg_match( $regex, $asset );
            if ( $match_results ) {
                $style_dir  = get_stylesheet_directory_uri();
                $found_file = "$style_dir/build/$extension/$asset";
            }
        }

        return $found_file;
    }

    /**
     * Returns an array of all modules and their names.
     *
     * @return object
     */
    public static function get_theme_modules() {
        $modules = (object) '';

        $modules_dir = __DIR__ . '/modules';

        $module_classes = array_diff(
            scandir( $modules_dir ),
            array( '..', '.' )
        );

        foreach ( $module_classes as $module_class ) {
            require_once( "$modules_dir/$module_class" );

            $class_name = str_replace( 'class-', '', $module_class );
            $class_name = str_replace( '-', '_', $class_name );
            $class_name = str_replace( '.php', '', $class_name );
            $class_name = ucwords( $class_name );

            $class_namespace = '\App\Modules\\' . $class_name;

            $module = new $class_namespace();
            $module->setup();

            $modules->{$class_name} = $module;
        }

        return $modules;
    }

    /**
     * Creates a new module.
     *
     * @param string $module_name The name of the module.
     *
     * @return object
     */
    public static function new_module( $module_name ) {
        $module_path = "\App\Modules\\$module_name";

        $module = new $module_path();
        $module->setup();

        return $module;
    }

}
