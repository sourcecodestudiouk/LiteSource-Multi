<?php 
$colours = get_field('site_colours', 'options');
?>

<div class="social-channels" style="color:<?= $colours['accent']; ?>">
  <?php
    $social = get_field('social_profiles', 'options');
    if($social){
      if($social['twitter']){ ?>
        <a target="_blank" href="<?= $social['twitter']; ?>"><i class="fa-brands fa-twitter"></i></a>
      <?php
      }
      if($social['facebook']){ ?>
        <a target="_blank" href="<?= $social['facebook']; ?>"><i class="fa-brands fa-facebook-f"></i></a>
      <?php
      }
      if($social['instagram']){ ?>
        <a target="_blank" href="<?= $social['instagram']; ?>"><i class="fa-brands fa-instagram"></i></a>
      <?php
      }
      if($social['linkedin']){ ?>
        <a target="_blank" href="<?= $social['linkedin']; ?>"><i class="fa-brands fa-linkedin"></i></a>
      <?php
      }
      if($social['tiktok']){ ?>
        <a target="_blank" href="<?= $social['tiktok']; ?>"><i class="fa-brands fa-tiktok"></i></a>
      <?php
      }
      if($social['whatsapp']){ ?>
        <a target="_blank" href="<?= $social['whatsapp']; ?>"><i class="fa-brands fa-whatsapp"></i></a>
      <?php
      }
      if($social['twitch']){ ?>
        <a target="_blank" href="<?= $social['twitch']; ?>"><i class="fa-brands fa-twitch"></i></a>
      <?php
      }
      if($social['youtube']){ ?>
          <a target="_blank" href="<?= $social['youtube']; ?>"><i class="fa-brands fa-youtube"></i></a>
        <?php
      }
      if($social['snapchat']){ ?>
          <a target="_blank" href="<?= $social['snapchat']; ?>"><i class="fa-brands fa-snapchat"></i></a>
        <?php
      }
      if($social['pinterest']){ ?>
          <a target="_blank" href="<?= $social['pinterest']; ?>"><i class="fa-brands fa-pinterest"></i></a>
        <?php
      }
    }
    
  ?>
</div>
