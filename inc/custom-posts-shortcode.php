<?php
add_theme_support( 'post-thumbnails', array( 'bx-carousel' ) );
add_image_size('bx-carousel-thumb', 400, 300, true);
	
/* Bx Carousel Shortcode one style*/	
function bx_carousel_images_shortcode($atts){
	extract( shortcode_atts( array(
		'loop_lp' => 'true',
		'margin_rt' => '20',
		'rtl_rl' => 'true',
		'nav_px' => 'true',
		'autoplay_op' => 'true',
		'speedcheck' => '2000',
		'timeoutoptioncheck' => '200',
		'hoverpauseoptions' => 'false',
		'dotseachsets' => 'true',
		'dots_ds' => 'true',
		'desktop' => '4',
		'tablet' => '3',
		'mobile' => '2',
		'extra_mobile' => '2',
		'small_mobile' => '1',
		'id' => 'carouselproimgonly',
		'category' => '',
		'posttype' => '',
		'order_by' => 'DESC',
		'background' => '#2c3e50',
		'nav_hover' => '#34495e',
		'text_color' => '#fff',
	), $atts, 'bx_carousel_image_only' ) );
	
    $q = new WP_Query(
        array('posts_per_page' => '-1', 'post_type' => $posttype, 'bx_carousel_cata' => $category, 'order' => $order_by,)
    );
	$list = '
		<script type="text/javascript">
	  jQuery(document).ready(function(){
		var owl = jQuery("#owlcarouselproimg'.$id.'");
        owl.owlCarousel({
			loop:'.$loop_lp.',
			margin:'.$margin_rt.',
			rtl: '.$rtl_rl.',
			nav:'.$nav_px.',
			autoplay:'.$autoplay_op.',
			smartSpeed:'.$speedcheck.',
			autoplayTimeout:'.$timeoutoptioncheck.',
			autoplayHoverPause:'.$hoverpauseoptions.',
			dotsEach:'.$dotseachsets.',
			dots:'.$dots_ds.',
			responsiveClass: true,
			responsive:{
				0:{
					items:'.$small_mobile.'
				},
				479:{
					items:'.$extra_mobile.'
				},
				768:{
					items:'.$mobile.'
				},
				980:{
					items:'.$tablet.'
				},
				1199:{
					items:'.$desktop.'
				},
			}
        });
     });
	</script>
	<style type="text/css">
	#owlcarouselproimg'.$id.'.owl-carousel .owl-item .bx-details-content {background-color: '.$background.';}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-dots div.owl-dot {background: '.$background.';}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div.owl-prev::after {background: '.$background.';}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div {background: '.$background.';}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div:hover {background: '.$nav_hover.' !important;}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div.owl-prev:hover:after{background: '.$nav_hover.' !important;}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div.owl-next:hover:before{background: '.$nav_hover.' !important;}
	#owlcarouselproimg'.$id.' .bx-details-content .bx-heading-lt {color: '.$text_color.';}
	#owlcarouselproimg'.$id.' .bx-details-content .bx-pr-lt {color: '.$text_color.' !important;}
	#owlcarouselproimg'.$id.' .bx-details-content .visit_bx {color: '.$text_color.' !important;}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div {color: '.$text_color.' !important;}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div.owl-prev::after {color: '.$text_color.';}
	#owlcarouselproimg'.$id.'.owl-carousel .owl-nav div.owl-next::before {color: '.$text_color.';}
	</style>
	<div id="owlcarouselproimg'.$id.'" class="owl-carousel">			
	';

	while($q->have_posts()) : $q->the_post();
    //get the ID of your post in the loop
    $id = get_the_ID();
	$carousel_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'bx-carousel-thumb' );
    $list .= '
	
				<div class="bx-carousel-single">
					<div class="bx-img-wrapper">
						<a href="'.get_permalink().'"><img src="'.$carousel_thumb[0].'" alt="" /></a>
					</div>
				</div>
	
			';        
	endwhile;
	$list.= '
	</div>
				';
	wp_reset_query();
	return $list;
}
add_shortcode('bx_carousel_image_only', 'bx_carousel_images_shortcode');
	
	
/* Bx Carousel style two Shortcode here*/
function bx_carousel_images_content_shortcode($atts){
	extract( shortcode_atts( array(
		
		'loop_lp' => 'true',
		'margin_rt' => '20',
		'rtl_rl' => 'true',
		'nav_px' => 'true',
		'autoplay_op' => 'true',
		'speedcheck' => '2000',
		'timeoutoptioncheck' => '200',
		'hoverpauseoptions' => 'false',
		'dotseachsets' => 'true',
		'dots_ds' => 'true',
		'desktop' => '4',
		'tablet' => '3',
		'mobile' => '2',
		'extra_mobile' => '2',
		'small_mobile' => '1',
		'id' => 'carouselpro',
		'category' => '',
		'posttype' => 'bx-carousel',
		'order_by' => 'DESC',
		'background' => '#2c3e50',
		'nav_hover' => '#34495e',
		'text_color' => '#fff',
		
	), $atts, 'bx_carousel_bx' ) );
	
    $q = new WP_Query(
       array('posts_per_page' => '-1', 'post_type' => $posttype, 'bx_carousel_cata' => $category, 'order' => $order_by,)
    );
	$list = '
	<script type="text/javascript">
	  jQuery(document).ready(function(){
		var owl = jQuery("#owlcarouselpro'.$id.'");
        owl.owlCarousel({
			loop:'.$loop_lp.',
			margin:'.$margin_rt.',
			rtl: '.$rtl_rl.',
			nav:'.$nav_px.',
			autoplay:'.$autoplay_op.',
			smartSpeed:'.$speedcheck.',
			autoplayTimeout:'.$timeoutoptioncheck.',
			autoplayHoverPause:'.$hoverpauseoptions.',
			dotsEach:'.$dotseachsets.',
			dots:'.$dots_ds.',
			responsiveClass: true,
			responsive:{
				0:{
					items:'.$small_mobile.'
				},
				479:{
					items:'.$extra_mobile.'
				},
				768:{
					items:'.$mobile.'
				},
				980:{
					items:'.$tablet.'
				},
				1199:{
					items:'.$desktop.'
				},
			}
        });
     });
	</script>
	<style type="text/css">
	#owlcarouselpro'.$id.'.owl-carousel .owl-item .bx-details-content {background-color: '.$background.';}
	#owlcarouselpro'.$id.'.owl-carousel .owl-dots div.owl-dot {background: '.$background.';}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div.owl-prev::after {background: '.$background.';}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div {background: '.$background.';}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div:hover {background: '.$nav_hover.' !important;}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div.owl-prev:hover:after{background: '.$nav_hover.' !important;}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div.owl-next:hover:before{background: '.$nav_hover.' !important;}
	#owlcarouselpro'.$id.' .bx-details-content .bx-heading-lt {color: '.$text_color.';}
	#owlcarouselpro'.$id.' .bx-details-content .bx-pr-lt {color: '.$text_color.' !important;}
	#owlcarouselpro'.$id.' .bx-details-content .visit_bx {color: '.$text_color.' !important;}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div {color: '.$text_color.' !important;}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div.owl-prev::after {color: '.$text_color.';}
	#owlcarouselpro'.$id.'.owl-carousel .owl-nav div.owl-next::before {color: '.$text_color.';}
	</style>
	<div id="owlcarouselpro'.$id.'" class="owl-carousel">	
	';

	while($q->have_posts()) : $q->the_post();
    //get the ID of your post in the loop
    $id = get_the_ID();
	$carousel_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'bx-carousel-thumb' );
    $list .= '
	<div class="bx-carousel-content-single">	
			<div class="bx-img-wrapper-only">
					<a class="bx-content-bt" href="'.get_permalink().'">
					<div class="awesome-img-bx">
						<img src="'.$carousel_thumb[0].'" alt=""/>
					</div>
					<div class="bx-details-content">
						<h2 class="bx-heading-lt">
							'.get_the_title().'
						</h2>
						<p class="bx-pr-lt">
							'.get_the_content().'
						</p>
						<div class="visit_bx">
							Visit Here
						</div>
					</div>
					</a>
				</div>
			</div>	
			';        
	endwhile;
	$list.= '
	</div>
			
				';
	wp_reset_query();
	return $list;
}
add_shortcode('bx_carousel_bx', 'bx_carousel_images_content_shortcode');

