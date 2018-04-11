<?php get_header() ?>
<div class="width-container page">
	<?php 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 

			$p_thumb = get_the_post_thumbnail_url();

			if ( $p_thumb ) : ?>

				<div class="featured-image-container">

					<img src="<?php echo $p_thumb; ?>" class="featured-image" />

					<span class="featured-image-caption">
						<?php the_title() ?>
					</span>
				</div>

		<?php endif; ?>

			<article class="post">

				<h3 class="author">
					<?php the_author() ?>
				</h3>

			<?php
				the_content();
			endwhile;
		endif;
			?>
			</article>
</div>