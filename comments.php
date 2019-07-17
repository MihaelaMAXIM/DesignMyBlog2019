<?php

	if ( post_password_required() ) {
		return;
	}
?>

	<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				
				printf( _x( '1 COMMENT', 'comments title', 'designmyblog' ), get_the_title() );
			} else {
				printf(
			
					_nx(
						'%1$s COMMENT',
						'%1$s COMMENTS',
						$comments_number,
						'comments title',
						'designmyblog'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 75,
					)
				);
			?>
		</ol>
		<?php the_comments_navigation(); ?>

	<?php endif;  
		
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'designmyblog' ); ?></p>
	<?php endif; 

	
		comment_form(
			array(
				'title_reply_before' => '',
				'title_reply_after'  => '',
				'title_reply'        => '',
				'logged_in_as' => '<p class="logged-in-as">' . get_avatar( get_current_user_id() ) . '</p>',
			)
		);
		?>

</div>
