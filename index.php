
<?php 
global $wp_query;


get_header(); 

	if ( have_posts() ) :

		    echo '<div class="post-wrapper"><div class="container">';

		    $i = 0;
			while ( have_posts() ) : 
				the_post(); 
                
                if ( $i == 0 ) {
                	?>

                	<div class="post-item post-item-first">
						<div class="image">
						<a href="<?php the_permalink(); ?>">
					        <?php the_post_thumbnail(); ?>
					    </a>
					</div>

						<div class="pagina">
							<div class="category">
								<?php the_category(); ?>
							</div>
							
							<div class="title-post">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
						    </a>
							</div>

							<div class="post">
								<?php the_excerpt(); ?>
							</div>

							<a href="<?php the_permalink(); ?>"><div class="leave-comment">LEAVE A COMMENT</div></a>

						</div>
					</div>

				<?php

			} else if ($i == 5) { ?>

					<div class="full-container">
						<div class="newsletter">
							<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
								<aside role="complementary">
									<?php dynamic_sidebar( 'sidebar-3' ); ?>
								</aside>
							<?php endif; ?>
					</div>
					</div>
				

                	<?php
                } else {
             ?>

				<div class="post-item">
					<div class="image">
						<a href="<?php the_permalink(); ?>">
					        <?php the_post_thumbnail('feature-image'); ?>
					    </a>
					</div>

					<div class="pagina2">
						<div class="category">
							<?php the_category(); ?>
						</div>
						
						<div class="title-post">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
						    </a>
						</div>

						<div class="post">
							<?php echo mb_strimwidth( get_the_excerpt(), 0, 450, ' ...' ); ?>
						</div>
					</div>
				</div>
				
	<?php
	             }
	        $i++;
			endwhile;

			echo '</div></div>';

		else :
			echo 'nu avem posturi';

		endif;
		

	if ( $wp_query->max_num_pages > 1)
		echo '<div class="container">
				<div class="button-load_more">
			<button class="btn_loadmore">Load more</button>
				</div>
			</div>'
	?>
	

	<?php get_footer(); ?>

