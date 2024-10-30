<?php
/*
Plugin Name: Bx Carousel Ultimate
Description: Bx Carousel Ultimate Wordpress is a jQuery supper awesome carousel for your wordpress website. This plugin is fully customisable, touch support, fully responsive & modern browsers support. Beside easy for novice users and carousel options set in the most powerful advance tinyMCE 4.
Author: Md Mamunur Roshid
Plugin Url: http://bootstrapgrids.com/plugins/carousel-from-custom-post/
Autor Url:
Version: v1.1
*/

/* Adding Latest jQuery from Wordpress */
function bx_carousel_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'bx_carousel_latest_jquery');

include_once( plugin_dir_path( __FILE__ ) . 'inc/custom-posts-shortcode.php' );
include_once( plugin_dir_path( __FILE__ ) . 'inc/bx-custom-post.php' );
include_once( plugin_dir_path( __FILE__ ) . 'inc/bx-tynemce.php' );

/* Bx Carousel all file*/
function bx1_carousel_all_files() {
	wp_enqueue_script( 'jquery_bx_owl_carousel_aset', plugins_url( '/js/owl.carousel.js', __FILE__ ), array('jquery'),true );
	wp_enqueue_script( 'bx_owl_carousel_animate', plugins_url( '/js/owl.animate.js', __FILE__ ), array('jquery'),true );
	wp_enqueue_script( 'bx_owl_carousel_autoplay', plugins_url( '/js/owl.autoplay.js', __FILE__ ), array('jquery'),true );
	
	
	wp_enqueue_style( 'bx_font_awesome_min_css_aset', plugins_url( '/css/font-awesome.min.css', __FILE__ ));
	wp_enqueue_style( 'bx_owl_carousel_aset', plugins_url( '/css/owl.carousel.min.css', __FILE__ ));
	wp_enqueue_style( 'bx_owl_carousel_theme', plugins_url( '/css/owl-carousel-theme.css', __FILE__ ));
	wp_enqueue_style( 'bx_owl_carousel_style', plugins_url( '/css/carousel-style.css', __FILE__ ));
	wp_enqueue_style( 'bx_owl_transitions_style', plugins_url( '/css/owl.transitions.css', __FILE__ ));
	wp_enqueue_style( 'bx_owl_animate_css', plugins_url( '/css/owl.animate.css', __FILE__ ));
	wp_enqueue_style( 'bx_animate_css', plugins_url( '/css/animate.css', __FILE__ ));
}
add_action('init','bx1_carousel_all_files');
?>