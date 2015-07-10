<div class="row">
	<div class="col-sm-12">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only"><</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand visible-xs" href="<?php bloginfo('wpurl'); ?>"><?php bloginfo(); ?></a>
		</div>

		<div id="navbar-collapse" class="collapse navbar-collapse">
			<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'main_navigation',
					'depth' => 2,
					'walker' => new linje_bootstrap_walker(),
					'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>'
				) );
				?>
			</nav>
			<?php //get_search_form(); ?>
		</div>
	</div>
</div>
