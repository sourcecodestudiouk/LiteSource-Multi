<?php

/**
 * Portfolio Overview
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
if(!is_singular( 'team_member' )){
  $id = 'portfolio-overview-' . $block['id'];
  if( !empty($block['anchor']) ) {
      $id = $block['anchor'];
  }
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'portfolio-overview-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$type = get_field('type');
$portfolio = get_field('items_to_show');

if($portfolio == 'selected'){
  $items = get_field('selected_items');
}
else{
  $items = get_posts(array('post_type' => 'portfolio', 'posts_per_page' => '-1', 'orderby'=>'menu_order', 'fields' => 'ids'));
}

$theme = get_field('themes');
$colours = get_theme_colours($theme); 
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> content-grid-slider <?= $type; ?>">
<div class="container">
<div class="category-archive-filters">
  <?php    
  $cats = get_terms( 'portfolio_cat');
  foreach($cats as $cat){ ?>
    <p class="category<?php if(isset($_GET['category'])){ if($_GET['category'] == $cat->slug){ echo ' current'; }; } ?>"><a href="<?= get_site_url(); ?>/our-portfolio?category=<?= $cat->slug; ?>"><?= $cat->name; ?></a></p>
  <?php
  } ?>
</div>

</div>

<?php if($type == 'slider'){ ?>
    <div class="slider-container">
      <div class="slider-content-container">
        <div class=slider-content>
  <?php
  }
  else{ ?>
    <div class="content-grid">
      <div class="container">
  <?php
  }?>
    <?php
    $currentID = get_the_ID();
    $args = array( 'post_type' => array('portfolio') , 'post__in' => $items, 'post__not_in' => array($currentID), 'posts_per_page' => '-1', 'order' => 'ASC', 'orderby' => 'menu_order');
    $post_query = new WP_Query($args);
    if($post_query->have_posts() ) {
      while($post_query->have_posts() ) { $post_query->the_post();
        get_template_part('/templates/cards/portfolio', 'card');
      }
    }
    wp_reset_postdata();
    ?>
    <?php if($type == 'slider'){ ?>
      </div>
    </div>
  </div>
    <?php
    }
    else{ ?>
        </div>
      </div>
    <?php
    }
    if($portfolio == 'selected'){?>
      <div class="container">
        <p class="btn view-all-btn" style="background-color:<?= $colours['bg']; ?>; color:<?= $colours['textCol']; ?>"><a href="<?= get_site_url(); ?>/our-portfolio">View More Portfolio</a></p>
      <?php } ?>
      </div>
  </div>
