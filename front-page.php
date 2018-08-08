<?php if ( is_front_page() ) : 

				get_header('image');

			else :

				get_header();

			endif; ?>

	<div class="width-container">

		<?php if ( get_field('introduction_image') && get_field('introduction_headline') && get_field('introduction_text') ) : ?>

			<div class="introduction-container">

				<div class="introduction-image" style="background-image: url(<?php the_field('introduction_image') ?>)"></div>

				<div class="introduction-text">

					<h1 class="introduction-h1"><?php the_field('introduction_headline')?></h1>

					<p class="introduction-p"><?php the_field('introduction_text') ?></p>

				</div>

			</div>

		<?php endif; ?>

		<?php if ( get_field('featured_image') ) : ?>

			<div class="featured-image-container-front-page">
				
				<img class="featured-image-front-page" src="<?php the_field('featured_image')?>" />
				
				<?php if ( get_field('featured_image_title') && get_field('featured_image_description') ) : ?>

					<div class="featured-image-text-container-front-page">

						<h1 class="featured-image-front-page-title">

							<?php the_field('featured_image_title'); ?>

						</h1>

						<h3 class="featured-image-front-page-description">

							<?php the_field('featured_image_description'); ?>

						</h3>

					</div>

				<?php endif; ?>

			</div>

		<?php endif; ?>

		<?php $q = new WP_Query('posts_per_page=3'); ?>

		<?php if ( $q->have_posts() ) : ?>

			<h2 class="latest-posts">Latest Posts</h2>

			<div class="latest-posts-container">

			<?php while ( $q->have_posts() ) : $q->the_post() ?>

				<article class="post-snippet">

					<?php if ( has_post_thumbnail() ) : ?>
						<?php $img = get_the_post_thumbnail_url('', 'medium'); ?>
						<a class="post-snippet-link" href="<?php the_permalink(); ?>">
							<div class="post-snippet-thumbnail-background" style="background-image: url(<?php echo $img ?>);">
								<span class="post-snippet-title-mobile">
									<?php the_title(); ?>
								</span>	
							</div>
						</a>
						<h5 class="post-snippet-title"><?php the_title(); ?></h5>
						<p class="post-snippet-excerpt">
							<?php echo get_the_excerpt(); ?>
						</p>

					<?php endif; ?>
				</article>

			<?php endwhile; ?>

			</div>
			
		<?php endif; ?>

	</div>

<?php	get_footer(); ?>
