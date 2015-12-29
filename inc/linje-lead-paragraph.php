<?php
if ( ! function_exists( 'linje_lead_paragraph' ) ) :
	function linje_lead_paragraph($content){
		return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
	}
endif;

add_filter('the_content', 'linje_lead_paragraph');