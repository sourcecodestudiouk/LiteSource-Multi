<?php

/**
 *  Hero Header
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-header-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-header-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('header');
$description = get_field('description');
$buttons = get_field('buttons');
$colours = get_field('site_colours', 'options');
$background = get_field('background_options');
$overlay = '#000';

if($background['background_type'] == 'image' || $background['background_type'] == 'gallery' ){
    $overlay = $background['images_overlay'];
}
else{
    $block = $background['block_colour'];
}
if(isset($block))
if($block == 'primary' || $overlay == 'primary'){
    $bg = $colours['primary'];
    $txtCol = getContrastColor($bg);
}
else if($block == 'secondary' || $overlay == 'secondary'){
    $bg = $colours['secondary'];
    $txtCol = getContrastColor($bg);
}
else if($block == 'accent' || $overlay == 'accent'){
    $bg = $colours['accent'];
    $txtCol = getContrastColor($bg);
}

?>
<div id="<?php echo esc_attr($id); ?>" 
    class="<?php echo esc_attr($className); ?> <?= $background['background_type'] . '-header'; ?>" 
    style="<?php 
    if($background['background_type'] == 'image'){ 
        echo 'background-image:url(' . $background['image']['url'] . ')'; 
    } else if($background['background_type'] == 'block') { 
        echo 'background-color:' . $bg; 
    }?>;
    color:<?= $txtCol; ?>;">
    <div class="container">
        <h1><?= $heading; ?></h1>
        <p><?= $description; ?></p>
        <?php 
        if($buttons){
            get_template_part('templates/partials/button', 'group', array('buttons' => $buttons));
        } ?>
    </div>
    <span class="overlay" style="background-color:<?= $bg; ?>"></span>
</div>
