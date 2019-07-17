<?php get_header(); 

	if ( have_posts() ) :

		echo '<div class="container">';

		while ( have_posts() ) : 
				the_post(); 

		?> 

						<div class="image">
						    <?php the_post_thumbnail(get_the_ID(), 'cover-post'); ?>
						</div>


				<div class="post-aside">
					<div class="principal-post">
						<div class="pagina2">
							<div class="category">
								<?php the_category(); ?>
							</div>
							
							<div class="title-post">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
						    </a>
							</div>

							<div class="single-post">
								<?php the_content(); ?>
							</div>


					<div class="container">
					<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
						<aside role="complementary">
							<?php dynamic_sidebar( 'sidebar-2' ); ?>
						</aside>
					<?php endif; ?>
					</div> 
	
					
					<div class="container">
							<?php
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
				</div>

					<div class="container">
							<div class="connected">
								<p>CONNECTED WITH</p>
								<a href="http://twitter.com"><i class="fab fa-twitter"></i></a>
								<a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a>
							</div>
						</div>

				<?php
					endwhile; 
				?>

						</div>
					</div>

					<div class="sidebar">
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
						<aside role="complementary">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
						</aside>
					<?php endif; ?>
					</div>

		<?php

			echo '</div></div>'; ?>

		<?php

		else:
			echo 'nu avem posturi';

		endif;
?>

<?php
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 )
		echo '<div class="container" style="padding: 160px 0 1230px 0;">
			<button class="btn_loadmore">Load more</button>
			</div>'
	?>


<?php get_footer(); ?>