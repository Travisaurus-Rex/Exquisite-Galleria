<?php
/*
===================================
	------------ FILTERS ------------
===================================
*/

// make gallery look niceeeee

function my_gallery_shortcode( $output = '', $atts, $instance ) {
	
		$return .= "<div class='gallery'>";

		$ids = explode(",", $atts["ids"]);

		foreach( $ids as $id ) {
			$link   = wp_get_attachment_url( $id ); 
			$meta   = wp_get_attachment_metadata($id);
			$w      = $meta['width'];
			$h      = $meta['height'];
			$dimClass;

			if ($w > $h) {
				$ratio = $w / $h;
				if ($ratio >= 1.7) {
					$dimClass = "wide";
				} elseif ($ratio >= 1.35) {
					$dimClass = "normal";
				} else {
					$dimClass = "square";
				}
			} else {
				$ratio = $h / $w;

				if ($ratio >= 1.3) {
					$dimClass = "tall";
				} else {
					$dimClass = "square";
				}
			}
			$return .= "<div class='gallery-image "; 
			$return .= $dimClass; 
			$return .= "' style='background-image: url(";
			$return .= $link . "')>";
			$return .= "<a class='gallery-image-link' href='";
			$return .= $link;
			$return .= "'></a>";
			$return .= "</div>";
		}

		$return .= "</div>";
		return $return;

	}

	// end the excerpt at the end of first sentence

	function end_with_sentence( $excerpt ) {
	  $allowed_ends = array('.', '!', '?', '...');
	  $number_sentences = 1;
	  $excerpt_chunk = $excerpt;

	  for($i = 0; $i < $number_sentences; $i++){
	      $lowest_sentence_end[$i] = 100000000000000000;
	      foreach( $allowed_ends as $allowed_end)
	      {
	        $sentence_end = strpos( $excerpt_chunk, $allowed_end);
	        if($sentence_end !== false && $sentence_end < $lowest_sentence_end[$i]){
	            $lowest_sentence_end[$i] = $sentence_end + strlen( $allowed_end );
	        }
	        $sentence_end = false;
	      }

	      $sentences[$i] = substr( $excerpt_chunk, 0, $lowest_sentence_end[$i]);
	      $excerpt_chunk = substr( $excerpt_chunk, $lowest_sentence_end[$i]);
	  }

  return implode('', $sentences);
}

	add_filter( 'show_admin_bar', '__return_false' );
	add_filter( 'use_default_gallery_style', '__return_false' );
	add_filter( 'post_gallery', 'my_gallery_shortcode', 10, 3 );
	add_filter( 'get_the_excerpt', 'end_with_sentence' );

/* 
=======================================
------------ THEME SUPPORT ------------
=======================================
*/

	add_theme_support( 'custom-header', array(
		'default-image'     => '',
		'width'             => 0,
		'height'            => 0,
		'flex-height'       => true,
		'flex-width'        => true,
		'uploads'           => true,
		'random-default'    => false,
		'header-text'       => true,
	) );

	add_theme_support( 'custom-logo', array(
		'height'      => 0,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	add_theme_support( 'post-thumbnails' );


/* 
=================================
------------ ACTIONS ------------
=================================
*/


	function theme_setup() {
		register_nav_menus(array(
			'exq-gal-primary-menu'      => __('Main Menu'),
		));
	}
	
	function themeslug_enqueue_style() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
	}

	function themeslug_enqueue_script() {
		wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' );
	}
	add_action('after_setup_theme', 'theme_setup');
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

/* 
==================================
------------ ASSORTED ------------
==================================
*/

function check_social_media_fields() {
	if ( 
		get_field('facebook') || 
		get_field('twitter')  || 
		get_field('linkedin') || 
		get_field('dribbble') || 
		get_field('youtube')  || 
		get_field('behance')  || 
		get_field('instagram')) {
		return true;
	} else {
		return false;
	}
}

	