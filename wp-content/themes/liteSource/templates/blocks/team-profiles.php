<?php

/**
 * Team Profiles
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
if(!is_singular( 'team_member' )){
  $id = 'team-profiles-' . $block['id'];
  if( !empty($block['anchor']) ) {
      $id = $block['anchor'];
  }
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-profiles-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$type = get_field('type');
$profiles = get_field('profiles_to_show');
$cols = get_field('profiles_per_row');

if($profiles == 'selected'){
  $profiles = get_field('selected_profiles');
}
else{
  $profiles = get_posts(array('post_type' => 'team_members', 'posts_per_page' => '-1', 'orderby'=>'menu_order'));
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> content-grid-slider <?= $type; ?>">
  <?php if(!is_page('team')){ ?>
    <div class="container">
      <h4>Team Members</h4>
      <p class="btn btn-small"><a href="<?= get_site_url(); ?>/team">View All Team</a></p>
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
      <div class="container <?= $cols; ?>-columns">
  <?php
  }?>
    <?php
    $currentID = get_the_ID();
    $args = array( 'post_type' => array('team_member') , 'post__in' => $profiles, 'post__not_in' => array($currentID), 'posts_per_page' => '-1', 'order' => 'ASC', 'orderby' => 'menu_order');
    $post_query = new WP_Query($args);
    if($post_query->have_posts() ) {
      while($post_query->have_posts() ) { $post_query->the_post();
        get_template_part('/templates/cards/team_member', 'card');
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
