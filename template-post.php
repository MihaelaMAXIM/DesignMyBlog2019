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