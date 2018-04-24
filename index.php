<?php get_header() ?>

<h1>This is the real blog page, coming from index.php</h1>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>



		<h1><?php the_title();?></h1>

		<div><?php the_content(); ?></div>

		<?php
			endwhile;
			endif;
		?>