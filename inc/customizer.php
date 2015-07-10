<?php
new theme_customizer();

class theme_customizer {
	public function __construct() {
		add_action( 'customize_register', array(&$this, 'customize_linje' ));
	}

	/**
	 * Customizer manager demo
	 * @param  WP_Customizer_Manager $wp_manager
	 * @return void
	 */
	public function customize_linje( $wp_manager ) {
		$this->linje_background_colors_section( $wp_manager );
		$this->linje_text_colors_section( $wp_manager );
		$this->linje_link_colors_section( $wp_manager );
		$this->linje_fonts_sections( $wp_manager );
		$this->linje_post_format_flag_section( $wp_manager );
		$this->linje_theme_layout_section( $wp_manager );
	}

	/**
	 * Adds the link color section
	 *
	 * @param  Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function linje_background_colors_section( $wp_manager ) {
		$wp_manager->add_section( 'linje_background_color_options', array(
				'title'       => __( 'Theme Background Colors', 'linje' ),
				'priority'    => 20,
				'capability'  => 'edit_theme_options',
				'description' => __( 'Allows you to customize background colors for Linje.', 'linje' )
			)
		);

		$wp_manager->add_setting( 'body_background_color', array(
				'default'           => '#e8e8e7',
				'type'              => 'theme_mod',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);

		$wp_manager->add_setting( 'content_background_color', array(
				'default'           => '#ffffff',
				'type'              => 'theme_mod',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);

		$wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'linje_body_background_color', array(
				'label'    => __( 'Body Background', 'linje' ),
				'section'  => 'linje_background_color_options',
				'settings' => 'body_background_color',
				'priority' => 10
			)
		) );

		$wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'linje_content_background_color', array(
				'label'    => __( 'Content Background', 'linje' ),
				'section'  => 'linje_background_color_options',
				'settings' => 'content_background_color',
				'priority' => 15
			)
		) );
	}

	/**
	 * Adds the link color section
	 *
	 * @param  Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function linje_text_colors_section( $wp_manager ) {
		$wp_manager->add_section( 'linje_color_options', array(
				'title'       => __( 'Theme Text Colors', 'linje' ),
				'priority'    => 22,
				'capability'  => 'edit_theme_options',
				'description' => __( 'Allows you to customize colors for Linje.', 'linje' )
			)
		);

		$wp_manager->add_setting( 'text_color', array(
				'default'           => '#130f30',
				'type'              => 'theme_mod',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);

		$wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'linje_text_color', array(
				'label'    => __( 'Content Color', 'linje' ),
				'section'  => 'linje_color_options',
				'settings' => 'text_color',
				'priority' => 20
			)
		) );
	}

	/**
	 * Adds the link color section
	 *
	 * @param  Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function linje_link_colors_section( $wp_manager ) {
		$wp_manager->add_section( 'linje_link_color_options', array(
				'title'       => __( 'Theme Link Colors', 'linje' ),
				'priority'    => 23,
				'capability'  => 'edit_theme_options',
				'description' => __( 'Allows you to customize link colors for Linje.', 'linje' )
			)
		);

		$wp_manager->add_setting( 'content_link_color', array(
				'default'           => '#130f30',
				'type'              => 'theme_mod',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color',
				'section'           => 'linje_link_color_options'
			)
		);

		$wp_manager->add_setting( 'content_link_color_hover', array(
				'default'           => '#e8e8e7',
				'type'              => 'theme_mod',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_hex_color',
				'section'           => 'linje_link_color_options'
			)
		);

		$wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'linje_content_link_color', array(
				'label'    => __( 'Content Link Color', 'linje' ),
				'section'  => 'linje_link_color_options',
				'settings' => 'content_link_color',
				'priority' => 10
			)
		) );

		$wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'linje_content_link_color_hover', array(
				'label'    => __( 'Content Link Color (on hover)', 'linje' ),
				'section'  => 'linje_link_color_options',
				'settings' => 'content_link_color_hover',
				'priority' => 11
			)
		) );

	}

	/**
	 * Adds the Google Fonts section
	 *
	 * @param  Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function linje_fonts_sections( $wp_manager ) {
		$wp_manager->add_section( 'linje_google_fonts_section', array(
			'title'       => __( 'Google Fonts', 'linje' ),
			'priority'       => 24,
		) );

		$font_choices = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);

		$wp_manager->add_setting( 'linje_headings_fonts', array(
				'sanitize_callback' => 'linje_sanitize_fonts',
			)
		);

		$wp_manager->add_control( 'linje_headings_fonts', array(
				'type' => 'select',
				'description' => __('Select your desired font for the headings.', 'linje'),
				'section' => 'linje_google_fonts_section',
				'choices' => $font_choices
			)
		);

		$wp_manager->add_setting( 'linje_body_fonts', array(
				'sanitize_callback' => 'linje_sanitize_fonts'
			)
		);

		$wp_manager->add_control( 'linje_body_fonts', array(
				'type' => 'select',
				'description' => __( 'Select your desired font for the body.', 'linje' ),
				'section' => 'linje_google_fonts_section',
				'choices' => $font_choices
			)
		);
	}

	/**
	 * Adds the show/hide post format flag section
	 *
	 * @param  Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function linje_post_format_flag_section( $wp_manager ) {
		$wp_manager->add_section( 'linje_post_format_options', array(
				'title'       => __( 'Post Format Options', 'linje' ),
				'priority'    => 25,
				'capability'  => 'edit_theme_options',
				'description' => __( 'Shows/Hides the Post Format Flag.', 'linje' )
			)
		);

		$wp_manager->add_setting(
			'post_format_flags'
		);

		$wp_manager->add_control( 'linje_post_format_flags', array(
				'label'    => __( 'Hide Post Format Flag', 'linje' ),
				'type'     => 'checkbox',
				'section'  => 'linje_post_format_options',
				'settings' => 'post_format_flags',
				'priority' => 10
			)
		);
	}

	/**
	 * Adds a the show/hide post format flag section
	 *
	 * @param  Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function linje_theme_layout_section( $wp_manager ) {
		$wp_manager->add_section( 'linje_theme_layout_options', array(
				'title'       => __( 'Layout Options', 'linje' ),
				'priority'    => 30,
				'capability'  => 'edit_theme_options',
				'description' => __( 'Chose between two layout options.', 'linje' )
			)
		);

		$wp_manager->add_setting(
			'linje_layout_options',
			array(
				'default' => 'no-sidebar',
			)
		);

		$wp_manager->add_control(
			'linje_layout_options',
			array(
				'type' => 'radio',
				'section' => 'linje_theme_layout_options',
				'choices' => array(
					'no-sidebar' => __('No sidebar', 'linje'),
					'with-sidebar' => __('With sidebar', 'linje')
				),
			)
		);
	}

	public static function linje_header_output() {
		?>

		<!-- Customizer CSS -->

		<style type="text/css">
			<?php self::linje_generate_css('body', 'background', 'body_background_color'); ?>
			<?php self::linje_generate_css('body', 'color', 'text_color'); ?>
			<?php self::linje_generate_css('article', 'background', 'content_background_color'); ?>
			<?php self::linje_generate_css('article a:focus, article a:hover', 'color', 'content_link_color_hover'); ?>
			<?php
					echo 'article .inner.bottom-container { border-color: ' . get_theme_mod('body_background_color', '#e8e8e7') . '; }';
			?>
			<?php
					echo 'article a, article .read-more { color: ' . get_theme_mod( 'content_link_color', '#130f30' ) . '; text-shadow: -1px -1px 0 ' . get_theme_mod( 'content_background_color', '#ffffff' ) . ',1px -1px 0 ' . get_theme_mod( 'content_background_color', '#ffffff' ) . ',-1px 1px 0 ' . get_theme_mod( 'content_background_color', '#ffffff' ) . ',1px 1px 0 ' . get_theme_mod( 'content_background_color', '#ffffff' ) . '; background-image: linear-gradient(to top, transparent, transparent 2px, ' . get_theme_mod( 'content_link_color', '#130f30' ) . ' 2px, ' . get_theme_mod( 'content_link_color' ) . ' 3px, transparent 3px); }'
			?>
			<?php
			?>
			<?php echo 'article a:focus, article a:hover, article .read-more:hover { color: ' . get_theme_mod( 'content_link_color_hover', '#41aee9' ) . '; background-image: linear-gradient(to top, transparent, transparent 2px, ' . get_theme_mod( 'content_link_color_hover', '#41aee9' ) . ' 2px, ' . get_theme_mod( 'content_link_color_hover', '#41aee9' ) . ' 3px, transparent 3px);}'; ?>
			<?php echo '.gallery .owl-nav .owl-prev:hover, .gallery .owl-nav .owl-next:hover { background: ' . get_theme_mod( 'content_link_color_hover', '#41aee9' ) . '; }' ?>
			<?php
				$example_position = get_theme_mod( 'linje_layout_options' );
				var_dump($example_position);

				if (get_theme_mod( 'linje_layout_options' )) {
					echo get_theme_mod( 'linje_layout_options' );
				}
            ?>
			<?php
				if (get_theme_mod( 'post_format_flags' )) {
					echo '.post-format-icon { display: none; }';
				}
            ?>
		</style>

		<!--/Customizer CSS-->

	<?php
	}

	public static function linje_live_preview() {
		wp_enqueue_script(
			'linje-themecustomizer', // Give the script a unique ID
			get_template_directory_uri() . '/assets/js/backend/customizer.js', // Define the path to the JS file
			array( 'jquery', 'customize-preview' ), // Define dependencies
			'', // Define a version (optional)
			true // Specify whether to put in footer (leave this true)
		);
	}

	public static function linje_generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
		$return = '';
		$mod    = get_theme_mod( $mod_name );
		if ( ! empty( $mod ) ) {
			$return = sprintf( '%s { %s:%s; }',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);
			if ( $echo ) {
				echo $return;
			}
		}

		return $return;
	}
}

// Setup the Theme Customizer settings and controls...
//add_action( 'customize_register', array( 'theme_customizer', 'customize_linje' ) );

// Output custom CSS to live site
add_action( 'wp_head', array( 'theme_customizer', 'linje_header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', array( 'theme_customizer', 'linje_live_preview' ) );