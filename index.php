<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
<div>
	<h3>This is the index page</h3>
	<h1><?php the_title()?></h1>
	<?php the_content() ?>
</div>
<?php
	endwhile;
	endif; 
?>