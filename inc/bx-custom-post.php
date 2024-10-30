<?php

/* Bx Carousel Custom Post*/
add_action( 'init', 'bx_carousel_custom_post' );
function bx_carousel_custom_post() {

	register_post_type( 'bx-carousel',
		array(
			'labels' => array(
				'name' => __( 'Bx Carousel Items' ),
				'singular_name' => __( 'Carousel Item' )
			),
			'public' => true,
			'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'carousel-item')
		)
	);
}

/* Bx Carousel Custom texonomy*/
function bx_owl_caousel_texonomy() {
	register_taxonomy(
		'bx_carousel_cata',
		array('bx-carousel', 'post'),
		array(
			'hierarchical' => true,
			'label' => __( 'Carousel Catagories' ),
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array(
				'slug' => 'carousel-catagory', 
				'with_front' => true
				)
		)
	);
}
add_action( 'init', 'bx_owl_caousel_texonomy' );
?>