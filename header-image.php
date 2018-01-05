<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title><?php bloginfo('name') ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,800" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<nav class="main-menu">
	<?php
		wp_nav_menu( array(
			'menu' => 'Main Menu'
		) );
	?>
	</nav>
	<header class="header-image" style="background-image: linear-gradient(
													rgba(0, 0, 0, 0.3), 
													rgba(0, 0, 0, 0.3)
												), url(<?php header_image() ?>)">
		<div class="fp-header-text-container">
			<?php 
				if( has_custom_logo() && display_header_text() ) :
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
					        echo '<img src="'. esc_url( $logo[0] ) .'" class="small-logo">';
					}

			?>
				<h1 class="site-title"><?php bloginfo('name') ?></h1>
				<h3 class="site-description"><?php bloginfo('description') ?></h3>
			<?php
				elseif ( has_custom_logo() ):
					the_custom_logo();
			?>
				
			<?php
				elseif ( display_header_text() ):
			?>
				<h1 class="site-title"><?php bloginfo('name') ?></h1>
				<h3 class="site-description"><?php bloginfo('description') ?></h3>
			<?php
				endif;
			?>
		</div>
	</header>
	<div class="social-media-container">
		<i class="fab fa-facebook-square"></i>
		<i class="fab fa-instagram"></i>
		<i class="fab fa-twitter"></i>
	</div>

