<?php get_header(); ?>

<div id="primary" class="container content-area">
	<main id="main" class="site-main-row" role="main">
		<?php
			$i=0;
			if ( have_posts() ) :

		    	echo '<div class="post-wrapper"><div class="container">';

		    $i = 0;

			while ( have_posts() ) : 
				the_post(); 
                
                if ( $i == 0 ) {
                	?>

                	<div class="post-item post-item-first">
						<div class="image">
						    <?php the_post_thumbnail(get_the_ID(), 'cover-post'); ?>
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

			} 

			else if ($i == 5) { ?>
	
                	<?php

                } else {

				?>

				<div class="post-item">
						<div class="image">
					    <?php the_post_thumbnail(); ?>
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
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
				
	<?php
	             }
	        $i++;
			endwhile;

			echo '</div></div>';

		else :
			echo _e( 'There are no articles to show. Sorry.', 'designmyblog' );

		endif;
	?>
</main>
</div>

<?php get_footer();