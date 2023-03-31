<?php get_header(); ?>
	<main role="main">
		<?php get_template_part('templates/page-header'); ?>
		<section class="page-content">
            <?php
                $results = wp_remote_retrieve_body(wp_remote_get('http://adminconsole.sourcecodestudio.co.uk/wp-json/wp/v2/legal/13'));
                $results = json_decode($results);
                echo $results->content->rendered;
            ?>
		</section>
	</main>
<?php get_footer(); ?>