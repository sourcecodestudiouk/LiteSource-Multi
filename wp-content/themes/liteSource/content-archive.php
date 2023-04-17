<?php /* Template Name: Content Archive */ ?>

<?php get_header(); ?>
	<main role="main">
		<?php get_template_part('templates/blocks/page-header'); ?>
		<?php if(is_page('news')){ ?>
			<div class="category-archive-filters">
			<p class="label">Categories:</p>
				<?php
				if(isset($_GET['category'])){ ?> <p class="category reset"><a href="/news">Reset</a></p> <?php }
				$cats = get_categories();
				foreach($cats as $cat){ ?>
					<p class="category<?php if(isset($_GET['category'])){ if($_GET['category'] == $cat->slug){ echo ' current'; }; } ?>"><a href="/news?category=<?= $cat->slug; ?>"><?= $cat->name; ?></a></p>
				<?php
				} ?>
			</div>	
		<?php
		} ?>
		<?php get_template_part('templates/blocks/archive-grid'); ?>
	</main>
<?php get_footer(); ?>
