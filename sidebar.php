<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Linje
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php if (get_theme_mod( 'linje_layout_options' ) == 'with-sidebar') : ?>
<div id="secondary" class="widget-area col-sm-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
<?php
	endif;
?>