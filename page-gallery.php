<main>
<?php 
	get_header();

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="gallery">
			<?php 
				$galleries = get_post_galleries( get_the_ID(), false );

				foreach( $galleries as $g ) :
					$ids = explode( ",", $g['ids'] );
					foreach ( $ids as $id) :
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
			?>			
						<div class="gallery-image <?php echo $dimClass ?>" style="background-image: url(<?php echo $link ?>)">
							<a class="gallery-image-link" href="<?php echo $link?>"></a>
						</div>
				<?php 
					endforeach; 
				endforeach;
				?>
		</div>
	<?php
endwhile;
endif;
?>
</main>