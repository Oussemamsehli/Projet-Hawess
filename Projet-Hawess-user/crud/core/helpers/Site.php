<?php
/**
 * Site
 *
 * @package Hawess
 * core/helpers/Site.php
 */

class Site
{

	/**
	 * Pagination
	 */
	public static function pagination( array $pagination ) : void
	{
		require( ROOT . '/app/views/pagination.php' );
	}

	/**
	 * Redirect
	 */
	public static function redirect( string $location ) : void
	{
		header( 'Location: ' . $location );
	}

	/**
	 * Title
	 */
	public static function title( $title, string $separator = '#' ) : string
	{
		$name = 'Hawess';

		if ( ! empty( $title ) ) {
			$title = $title . ' ' . $separator . ' ' . $name;
		} else {
			$title = $name;
		}

		return $title;
	}

	/**
	 * Version
	 */
	public static function version() : string
	{
		$version = '0.0.0';

		if ( file_exists( 'version.json' ) ) {
			$json    = file_get_contents( 'version.json' );
			$obj     = json_decode( $json );
			$version = $obj->version;
		}

		return $version;
	}

}
