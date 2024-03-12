<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blockify
 * @since 1.0.0
 */

/**
 * Enqueue the style.css file.
 *
 * @since 1.0.0
 */

if ( ! function_exists( 'lesson_one_setup' ) ) {
	function lesson_one_setup() {
		add_theme_support( 'wp-block-styles' );
	}
}
add_action( 'after_setup_theme', 'lesson_one_setup' );


function blockify_styles() {

	wp_enqueue_style('blockify-style', get_stylesheet_uri(), [], '1.0.0' );

}


add_action( 'wp_enqueue_scripts', 'blockify_styles' );
