<?php get_header(); 
$colours = get_field('site_colours', 'options'); 
$txtCol = getContrastColor('#ffffff');?>
	<main role="main">
		<h1>Search Results</h1>
		<?php if(isset($_GET['_search'])){ ?>
		<p>You searched for: '<?= $_GET['_search']; ?>'</p>
		<section class="search-results">
			<?php
			$args = array( 's' =>$_GET['_search']);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$type = get_post_type();
				$type = get_post_type_object($type); ?>
				<div class="search-result-card <?= $type->name; ?>-result" style="border-color:<?= $colours['secondary']; ?>">
				<div class="background" style="background-color:<?= $colours['secondary']; ?>"></div>
					<a style="color:<?= $txtCol; ?>" href="<?php the_permalink(); ?>">
						<p><small><?= $type->labels->singular_name; ?></small></p>
						<h5><?php the_title(); ?></h5>
					</a>
				</div>
			<?php
				}
			}
			else{ ?>
			<div class="nothing-found" style="border-color:<?= $colours['secondary']; ?>">
				<div class="background" style="background-color:<?= $colours['secondary']; ?>"></div>
				<p style="color:<?= $txtCol; ?>">Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			</div>
			<?php 
			} ?>
		</section>
		<?php
		}
		else{ ?>
			<div class="nothing-found" style="border-color:<?= $colours['secondary']; ?>">
				<div class="background" style="background-color:<?= $colours['secondary']; ?>"></div>
				<p style="color:<?= $txtCol; ?>">Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			</div>
		<?php
		} ?>
		
	</main>
<?php get_footer(); ?>

