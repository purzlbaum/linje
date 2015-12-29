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
			'primary' => esc_html__('Main Navigation', 'linje'),
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
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/linje-scripts-styles.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/linje-template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/linje-extras.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/linje-gfonts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/linje-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/linje-jetpack.php';

/**
 * Include custom bootstrap navigation.
 */
require get_template_directory() . '/inc/linje-custom-navigation.php';

/**
 * Give first p in posts a lead class.
 */
require get_template_directory() . '/inc/linje-lead-paragraph.php';

/**
 * Add first and last class on nav li's.
 */
require get_template_directory() . '/inc/linje-add-first-last-class.php';

/**
 * Add classes to body.
 */
require get_template_directory() . '/inc/linje-layout-options.php';

/**
 * Add sidebars.
 */
require get_template_directory() . '/inc/linje-add-sidebar.php';
