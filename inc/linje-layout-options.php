<?php
if ( ! function_exists( 'linje_layout_classes' ) ) :
	// Add specific CSS class by filter
	function linje_layout_classes( $classes ) {
		$classes[] = get_theme_mod( 'linje_layout_options' );
		return $classes;
	}
	add_filter( 'body_class', 'linje_layout_classes' );
endif;