/* Bx Carousel style three Shortcode here*/	
function bx_carousel_content_shortcode($atts){
	extract( shortcode_atts( array(
		'loop_lp' => 'true',
		'margin_rt' => '20',
		'rtl_rl' => 'true',
		'nav_px' => 'true',
		'autoplay_op' => 'true',
		'speedcheck' => '2000',
		'timeoutoptioncheck' => '200',
		'hoverpauseoptions' => 'false',
		'dotseachsets' => 'true',
		'dots_ds' => 'true',
		'desktop' => '4',
		'tablet' => '3',
		'mobile' => '2',
		'extra_mobile' => '2',
		'small_mobile' => '1',
		'id' => 'carouselpro',
		'category' => '',
		'posttype' => 'bx-carousel',
		'order_by' => 'DESC',
		'background' => '#2c3e50',
		'nav_hover' => '#34495e',
		'text_color' => '#fff',
		
	), $atts, 'bx_carousel_content' ) );
	
    $q = new WP_Query(
       array('posts_per_page' => '-1', 'post_type' => $posttype, 'bx_carousel_cata' => $category, 'order' => $order_by,)
    );
	$list = '
		<script type="text/javascript">
	  jQuery(document).ready(function(){
		var owl = jQuery("#owlcarouselcontent'.$id.'");
        owl.owlCarousel({
			loop:'.$loop_lp.',
			margin:'.$margin_rt.',
			rtl: '.$rtl_rl.',
			nav:'.$nav_px.',
			autoplay:'.$autoplay_op.',
			smartSpeed:'.$speedcheck.',
			autoplayTimeout:'.$timeoutoptioncheck.',
			autoplayHoverPause:'.$hoverpauseoptions.',
			dotsEach:'.$dotseachsets.',
			dots:'.$dots_ds.',
			responsiveClass: true,
			responsive:{
				0:{
					items:'.$small_mobile.'
				},
				479:{
					items:'.$extra_mobile.'
				},
				768:{
					items:'.$mobile.'
				},
				980:{
					items:'.$tablet.'
				},
				1199:{
					items:'.$desktop.'
				},
			}
        });
     });
	</script>
	<style type="text/css">
	#owlcarouselcontent'.$id.'.owl-carousel .owl-item .bx-details-content {background-color: '.$background.';}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-dots div.owl-dot {background: '.$background.';}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div.owl-prev::after {background: '.$background.';}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div {background: '.$background.';}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div:hover {background: '.$nav_hover.' !important;}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div.owl-prev:hover:after{background: '.$nav_hover.' !important;}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div.owl-next:hover:before{background: '.$nav_hover.' !important;}
	#owlcarouselcontent'.$id.' .bx-details-content .bx-heading-lt {color: '.$text_color.';}
	#owlcarouselcontent'.$id.' .bx-details-content .bx-pr-lt {color: '.$text_color.' !important;}
	#owlcarouselcontent'.$id.' .bx-details-content .visit_bx {color: '.$text_color.' !important;}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div {color: '.$text_color.' !important;}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div.owl-prev::after {color: '.$text_color.';}
	#owlcarouselcontent'.$id.'.owl-carousel .owl-nav div.owl-next::before {color: '.$text_color.';}
	#owlcarouselcontent'.$id.' .visit {background: '.$background.' !important ;}
	#owlcarouselcontent'.$id.' .visit-here {color: '.$text_color.' !important;}
	</style>
	<div id="owlcarouselcontent'.$id.'" class="owl-carousel">		
	';

	while($q->have_posts()) : $q->the_post();
    //get the ID of your post in the loop
    $id = get_the_ID();
	$carousel_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'bx-carousel-thumb' );
    $list .= '
				<div class="bx-carousel-single">
					<div class="bx-img-wrapper">
						<a href="'.get_permalink().'"><img src="'.$carousel_thumb[0].'" alt="" /></a>
					</div>
					<div class="bx-details">
						<h2 class="bx-heading">
							<a class="bx-anchor bx-anchor-two" href="'.get_permalink().'">'.get_the_title().'</a>
						</h2>
						<p class="bx-pr">
							'.get_the_content().'
						</p>
						<div class="visit visit-two"><a class="visit-here " href="'.get_permalink().'">Visit Here</a></div>
						
					</div>
				</div>
			';        
	endwhile;
	$list.= '
	</div>
				';
	wp_reset_query();
	return $list;
}
add_shortcode('bx_carousel_content', 'bx_carousel_content_shortcode');		
	
	
/* Bx Carousel style four Shortcode here*/	
function bx_carousel_latest_shortcode($atts){
	extract( shortcode_atts( array(
		'loop_lp' => 'true',
		'margin_rt' => '20',
		'rtl_rl' => 'true',
		'nav_px' => 'true',
		'autoplay_op' => 'true',
		'speedcheck' => '2000',
		'timeoutoptioncheck' => '200',
		'hoverpauseoptions' => 'false',
		'dotseachsets' => 'true',
		'dots_ds' => 'true',
		'desktop' => '4',
		'tablet' => '3',
		'mobile' => '2',
		'extra_mobile' => '2',
		'small_mobile' => '1',
		'id' => 'carouselpro',
		'category' => '',
		'posttype' => 'bx-carousel',
		'order_by' => 'DESC',
		'background' => '#2c3e50',
		'nav_hover' => '#34495e',
		'text_color' => '#fff',
		
	), $atts, 'bx_carousel_lateast' ) );
	
    $q = new WP_Query(
        array('posts_per_page' => '-1', 'post_type' => $posttype, 'bx_carousel_cata' => $category, 'order' => $order_by,)
   );
	$list = '
		<script type="text/javascript">
	  jQuery(document).ready(function(){
		var owl = jQuery("#owlcarousellatest'.$id.'");
        owl.owlCarousel({
			loop:'.$loop_lp.',
			margin:'.$margin_rt.',
			rtl: '.$rtl_rl.',
			nav:'.$nav_px.',
			autoplay:'.$autoplay_op.',
			smartSpeed:'.$speedcheck.',
			autoplayTimeout:'.$timeoutoptioncheck.',
			autoplayHoverPause:'.$hoverpauseoptions.',
			dotsEach:'.$dotseachsets.',
			dots:'.$dots_ds.',
			responsiveClass: true,
			responsive:{
				0:{
					items:'.$small_mobile.'
				},
				479:{
					items:'.$extra_mobile.'
				},
				768:{
					items:'.$mobile.'
				},
				980:{
					items:'.$tablet.'
				},
				1199:{
					items:'.$desktop.'
				},
			}
        });
     });
	</script>
	<style type="text/css">
	#owlcarousellatest'.$id.'.owl-carousel .owl-item .bx-details-content {background-color: '.$background.';}
	#owlcarousellatest'.$id.'.owl-carousel .owl-dots div.owl-dot {background: '.$background.';}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div.owl-prev::after {background: '.$background.';}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div {background: '.$background.';}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div:hover {background: '.$nav_hover.' !important;}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div.owl-prev:hover:after{background: '.$nav_hover.' !important;}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div.owl-next:hover:before{background: '.$nav_hover.' !important;}
	#owlcarousellatest'.$id.' .bx-details-content .bx-heading-lt {color: '.$text_color.';}
	#owlcarousellatest'.$id.' .bx-details-content .bx-pr-lt {color: '.$text_color.' !important;}
	#owlcarousellatest'.$id.' .bx-details-content .visit_bx {color: '.$text_color.' !important;}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div {color: '.$text_color.' !important;}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div.owl-prev::after {color: '.$text_color.';}
	#owlcarousellatest'.$id.'.owl-carousel .owl-nav div.owl-next::before {color: '.$text_color.';}
	#owlcarousellatest'.$id.' .visit {background: '.$background.' !important ;}
	#owlcarousellatest'.$id.' .visit-here {color: '.$text_color.' !important;}
	#owlcarousellatest'.$id.' .carousel_left_wrap .post-calender {background: '.$background.' !important; color: '.$text_color.';}
	#owlcarousellatest'.$id.' .carousel_left_wrap .bx-comments {background: '.$background.' !important; color: '.$text_color.';}
	</style>
	<div id="owlcarousellatest'.$id.'" class="owl-carousel">				
	';

	while($q->have_posts()) : $q->the_post();
    //get the ID of your post in the loop
    $id = get_the_ID();
	$carousel_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'bx-carousel-thumb' );
    $list .= '
	
				<div class="bx-carousel-single">
					<div class="carousel_left_wrap">
						<div class="post-calender">
							<span class="bx-date">'.get_the_date().'</span>
						</div>
						<div class="bx-comments">
							<span class="bx-number">'.get_comments_number().'</span></br>
                            <span class="bx-comment">comment</span>
                        </div>
					</div>
					<div class="carousel_right_wrap lateast_post_wrap">
						<div class="bx-img-wrapper">
							<a href="'.get_permalink().'"><img src="'.$carousel_thumb[0].'" alt="" /></a>
						</div>
						<div class="bx-details">
							<h2 class="bx-heading">
								<a class="bx-anchor bx-anchor-four" href="'.get_permalink().'">'.get_the_title().'</a>
							</h2>
							<p class="bx-pr">
								'.get_the_content().'
							</p>
							<div class="visit visit-four"><a class="visit-here" href="'.get_permalink().'">Visit Here</a></div>
							
						</div>
					</div>
				</div>
			
			';        
	endwhile;
	$list.= '
	</div>
				';
	wp_reset_query();
	return $list;
}
add_shortcode('bx_carousel_lateast', 'bx_carousel_latest_shortcode');	
?>