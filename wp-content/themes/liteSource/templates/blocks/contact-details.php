<?php

/**
 *  Contact Details
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-details-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-details-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$info = get_field('information_source');
if($info == 'default'){
    $email = get_field('email_address', 'options');
    $tel = get_field('telephone_number', 'options');
    $address = get_field('address', 'options');
}
else if($info == 'custom'){
    $contact = get_field('custom_contact');
    $email = $contact['email_address'];
    $tel = $contact['telephone_number'];
}


$theme = get_field('themes') ?: 'primary';
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
    
   
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($theme == 'none'){ echo 'no-theme';} ?>" <?php if($theme != 'none'){ ?> style="background-color:<?= $bg; ?>; color:<?= $textCol; ?>" <?php }  ?>>
    <h4>Contact Details</h4>
    <div class="contact-details">
      <?php 
      if(isset($email)){ ?>
        <h6>Email</h6>
        <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
      <?php
      } ?>
      <?php 
      if(isset($tel)){ ?>
        <h6>Phone</h6>
        <a href="tel:<?= $tel; ?>"><?= $tel; ?></a>
      <?php
      } ?>
      <?php 
      if(isset($address)){ ?>
        <h6>Address</h6>
        <p><?= $address; ?></p>
        <a target="_blank" href="https://www.google.com/maps/dir//<?= sanitize_title($address); ?>">Get Directions</a>
      <?php
      } ?>
    </div>
    <?php get_template_part('templates/partials/social-media'); ?>
</div>
