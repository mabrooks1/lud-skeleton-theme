<?php
/**
 * Lud_Testing_Data File
 * PHP version 7
 *
 * @category Modules
 * @package  App\Modules
 * @author   Level Up Digital <info@levelup-digital.co.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace App\Modules;

/**
 * Lud_Testing_Data Class
 *
 * An data generator for the lud_v2 theme.
 *
 * @category Controllers
 * @package  App\Modules
 * @author   Level Up Digital <info@levelup-digital.co.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
class Lud_Testing_Data {

	/**
	 * Generates the data from faker.
	 *
	 * @param string $data_type The data type to be returned.
	 *
	 * @return string|array
	 */
	public function get_data( $data_type ) {

		$faker = \Faker\Factory::create();

		return $faker->{$data_type};

	}

	/**
	 * Generates a set of data from faker.
	 *
	 * @param array $data_types The array of data types to be returned.
	 *
	 * @return array
	 */
	public function get_data_set( array $data_types ) {
		$data = array();

		$faker = \Faker\Factory::create();

		foreach ( $data_types as $key => $data_type ) {
			$data[ $key ] = $faker->{$data_type};
		}

		return $data;

	}

}
