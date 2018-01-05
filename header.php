<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php show_admin_bar(false); ?>
	<meta charset="<?php bloginfo('charset') ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title><?php bloginfo('name') ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
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