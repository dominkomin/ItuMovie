<?php

add_action( 'after_setup_theme', 'blankslate_setup' );

// Hiding the top wordpress bar, which is normally visible on your page when you are signed in)
add_filter('show_admin_bar', '__return_false');

function load_styles_and_scripts() {
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ));
    wp_enqueue_script( 'jquery-2.1.3.min', get_template_directory_uri() . '/js/jquery-2.1.3.min.js' );
}

add_action( 'wp_enqueue_scripts', 'load_styles_and_scripts' );

function blankslate_setup()
{
	load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'blankslate' ) ));
}

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );

function blankslate_enqueue_comment_reply_script()
{
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );

function blankslate_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );

function blankslate_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'blankslate_widgets_init' );

/*
* Registering widgets
*/
function blankslate_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'blankslate' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

	register_sidebar( array (
		'name' => __( 'My custom widget', 'blankslate' ),
		'id' => 'custom-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
}

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
        $first_img = bloginfo('template_directory');
        $first_img .= "/images/default.png";
    }
    return $first_img;
}

function catch_paragraph() {
    global $post, $posts;
    $first_p = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all("'<p>(.*?)</p>'si", $post->post_content, $matches);
    $first_p = $matches [1] [0];

    if(empty($first_p)){ //Defines a default
        $first_p .= "no textss";
    }
    return $first_p;
}

function blankslate_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );

function blankslate_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}