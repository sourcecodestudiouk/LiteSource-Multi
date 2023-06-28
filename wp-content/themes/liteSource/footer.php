<?php get_template_part('templates/footer'); ?>
		</div> <!-- /wrapper -->
		<?php get_system_fonts(); ?>
		<?php is_sub_lapsed(); ?>
		<?php show_splash(); ?>
		<?php wp_footer(); ?>
		<link href="<?= get_template_directory_uri(); ?>/assets/lightbox/lightbox.css" rel="stylesheet" />
		<script src="<?= get_template_directory_uri(); ?>/assets/lightbox/lightbox.js"></script>
	</body>
</html>
