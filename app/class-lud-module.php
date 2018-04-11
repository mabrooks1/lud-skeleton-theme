<?php
/**
 * Lud_Module File
 * PHP version 7
 *
 * @category Interfaces
 * @package  App
 * @author   Level Up Digital <info@levelup-digital.co.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

namespace App;

/**
 * Lud_Module Interface
 *
 * @category Interfaces
 * @package  App
 * @author   Level Up Digital <info@levelup-digital.co.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
interface Lud_Module {


	/**
	 * Setups the module.
	 *
	 * @return void
	 */
	public function setup();

	/**
	 * Runs any needed Queries.
	 *
	 * @param array $args The arguments for the query.
	 *
	 * @return void
	 */
	public function query( $args);

	/**
	 * Returns the module response.
	 *
	 * @return array
	 */
	public function response();

}
