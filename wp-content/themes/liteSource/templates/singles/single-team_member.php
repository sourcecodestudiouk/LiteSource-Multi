<?php

$url = get_the_post_thumbnail_url();
$alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

if(!$url){
  $url = '/wp-content/themes/litesource/assets/img/user-placeholder.jpg';
  $alt = 'Placeholder image for the team member';
}

$publicContact = get_field('public_contact_information');
if($publicContact){
  $tel = get_field('telephone_number');
  $email = get_field('email_address');
  $linkedin = get_field('linkedin_url');
}
$jobTitle = get_field('job_title');
$bio = get_field('bio');?>

<?php get_template_part('templates/partials/breadcrumbs'); ?>
<div class="team-member-profile">
  <div class="image-contact">
    <img src="<?= $url; ?>" alt="<?= $alt; ?>"/>
    <?php
    if($publicContact && $tel){ ?> <p class="btn telephone"><a href="tel:<?= $tel; ?>"><?= $tel; ?></a></p> <?php }
    if($publicContact && $email){ ?> <p class="btn email-address"><a href="mailto:<?= $email; ?>"><?= $email; ?></a></p> <?php }
    if($publicContact && $linkedin){ ?> <p class="btn email-address"><a target="_blank" href="<?= $linkedin; ?>">Connect on LinkedIn</a></p> <?php } ?>
  </div>
  <div class="title-bio">
    <h1><?= the_title(); ?></h1>
    <?php if($jobTitle){ ?> <h6 class="job-title"><?= $jobTitle; ?></h6> <?php } ?>
    <?php if($bio){ ?> <div class="bio"><?= $bio; ?></div> <?php } ?>
  </div>
</div>

<?php get_template_part('templates/blocks/team-profiles'); ?>
