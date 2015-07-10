<?php
/**
 * Linje functions and definitions
 *
 * @package Linje
 */

if ( ! function_exists( 'linje_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function linje_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Linje, use a find and replace
	 * to change 'linje' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'linje', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'main_navigation' => esc_html__('Main Navigation', 'linje'),
		'footer_navigation' => esc_html__('Footer Navigation', 'linje')
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'image',
		'video',
		'link',
		'quote'
	) );


}
endif; // linje_setup
add_action( 'after_setup_theme', 'linje_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function linje_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'linje_content_width', 640 );
}
add_action( 'after_setup_theme', 'linje_content_width', 0 );

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

/**
 * Add first and last class on nav li's.
 */
function add_first_and_last($output) {
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
add_filter('wp_nav_menu', 'add_first_and_last');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Include custom bootstrap navigation.
 */
require get_template_directory() . '/inc/custom-navigation.php';

/**
 * Give first p in posts a lead class.
 */
require get_template_directory() . '/inc/linje-lead-paragraph.php';
