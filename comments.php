<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Linje
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'linje' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="sr-only"><?php esc_html_e( 'Comment navigation', 'linje' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'linje' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'linje' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="sr-only"><?php esc_html_e( 'Comment navigation', 'linje' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'linje' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'linje' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'linje' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array(
		'title_reply' => __('Leave a Reply', 'linje'),
		'title_reply_to' => __('Leave a Reply', 'linje'),
		'comment_notes_before' => __('<div id="required-explain">Your email address will not be published. Required fields are marked with a *.</div>', 'linje'),
		'comment_notes_after' => '',
		'class_form' => 'form-horizontal',
		'class_submit' => 'btn btn-default',
		'label_submit' => __('Post Comment', 'linje'),
		'fields' =>  array(
			'author' => '<div class="comment-form-author form-group">' . '<label class="col-sm-3 control-label" for="author">' . __( 'Name', 'linje' ) . '<span class="required">*</span></label> '.'<div class="col-sm-9"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
			'email'  => '<div class="comment-form-email form-group"><label class="col-sm-3 control-label" for="email">' . __( 'Email', 'linje' ) . '<span class="required">*</span></label> '.'<div class="col-sm-9"><input class="form-control" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',
			'url'    => '<div class="comment-form-url form-group"><label class="col-sm-3 control-label" for="url">' . __( 'Website', 'linje' ) . '</label>' .
				'<div class="col-sm-9"><input class="form-control" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div>',
		),
		'comment_field' => '<div class="comment-form-comment form-group"><label class="col-sm-3 control-label" for="comment">' . __( 'Comment', 'linje' ) . '</label><div class="col-sm-9"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div></div>'
	));
	?>
</div><!-- #comments -->
