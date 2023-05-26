<?php get_header(); 
	$pri = get_theme_colours('primary');
	$sec = get_theme_colours('secondary');
?>
	<main role="main">
		<section class="page-content">
			<?php get_template_part('assets/img/icons/404/404.svg');?>
			<h1>404 Error</h1>
			<p>This page is not found - It could have moved, or it never existed.</p>
			<div class="btns">
				<p class="btn" style="background-color:<?= $pri['bg']; ?>"><a style="color:<?= $pri['textCol']; ?>" href="/home">Return Home</a></p>
				<p class="btn" style="background-color:<?= $sec['bg']; ?>"><a style="color:<?= $sec['textCol']; ?>" href="/contact">Contact</a></p>
			</div>
		</section>
		<?php the_content(); ?>
	</main>
<?php get_footer(); ?>
