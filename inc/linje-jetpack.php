<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Linje
 */

if ( ! function_exists( 'linje_jetpack_setup' ) ) :
	/**
	 * Add theme support for Infinite Scroll.
	 * See: https://jetpack.me/support/infinite-scroll/
	 */
	function linje_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'linje_infinite_scroll_render',
			'footer'    => 'page',
		) );
	} // end function linje_jetpack_setup
endif;
add_action( 'after_setup_theme', 'linje_jetpack_setup' );

if ( ! function_exists( 'linje_infinite_scroll_render' ) ) :
	/**
	 * Custom render function for Infinite Scroll.
	 */
	function linje_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	} // end function linje_infinite_scroll_render
endif;

