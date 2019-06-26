<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<aside class="sidebar" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<aside class="TopPost" role="complementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</aside>
<?php endif; ?>