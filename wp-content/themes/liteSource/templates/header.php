<?php 
if( function_exists('acf_add_options_page') ) {
  
  $logo = get_field('company_logo', 'options');
  $icon = get_field('company_icon', 'options');
  $layout = get_field('header_layout', 'options');
  $width = get_field('header_width', 'options');

  $theme = get_field('header_theme', 'options');
  $colours = get_theme_colours($theme['themes']);

  $cols = get_field('site_colours', 'options');

  $cta = get_field('call_to_action_options', 'options');
  if(isset($cta)){
    if($theme['themes'] == 'primary' || $theme['themes'] == 'none'){
      $ctaBg = $cols['secondary'];
      $ctaTxt = getContrastColor($ctaBg);
    }
    else if(isset($cta) && ($theme['themes'] == 'secondary' || $theme['themes'] == 'accent')){
      $ctaBg = $cols['primary'];
      $ctaTxt = getContrastColor($ctaBg);
    }
  }

  $search = get_field('site_search', 'options');

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
    <p class="dashboard"><a href="<?= get_site_url(); ?>/wp-admin/index.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></p>
    <p class="edit"><a href="<?= get_edit_post_link(); ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</a></p>
  </div>
  <div class="admin-info">
    <p class="user-logout"><a href="<?= wp_logout_url(); ?>"><i class="fas fa-sign-out-alt"></i></a></p>
  </div>
</div>
<?php
} ?>


<header class="site-header <?php if(isset($fixed)){ echo 'fixed-header'; } ?> <?php if(!$cta['add_call_to_action_button']){ echo 'no-cta'; } else if($cta['add_email']){ echo 'cta-with-email'; } ;?> <?= $theme['themes']; ?>" style="background-color:<?= $colours['bg']; ?>; color:<?= $colours['textCol']; ?>;">
  <div class="inside-container<?php  if($width == 'contained'){ echo 'container'; }; ?> <?= $layout; ?>">
    <a class="logo-container" href="<?php echo get_home_url(); ?>">
    <?php if(isset($logo)){ ?>
      <img draggable="false" class="logo" src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>"/>
    <?php
    } ?>
    </a>
    <?php header_nav(); ?>
    <div class="cta-menu-search-container">
      <?php
      if($search){ ?>
        <div class="search-button-container">
          <i class="fas fa-search"></i>
        </div>
      <?php
      }
      if(isset($cta['add_call_to_action_button']) && $cta ["call_to_action_button"] != ''){
        if($cta['add_email']){
          $email = get_field('email_address', 'options');
          if($email){ ?>
          <a class="email-address" href="mailto:<?= $email; ?>"><?= $email; ?></a>
          <?php
          }
        } ?>
        <p class="btn" style="background-color:<?= $ctaBg; ?>; color:<?= $ctaTxt; ?>"><span style="background-color:<?= $ctaTxt; ?>;" class="background"></span><a href="<?= $cta['call_to_action_button']['url'] ?>"><?= $cta['call_to_action_button']['title'] ?></a></p> 
      <?php
      } ?>
      <div class="off-canvas-menu-trigger">
        <h6 class="label" style="color:<?= $textCol; ?>">Menu</h6>
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
    
  </div>
</header>

<?php
  if($search){ ?>
    <div class="search-container <?php if(isset($fixed)){ echo 'fixed-header'; } ?> <?= $theme; ?>" style="background-color:<?= $bg; ?>; color:<?= $textCol; ?>">
      <div class="close-button">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <div class="search-form-container">
        <h6>Search Site:</h6>
        <form action="<?= get_site_url(); ?>/search-results/"  method="get" class="search-form">
          <input type="search" placeholder="Search &hellip;" value="" name="_search" style="color:<?= $txtCol; ?>">
          <button type="submit"><i style="color:<?= $txtCol; ?>" class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
    </div>
  <?php
  } 
?>  

<?php get_template_part('templates/partials/off-canvas-menu'); ?>

<?php $theme = wp_get_theme()->get_page_templates(); ?>