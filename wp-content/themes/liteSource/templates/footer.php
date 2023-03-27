<?php
  $colours = get_field('site_colours', 'options');
  if(isset($colours)){
    $primary = $colours['primary'];
    $txtCol = getContrastColor($primary);
    $secondary = $colours['secondary'];
    $ddcol = getContrastColor($secondary);
  }
  $menus = get_field('menu_columns', 'options');
  $company_description = get_field('company_description', 'options');
  $email = get_field('email_address', 'options');
  $telephone = get_field('telephone_number', 'options');
  $address = get_field('address', 'options');
  $vat = get_field('vat_number', 'options');
  $company = get_field('company_number', 'options');

?>

<footer class="site-footer" role="contentinfo" style="background-color:<?= $colours['primary']; ?>; color:<?= $txtCol; ?>">
  <div class="container">

  <div class="company-information">
    <?php $icon = get_field('company_icon', 'options'); ?>
    <img src="<?= $icon['url']; ?>" alt="Company Icon"/>
    <?php  if($company_description){ ?><p class="company-description"><?= $company_description; ?></p> <?php } ?>
    <div class="contact-details">
      <?php 
      if($email != ''){ ?>
        <p><a href="mailto:<?= $email; ?>"><i class="fa-solid fa-envelope"></i><?= $email; ?></a></p>
      <?php
      } ?>
      <?php 
      if($telephone != ''){ ?>
       <p><a href="tel:<?= $telephone; ?>"><i class="fa-solid fa-phone"></i><?= $telephone; ?></a></p>
      <?php
      } ?>
      <?php 
      if($address != ''){ ?>
        <p><a target="_blank" href="https://www.google.com/maps/dir//<?= $address; ?>"><i class="fa-solid fa-location-dot"></i><?= $address; ?></a></p>
      <?php
      } ?>
    </div>
    <?php get_template_part('templates/partials/social-media'); ?>
  
  </div>
  <?php if($menus){ ?>
    <div class="menus">
    <?php 
    $count = 0;
    foreach($menus as $me){ ?>
    <div class="menu-column">
      <h5><?= $me['menu_column_title']; ?></h5>
      <div class="menu-container">
        <?php wp_nav_menu('footer_menu' . $count++); ?>
      </div>
    </div>
    <?php
    } ?>
    </div>
  <?php
  } ?>
  
  </div>
</footer>
<footer class="lower-footer">
  <div class="container">
    <p class="copyright-link">&copy;<?= date('Y'); ?> <?= get_bloginfo();?>.  All Rights Reserved. Made by <a target="_blank" href="https://www.sourcecodestudio.co.uk">SourceCodeStudio</a>.</p>
    <div class="legal-menu">
      <a href="privacy-policy">Privacy Policy</a>
      <a href="terms-of-service">Terms of Service</a>
    </div>
  </div>
</footer>
