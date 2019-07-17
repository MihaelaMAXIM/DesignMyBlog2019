<?php

if ( ! function_exists ( 'designmyblog_setup' ) ) :
	function designmyblog_setup() {
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'feature-image', 421, 280, true );

		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'designmyblog'),
			)
		);
	}

	add_action( 'after_setup_theme', 'designmyblog_setup' );
	endif;

if ( ! function_exists( 'designmyblog_scripts' ) ) :
	function designmyblog_scripts() {

		wp_enqueue_style('inconsolata_font', 'https://fonts.googleapis.com/css?family=Inconsolata', array(), false, 'all' );
		wp_enqueue_style( 'playfairdisplay_font', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900', array(), false, 'all' );
		wp_enqueue_style( 'ubuntu_font', 'https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i', array(), false, 'all' );
		wp_enqueue_style( 'font_awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', array(), false, 'all');
		wp_enqueue_style( 'reset', get_stylesheet_directory_uri() . '/css/reset.css', array(), false, 'all');
		wp_enqueue_style( 'style', get_stylesheet_uri(), array(), false, 'all');
		wp_enqueue_style( 'media_screen', get_stylesheet_directory_uri() . '/css/media.css', array(), false, 'all');
	}

	add_action( 'wp_enqueue_scripts', 'designmyblog_scripts');
endif;

function designmyblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'DesignMyBlog' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'DesignMyBlog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'TopPost', 'DesignMyBlog' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'DesignMyBlog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Newsletter', 'DesignMyBlog' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Subscribe on newsletter.', 'DesignMyBlog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
}
add_action( 'widgets_init', 'designmyblog_widgets_init' );


function btn_loadmore_scripts() {
	global $wp_query;

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'btn_loadmore', get_stylesheet_directory_uri() . '/js/btn_loadmore.js', array( 'jquery' ), false, true );

	wp_localize_script( 'btn_loadmore', 'btn_loadmore_params', array(
			'ajaxurl' => admin_url() . 'admin-ajax.php',
			'posts' => json_encode( $wp_query->query_vars ),
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
			) );

	wp_enqueue_script( 'btn_loadmore' );

}

add_action( 'wp_enqueue_scripts', 'btn_loadmore_scripts');


function btn_loadmore_ajax_handler(){
 
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; 
	$args['post_status'] = 'publish';
	$args['post__not_in'] = get_option("sticky_posts");
	$args['posts_per_page'] = 6;
 
	query_posts( $args );
 
	if( have_posts() ) :
 
		while( have_posts() ): the_post();
 
			get_template_part( 'template-post', get_post_format() );
 
		endwhile;
 
	endif;
	die;
}
 
 
add_action('wp_ajax_btn_loadmore', 'btn_loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_btn_loadmore', 'btn_loadmore_ajax_handler');



 function placeholder_comment_form_field($fields) {
    $replace_comment = __('Your Comment', 'designmyblog');
     
    $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" placeholder="JOIN THE DISCUSSION"'.$replace_comment.'" aria-required="true"></textarea></p>';
    
    return $fields;
 }


add_filter( 'comment_form_defaults', 'placeholder_comment_form_field' );


function example_order_comment_form_fields( $fields ) {

	$fields['comment'] = array_shift( $fields );

  return $fields;
}

add_filter( 'comment_form_fields', 'example_order_comment_form_fields' );