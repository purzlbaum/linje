<?php
/**
 * Template part for displaying posts.
 *
 * @package Linje
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-format-icon">
		<i aria-hidden="true" class="post-format-quote"></i>
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

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'linje' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div>
	<div class="inner bottom-container">
		<footer class="entry-footer inner clearfix">
			<div class="row">
				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-footer-left col-sm-6">
						<?php linje_posted_on(); ?>
					</div>
				<?php endif; ?>
				<div class="entry-footer-right col-sm-6">
					<?php linje_entry_footer(); ?>
				</div>
				<div class="entry-footer-center col-sm-12">
					<?php linje_entry_footer_comments(); ?>
				</div>
			</div>
		</footer>
	</div>
</article>
