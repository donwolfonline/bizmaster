<?php
/**
 * Theme Excerpt
 * @package bizmaster
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
    exit(); //exit if access it directly
}

if (!class_exists('Bizmaster_Excerpt')):
class Bizmaster_Excerpt {

    public static $length = 55;
	public static $more = '...';
	public static $types = array(
      'short' => 35,
      'regular' => 55,
      'long' => 100,
      'promo' => 15
    );

    /**
    * Sets the length for the excerpt,
    * then it adds the WP filter
    * And automatically calls the_excerpt();
    *
    * @param string $new_length
    * @return void
    * @author Baylor Rae'
    */
    public static function length($new_length = 55, $more = '...') {
        Bizmaster_Excerpt::$length = $new_length;
        Bizmaster_Excerpt::$more = $more;

        add_filter( 'excerpt_more', 'Bizmaster_Excerpt::auto_excerpt_more' );
		add_filter( 'excerpt_length', 'Bizmaster_Excerpt::new_length' );
		Bizmaster_Excerpt::output();
	}

    public static function new_length() {
        if( isset(Bizmaster_Excerpt::$types[Bizmaster_Excerpt::$length]) )
            return Bizmaster_Excerpt::$types[Bizmaster_Excerpt::$length];
        else
            return Bizmaster_Excerpt::$length;
    }

    public static function output() {
        the_excerpt();
    }

    public static function auto_excerpt_more() {
		return Bizmaster_Excerpt::$more;
	}

} //end class
endif;

if (!function_exists('Bizmaster_Excerpt')){
	function Bizmaster_Excerpt($length = 55, $more = '...') {
		Bizmaster_Excerpt::length($length, $more);
	}
}
?>