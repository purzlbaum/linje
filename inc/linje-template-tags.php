<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Linje
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 */

	function the_posts_navigation() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation posts-navigation" role="navigation">
			<h2 class="sr-only"><?php esc_html_e( 'Posts navigation', 'linje' ); ?></h2>
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( esc_html__( 'Older posts', 'linje' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'linje' ) ); ?></div>
				<?php endif; ?>

			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'the_post_navigation' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function the_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<h2 class="sr-only"><?php esc_html_e( 'Post navigation', 'linje' ); ?></h2>
			<div class="nav-links row">
				<?php
					previous_post_link( '<div class="col-sm-6 nav-previous">%link</div>', '%title' );
					next_post_link( '<div class="col-sm-6 nav-next">%link</div>', '%title' );
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'linje_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function linje_posted_on() {
		if ( 'post' == get_post_type() ) {
			if (get_theme_mod( 'linje_layout_options' ) == 'with-sidebar') {
				$class = 'col-lg-6';
			} else {
				$class = 'col-sm-6';
			}

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);

			$posted_on = sprintf(
				esc_html_x( 'Posted on %s', 'post date', 'linje' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);

			$byline = sprintf(
				esc_html_x( 'By %s', 'post author', 'linje' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);


			echo '<div class="entry-footer-left ' . $class .'">';
			echo '<span class="byline"> ' . $byline . '</span><br><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'linje_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories and tags.
	 */
	function linje_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {

			if (get_theme_mod( 'linje_layout_options' ) == 'with-sidebar') {
				$class = 'col-lg-6';
			} else {
				$class = 'col-sm-6';
			}

			echo '<div class="entry-footer-right ' . $class .'">';
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'linje' ) );

			if ( $categories_list && linje_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'linje' ) . '</span><br>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'linje' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'linje' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'linje_entry_footer_comments' ) ) :
	/**
	 * Prints HTML with meta information for the comments.
	 */
	function linje_entry_footer_comments() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"><i aria-hidden="true" class="fa fa-comment-o"></i> ';
			comments_popup_link( esc_html__( 'Leave a comment', 'linje' ), esc_html__( '1 Comment', 'linje' ), esc_html__( '% Comments', 'linje' ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'linje_edit' ) ) :
	/**
	 * Prints HTML with meta information for the comments.
	 */
	function linje_edit() {
		edit_post_link( esc_html__( 'Edit', 'linje' ), '<span class="edit-link">', '</span>' );
	}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
	/**
	 * Shim for `the_archive_title()`.
	 *
	 * Display the archive title based on the queried object.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 *
	 * @param string $before Optional. Content to prepend to the title. Default empty.
	 * @param string $after  Optional. Content to append to the title. Default empty.
	 */
	function the_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( esc_html__( 'Category: %s', 'linje' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( esc_html__( 'Tag: %s', 'linje' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( esc_html__( 'Author: %s', 'linje' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( esc_html__( 'Year: %s', 'linje' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'linje' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( esc_html__( 'Month: %s', 'linje' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'linje' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( esc_html__( 'Day: %s', 'linje' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'linje' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = esc_html_x( 'Asides', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = esc_html_x( 'Galleries', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = esc_html_x( 'Images', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = esc_html_x( 'Videos', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = esc_html_x( 'Quotes', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = esc_html_x( 'Links', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = esc_html_x( 'Statuses', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = esc_html_x( 'Audio', 'post format archive title', 'linje' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = esc_html_x( 'Chats', 'post format archive title', 'linje' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( esc_html__( 'Archives: %s', 'linje' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( esc_html__( '%1$s: %2$s', 'linje' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = esc_html__( 'Archives', 'linje' );
		}

		/**
		 * Filter the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		$title = apply_filters( 'get_the_archive_title', $title );

		if ( ! empty( $title ) ) {
			echo $before . $title . $after;  // WPCS: XSS OK.
		}
	}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
	/**
	 * Shim for `the_archive_description()`.
	 *
	 * Display category, tag, or term description.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 *
	 * @param string $before Optional. Content to prepend to the description. Default empty.
	 * @param string $after  Optional. Content to append to the description. Default empty.
	 */
	function the_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );

		if ( ! empty( $description ) ) {
			/**
			 * Filter the archive description.
			 *
			 * @see term_description()
			 *
			 * @param string $description Archive description to be displayed.
			 */
			echo $before . $description . $after;  // WPCS: XSS OK.
		}
	}
endif;

if ( ! function_exists( 'linje_categorized_blog' ) ) :
	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	function linje_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'linje_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'linje_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 0 ) {
			// This blog has more than 1 category so linje_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so linje_categorized_blog should return false.
			return false;
		}
	}
endif;

if ( ! function_exists( 'linje_category_transient_flusher' ) ) :
	/**
	 * Flush out the transients used in linje_categorized_blog.
	 */
	function linje_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'linje_categories' );
	}
endif;
add_action( 'edit_category', 'linje_category_transient_flusher' );
add_action( 'save_post',     'linje_category_transient_flusher' );

if ( ! function_exists( 'linje_get_link_url' ) ) :
	/**
	 * Return the post URL.
	 *
	 * Falls back to the post permalink if no URL is found in the post.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @see get_url_in_content()
	 *
	 * @return string The Link format URL.
	 */
	function linje_get_link_url() {
		$has_url = get_url_in_content( get_the_content() );

		return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	}
endif;
