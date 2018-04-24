<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title><?php bloginfo('name') ?></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300|Lora:400,700" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<header class="header-image" style="background-image: linear-gradient(
													rgba(0, 0, 0, 0.4), 
													rgba(0, 0, 0, 0.4)
												), url(<?php header_image() ?>)">
		<nav class="image-menu">
		<?php
			wp_nav_menu( array(
				'menu' => 'Main Menu'
			) );
		?>
		</nav>
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

		<?php if ( check_social_media_fields() ) : ?>

			<div class="social-media-container">

				<?php if ( get_field('facebook') ) : ?>

					<a target="__blank" href="<?php the_field('facebook') ?>"><i class="fab fa-facebook-f"></i></a>

				<?php endif; ?>

				<?php if ( get_field('twitter') ) : ?>

					<a target="__blank" href="<?php the_field('twitter') ?>"><i class="fab fa-twitter"></i></a>

				<?php endif; ?>

				<?php if ( get_field('instagram') ) : ?>

					<a target="__blank" href="<?php the_field('instagram') ?>"><i class="fab fa-instagram"></i></a>

				<?php endif; ?>

				<?php if ( get_field('youtube') ) : ?>

					<a target="__blank" href="<?php the_field('youtube') ?>"><i class="fab fa-youtube"></i></a>

				<?php endif; ?>

				<?php if ( get_field('dribbble') ) : ?>

					<a target="__blank" href="<?php the_field('dribbble') ?>"><i class="fab fa-dribbble"></i></a>

				<?php endif; ?>

				<?php if ( get_field('linkedin') ) : ?>

					<a target="__blank" href="<?php the_field('linkedin') ?>"><i class="fab fa-linkedin-in"></i></a>

				<?php endif; ?>

				<?php if ( get_field('behance') ) : ?>

					<a target="__blank" href="<?php the_field('behance') ?>"><i class="fab fa-behance"></i></a>

				<?php endif; ?>

			</div>

		<?php endif; ?>
	</header>

