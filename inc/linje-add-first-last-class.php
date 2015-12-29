<?php

if ( ! function_exists( 'linje_add_first_and_last' ) ) :
	/**
	 * Add first and last class on nav li's.
	 */
	function linje_add_first_and_last($output) {
		$countMenuItems = wp_get_nav_menu_object( 'main_navigation' );
		if($countMenuItems->count > 1) {
			$output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
			$output = substr_replace($output, 'class="last-menu-item menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
			return $output;
		} else {
			$output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
			return $output;
		}
	}
endif;
add_filter('wp_nav_menu', 'linje_add_first_and_last');