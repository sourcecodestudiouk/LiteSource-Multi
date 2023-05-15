<?php

$url = get_the_post_thumbnail_url();
$alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

if(!$url){
  $url = '/wp-content/themes/litesource/assets/img/user-placeholder.jpg';
  $alt = 'Placeholder image for the team member';
}

$tel = get_field('telephone_number', get_the_ID());
$email = get_field('email_address', get_the_ID());
$jobTitle = get_field('job_title', get_the_ID());

$theme = get_field('themes');
    $colours = get_field('site_colours', 'options');
    if($theme == 'primary'){
        $bg = $colours['primary'];
        $textCol = getContrastColor($bg);           
    }
    else if($theme == 'secondary'){
        $bg = $colours['secondary'];
        $textCol = getContrastColor($bg);          
    }
    else if($theme == 'accent'){
        $bg = $colours['accent'];
        $textCol = getContrastColor($bg);        
    }
    else if(is_null($theme) OR $theme == 'none'){
        $bodyCol = $colours['body_colour'];
        if($bodyCol == 'white'){
            $bg = '#fff';
        }
        else{
            $bg = $colours['background_colour'];
        }  
        $textCol = getContrastColor($bg);
    }

?>

<div class="team-member-card content-card" style="background-color:<?= $bg; ?>; color:<?= $textCol; ?>">
  <a href="<?= the_permalink(); ?>" style="color:<?= $textCol; ?>">
    <div class="image-container">
      <img src="<?= $url; ?>" alt="<?= $alt; ?>"/>
    </div>
    <h6 class="name"><?= get_the_title(); ?></h6>
    <?php
    if($jobTitle){ ?> <p class="job-title"><?= $jobTitle; ?></p> <?php } ?>
  </a>
</div>
