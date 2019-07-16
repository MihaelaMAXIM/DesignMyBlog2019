<?php

get_header(); ?>

<section>
	<div id="primary" class="container content-area">
		<main id="main" class="site-main row error-404 not-found" role="main">
			<h1><?php _e( '404', 'designmyblog'); ?></h1>
				<p><?php _e( 'We are sorry. Unfortunately, this is an end. We could not find this page :(');?></p>

			<?php get_search_form();?>
			
		</main>
	</div>
</section>

<?php get_footer(); ?>