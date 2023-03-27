<?php

$options = get_field('mobile_menu_options', 'options');
$cta = get_field('call_to_action_options', 'options');


$colours = get_field('site_colours', 'options');
if(isset($colours)){
$primary = $colours['primary'];
$txtCol = getContrastColor($primary);
$secondary = $colours['secondary'];
$ddcol = getContrastColor($secondary);
$ctaBg = $colours['secondary'];
$ctaTxt = getContrastColor($secondary);
}
?>
<section class="off-canvas-menu">
  <div class="off-canvas-menu-content" style="background-color:<?= $primary; ?>; color:<?= $txtCol; ?>;">
    <div class="search-close">
      <?php get_template_part('templates/partials/search-container'); ?>
      <h6 class="close-off-canvas" style="border-color:<?= $secondary; ?>">Close <i class="fa-solid fa-xmark"></i></h6>
    </div>
    <?php $img = get_field('company_logo', 'options'); ?>
    <a class="logo-container" href="<?php echo get_home_url(); ?>" style="border-color:<?= $secondary; ?>">
      <img class="logo" src="<?php echo $img["url"]; ?>" alt="site-logo"/>
    </a>
    <div class="main-menu">
      <?php wp_nav_menu(array('theme_location'=>'mobile-menu')); ?>
    </div>
    <div class="footer">
      <?php
      if(isset($cta['add_call_to_action_button']) && $cta ["call_to_action_button"] != ''){ ?>
       <p class="btn" style="background-color:<?= $ctaBg; ?>; color:<?= $ctaTxt; ?>"><span style="background-color:<?= $ctaTxt; ?>;" class="background"></span><a href="<?= $cta['call_to_action_button']['url'] ?>"><?= $cta['call_to_action_button']['title'] ?></a></p> 
      <?php
      } ?>
      <?php get_template_part('templates/partials/lower-footer'); ?>
    </div>
  </div>
</section>
