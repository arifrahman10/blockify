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


function prefix_default_page_template( $settings ) {
	$settings['defaultBlockTemplate'] = '
	<!-- wp:template-part {"slug":"header","theme":"theme-slug","tagName":"header"} /-->
		<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
		<main class="wp-block-group">
		<!-- wp:post-title /-->
		<!-- wp:post-content /-->
		</main>
		<!-- /wp:group -->
	<!-- wp:template-part {"slug":"footer","theme":"theme-slug","tagName":"footer"} /-->';
	return $settings;
}
add_filter( 'block_editor_settings_all', 'prefix_default_page_template' );

function myplugin_register_book_post_type() {
	$args = array(
		'public' => true,
		'label'  => 'Books ddd',
		'show_in_rest' => true,
		'template' => array(
			array( 'core/columns', array(), array(
				array( 'core/column', array(), array(
					array( 'core/image', array() ),
				) ),
				array( 'core/column', array(), array(
					array( 'core/paragraph', array(
						'placeholder' => 'Add a inner paragraph'
					) ),
				) ),
			) )
		),
	);
	register_post_type( 'book', $args );
}
add_action( 'init', 'myplugin_register_book_post_type' );