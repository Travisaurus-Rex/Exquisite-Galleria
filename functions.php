<?php

	add_filter('show_admin_bar', '__return_false');

	$header_image_args = array(
		'default-image'     => '',
		'width'             => 0,
		'height'            => 0,
		'flex-height'       => true,
		'flex-width'        => true,
		'uploads'           => true,
		'random-default'    => false,
		'header-text'       => true,
	);

	add_theme_support('custom-header', $header_image_args);

	add_theme_support( 'custom-logo', array(
		'height'      => 0,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );


	function theme_setup() {
		register_nav_menus(array(
			'primary' => __('Main Menu'),
			'front-page' => __('Front Page')
		));

		add_menu();
	}

	function add_menu() {

		$menus = get_registered_nav_menus();

		if (!$menus) {

			$menu_name = 'Main Menu';
			$menu_id   = wp_create_nav_menu($menu_name);

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Home'),
				'menu-item-classes' => 'menu-item',
				'menu-item-url' => home_url( '/' ),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Gallery'),
				'menu-item-classes' => 'menu-item',
				'menu-item-url' => home_url( '/gallery' ),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('Blog'),
				'menu-item-classes' => 'menu-item',
				'menu-item-url' => home_url( '/blog' ),
				'menu-item-status' => 'publish'
			));

			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => __('About'),
				'menu-item-classes' => 'menu-item',
				'menu-item-url' => home_url( '/about' ),
				'menu-item-status' => 'publish'
			));
		}
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

?>