<?php

###
require_once('bs4navwalker.php');

###
add_action('wp_enqueue_scripts', 'theme_scripts');
add_action('init', 'register_my_menu' );
add_action('init', 'register_custom_posts_init');
add_action('widgets_init', 'arphabet_widgets_init' );
###
add_theme_support( 'post-thumbnails' ); 


###
function theme_scripts() {
	//default
	wp_enqueue_style ( "hjndi-css", get_bloginfo('stylesheet_url'), '', null );

	//bootstrap
	wp_enqueue_style("boostrap-css", get_bloginfo("template_directory")."/css/bootstrap.min.css");
	wp_enqueue_script("boostrap-js", get_bloginfo("template_directory")."/js/bootstrap.min.js");

}

function register_my_menu() {
  register_nav_menu('top-menu',__( 'Top Menu' ));
}

function arphabet_widgets_init() {
    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );
}

// Register Custom Post Types
function register_custom_posts_init() {
    // Register Products
    $videos_args = array(
        'labels'             => array(
	        'name'               => 'Videos',
	        'singular_name'      => 'video',
	        'menu_name'          => 'Videos'
	    ),
        'public'             => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' )
    );
    $parceiros_args = array(
        'labels'             => array(
	        'name'               => 'Parceiros',
	        'singular_name'      => 'parceiro',
	        'menu_name'          => 'Parceiros'
	    ),
        'public'             => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' )
    );
    $equipe_args = array(
        'labels'             => array(
	        'name'               => 'Equipe',
	        'singular_name'      => 'equipe',
	        'menu_name'          => 'Equipe'
	    ),
        'public'             => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' )
    );
    #
    register_post_type('videos', $videos_args);
    register_post_type('parceiro', $parceiros_args);
    register_post_type('equipe', $equipe_args);
}
?>