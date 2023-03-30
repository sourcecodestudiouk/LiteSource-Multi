<?php

/**
 * Testimonials
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonials-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$type = get_field('type');
$testimonials = get_field('testimonials_to_show');

if($testimonials == 'selected'){
  $selected = get_field('selected_testimonials');
}
else{
  $selected = get_posts(array('post_type' => 'testimonials', 'posts_per_page' => '-1', 'orderby'=>'menu_order'));
}

$theme = get_field('theme');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> content-grid-slider <?= $type; ?>">
  <?php if($type == 'multiple-slider'){ ?>
    <div class="container">
      <h4>Testimonials</h4>
    </div>
  <?php
  } ?>
  <?php if($type == 'multiple-slider'){ ?>
    <div class="slider-container">
      <div class="slider-content-container">
        <div class=slider-content>
  <?php
  }
  else{ ?>
    <div class="container outter-container">
    <div class="testimonial-slider">
      
  <?php
  }?>
    <?php
    $currentID = get_the_ID();
    
      $args = array( 'post_type' => array('testimonial') , 'post__in' => $selected, 'post__not_in' => array($currentID), 'posts_per_page' => '-1', 'order' => 'ASC', 'orderby' => 'menu_order');
      $post_query = new WP_Query($args);
      if($post_query->have_posts() ) {
        while($post_query->have_posts() ) { $post_query->the_post();
          get_template_part('/templates/cards/testimonial', 'card', array('type' => $type, 'theme' => $theme));
        }
      }
      wp_reset_postdata();
    ?>
    <?php if($type == 'multiple-slider'){ ?>
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
