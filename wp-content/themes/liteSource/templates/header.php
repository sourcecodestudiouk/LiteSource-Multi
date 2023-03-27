<?php 
if( function_exists('acf_add_options_page') ) {
  
  $logo = get_field('company_logo', 'options');
  $icon = get_field('company_icon', 'options');
  $layout = get_field('header_layout', 'options');

  $colours = get_field('site_colours', 'options');
  if(isset($colours)){
  $bgCol = $colours['primary'];
  $txtCol = getContrastColor($colours['primary']);
  }

  $cta = get_field('call_to_action_options', 'options');
  if(isset($cta)){
  $ctaBg = $colours['secondary'];
  $ctaTxt = getContrastColor($colours['secondary']);
  }

  $fixed = get_field('sticky_header', 'options');
}
?>

<?php 
if(current_user_can( 'edit_posts' )){ ?>
<div id="scs-admin-menu">
  <div class="company-info">
    <?php if(isset($icon)){ ?>
    <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>"/>
    <?php
    } ?>
    <p class="dashboard"><a href="<?= get_site_url(); ?>/wp-admin"><i class="fa-solid fa-gauge"></i> Dashboard</a></p>
    <p class="edit"><a href="<?= get_edit_post_link(); ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</a></p>
  </div>
  <div class="admin-info">
    <p class="user-logout"><a href="#"><i class="fas fa-sign-out-alt"></i></a></p>
  </div>
</div>
<?php
} ?>


<header class="site-header <?php if(isset($fixed)){ echo 'fixed-header'; } ?> <?php if(!$cta['add_call_to_action_button']){ echo 'no-cta'; } ;?>" style="background-color:<?= $bgCol; ?>; color:<?= $txtCol; ?>;">
  <div class="container <?= $layout; ?>">
    <a class="logo-container" href="<?php echo get_home_url(); ?>">
    <?php if(isset($logo)){ ?>
      <img class="logo" src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>"/>
    <?php
    } ?>
    </a>
    <?php header_nav(); ?>
    <?php
    if(isset($cta['add_call_to_action_button']) && $cta ["call_to_action_button"] != ''){ ?>
       <p class="btn" style="background-color:<?= $ctaBg; ?>; color:<?= $ctaTxt; ?>"><span style="background-color:<?= $ctaTxt; ?>;" class="background"></span><a href="<?= $cta['call_to_action_button']['url'] ?>"><?= $cta['call_to_action_button']['title'] ?></a></p> 
    <?php
    } ?>
    <div class="off-canvas-menu-trigger">
        <span class="label" style="color:<?= $txtCol; ?>">Menu</span>
        <i class="fa-solid fa-bars"></i>
      </div>
  </div>
</header>

<?php get_template_part('templates/partials/off-canvas-menu'); ?>

<?php $theme = wp_get_theme()->get_page_templates();; 
var_dump($theme);?>