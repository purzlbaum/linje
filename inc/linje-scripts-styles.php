<?php


/**
 * Enqueue scripts and styles.
 */
function linje_scripts() {
	$headings_font = esc_html(get_theme_mod('linje_headings_fonts'));
	$body_font = esc_html(get_theme_mod('linje_body_fonts'));

	if( $headings_font ) {
		wp_enqueue_style( 'linje-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	} else {
		wp_enqueue_style( 'linje-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $body_font ) {
		wp_enqueue_style( 'linje-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );
	} else {
		wp_enqueue_style( 'linje-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}

	wp_enqueue_style( 'linje-css', get_template_directory_uri() . '/assets/css/default.css' );

	wp_enqueue_script( 'linje-js', get_template_directory_uri() . '/assets/js/theme.min.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'linje_scripts' );

if ( ! function_exists( 'linje_scripts_styles' ) ) :
	function linje_scripts_styles() {
		$headings_font = esc_html(get_theme_mod('linje_headings_fonts'));
		$body_font = esc_html(get_theme_mod('linje_body_fonts'));

		if( $headings_font ) {
			wp_enqueue_style( 'linje-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
		} else {
			wp_enqueue_style( 'linje-lato-font', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
		}
		if( $body_font ) {
			wp_enqueue_style( 'linje-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );
		} else {
			wp_enqueue_style( 'linje-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
		}

		wp_enqueue_style( 'linje-css', get_template_directory_uri() . '/assets/css/default.css' );

		wp_enqueue_script( 'linje-js', get_template_directory_uri() . '/assets/js/theme.min.js' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'linje_scripts_styles' );
add_action( 'wp_enqueue_scripts', 'linje_custom_styles' );
