<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Share Buttons
function scs_share_buttons($platforms){
      $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
  <div class="share-buttons">
    <h6>Share this <?= get_post_type(); ?> <?php get_template_part('assets/img/social/share.svg');?></h6>
    <div class="buttons">
      <?php
      foreach($platforms as $plat){
        if($plat == 'facebook'){ ?>
          <a class="facebook-share social-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>" target="_blank"><?php get_template_part('assets/img/social/facebook.svg');?></a><?php
        }
        else if($plat == 'twitter'){ ?>
          <a class="twitter-share social-share" href="https://twitter.com/intent/tweet?text=Check this out - &url=<?=urlencode($link)?>" target="_blank"><?php get_template_part('assets/img/social/twitter.svg');?></a> <?php
        }
        else if($plat == 'linkedin'){ ?>
          <a class="linkedin-share social-share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link;?>" target="_blank"><?php get_template_part('assets/img/social/linkedin.svg');?></a> <?php
        }
        else if($plat == 'email'){ ?>
          <a class="email-share" href="mailto:?subject=Check this out &amp;body=Check out this article on <?php echo $link; ?> - Shared via the onsite share buttons" title="Share by Email"><?php get_template_part('assets/img/social/mail.svg');?></a><?php
        }
      } ?>
    </div>
  </div><?php
} ?>
