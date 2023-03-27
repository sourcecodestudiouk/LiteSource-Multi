<?php

/**
 *  Events Slider
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'events-slider-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$type = 'slider';

$events = get_posts(array('post_type' => 'events', 'posts_per_page' => '10', 'orderby'=>'menu_order', 'fields' => 'ids'));


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> content-grid-slider <?= $type; ?>">
  <?php if(!is_page('team')){ ?>
    <div class="container">
      <h4>Upcoming Events</h4>
      <p class="btn"><a href="/team">View All Events</a></p>
    </div>

  <?php
  } ?>
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
    $args = array( 'post_type' => array('event') , 'post__in' => $events, 'post__not_in' => array($currentID), 'posts_per_page' => '-1', 'order' => 'ASC', 'orderby' => 'menu_order');
    $post_query = new WP_Query($args);
    if($post_query->have_posts() ) {
      while($post_query->have_posts() ) { $post_query->the_post();
        get_template_part('/templates/cards/event', 'card');
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
    }?>
</div>
