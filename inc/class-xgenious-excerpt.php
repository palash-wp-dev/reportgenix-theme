<?php
if (!defined('ABSPATH')){
	exit(); //exit if access it directly
}
/*
* Theme Excerpt Class
* @since 1.0.0
* @source https://gist.github.com/bgallagh3r/8546465
*/
if (!class_exists('Xgenious_excerpt')):
class Xgenious_excerpt {

    public static $length = 55;
    public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100,
      'promo'=>15
    );

    public static $more = true;

    /**
    * Sets the length for the excerpt,
    * then it adds the WP filter
    * And automatically calls the_excerpt();
    *
    * @param string $new_length
    * @return void
    * @author Baylor Rae'
    */
    public static function length($new_length = 55, $more = true) {
        Xgenious_excerpt::$length = $new_length;
        Xgenious_excerpt::$more = $more;

        add_filter( 'excerpt_more', 'Xgenious_excerpt::auto_excerpt_more' );

        add_filter('excerpt_length', 'Xgenious_excerpt::new_length');

        Xgenious_excerpt::output();
    }

    public static function new_length() {
        if( isset(Xgenious_excerpt::$types[Xgenious_excerpt::$length]) )
            return Xgenious_excerpt::$types[Xgenious_excerpt::$length];
        else
            return Xgenious_excerpt::$length;
    }

    public static function output() {
        the_excerpt();
    }

    public static function continue_reading_link() {

        return '<span class="readmore"><a href="'.get_permalink().'">'.esc_html__('Read More','xgenious').'</a></span>';
    }

    public static function auto_excerpt_more( ) {
        if (Xgenious_excerpt::$more) :
            return ' ';
        else :
            return ' ';
        endif;
    }

} //end class
endif;

if (!function_exists('xgenious_excerpt')){

	function xgenious_excerpt($length = 55, $more=true) {
		Xgenious_excerpt::length($length, $more);
	}

}


?>