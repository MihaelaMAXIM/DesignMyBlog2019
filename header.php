<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<?php wp_head(); ?>
	</head>

	<header>
		<div class="container">
			<div class="header">
			<div id="title">
				<a href="<?php bloginfo('url'); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
			</div>
			
			<div class="hamburger"> 
				<input type="checkbox">
				<span></span>
				<span></span>
				<span></span>
			</div>

		<?php 
			if ( has_nav_menu ( 'primary' ) ) :
				wp_nav_menu ( array (
					'theme_location' => 'primary',
					'container' => 'nav'
				) );
			endif;
		?>
			</div>
		</div>
	</header>

	<body>

