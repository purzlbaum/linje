<div class="row">
	<div class="col-sm-12">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only"><</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand visible-xs" href="<?php echo esc_url( site_url() ); ?>"><?php bloginfo(); ?></a>
		</div>

		<div id="navbar-collapse" class="collapse navbar-collapse">
			<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
				<?php
				wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker()
					)
				);
				?>
			</nav>
			<?php //get_search_form(); ?>
		</div>
	</div>
</div>
