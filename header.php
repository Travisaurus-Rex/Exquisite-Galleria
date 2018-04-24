<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php show_admin_bar(false); ?>
	<meta charset="<?php bloginfo('charset') ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<title><?php bloginfo('name') ?></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300|Playfair+Display:400,700,900" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
<header class="normal-header width-container">
<nav class="main-menu">
	<?php
		wp_nav_menu( array(
			'menu' => 'Main Menu'
		) );
	?>
	<h1 class="header-title"><?php bloginfo('name')?></h1>
</nav>
</header>