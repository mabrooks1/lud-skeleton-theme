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
	 * Returns the url for a theme asset
	 *
	 * @param string $module The module to load.
	 */
	public static function load_module( $module ) {
		require __DIR__ . "/modules/class-$module.php";
	}

}
