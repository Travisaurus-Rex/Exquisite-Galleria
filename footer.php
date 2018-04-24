<footer class="footer">

			<h1 class="footer-title"><?php bloginfo('title') ?></h1>

	<?php
		wp_nav_menu( array(
			'menu' => 'Main Menu'
		) );
	?>
	<div class="subfooter">
		Copyright &copy; <?php bloginfo('title'); echo ' ' . date('Y') . ' | designed by <a target="__blank" href="https://www.iamtravis.io">Travis Adams</a>'; ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>