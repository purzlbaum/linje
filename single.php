<?php
/**
 * The template for displaying all single posts.
 *
 * @package Linje
 */

get_header();

if (get_theme_mod('linje_layout_options') == 'with-sidebar') {
    $classContent = ' col-sm-8';
} else {
    $classContent = ' col-sm-12';
}
?>

<div class="row">
    <div id="primary" class="content-area<?php echo $classContent; ?>">
        <main id="main" class="site-main" role="main">

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts/content', get_post_format()); ?>

                <aside class="navigation post-nav" role="navigation">
                    <h2 class="sr-only"><?php esc_html_e('Post navigation', 'linje'); ?></h2>
                    <div class="nav-links row">
                        <?php
                        if (is_singular('post')) {
                            // Previous/next post navigation.
                            the_post_navigation(array(
                                'next_text' => '<div class="col-sm-6 nav-previous text-right"><span class="meta-nav" aria-hidden="true">' . __('Next', 'twentysixteen') . '</span> ' .
                                    '<span class="screen-reader-text">' . __('Next post:', 'twentysixteen') . '</span> ' .
                                    '<span class="post-title">%title</span></div>',
                                'prev_text' => '<div class="col-sm-6 nav-next"><span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentysixteen') . '</span> ' .
                                    '<span class="screen-reader-text">' . __('Previous post:', 'twentysixteen') . '</span> ' .
                                    '<span class="post-title">%title</span></div>',
                            ));
                        }
                        ?>
                    </div>
                </aside>
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div>

    <?php if (get_theme_mod('linje_layout_options') == 'with-sidebar') : ?>

        <?php get_sidebar(); ?>

    <?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
