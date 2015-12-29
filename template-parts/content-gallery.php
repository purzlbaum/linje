<?php
/**
 * Template part for displaying posts.
 *
 * @package Linje
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-format-icon">
		<i aria-hidden="true" class="post-format-gallery"></i>
	</div>
	<div class="inner top-container">
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header>
		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'linje' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="sr-only">"', '"</span>', false )
			) );
			?>
		</div>
	</div>
	<div class="inner bottom-container">
		<footer class="entry-footer inner clearfix">
			<div class="row">
				<?php linje_posted_on(); ?>
				<?php linje_entry_footer(); ?>
				<div class="entry-footer-center col-sm-12">
					<?php linje_entry_footer_comments(); ?>
				</div>
			</div>
		</footer>
	</div>
</article>
