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
$align = get_field('align');
$overlay = '#000';

//var_dump($background);
$theme = $background['themes'];

if($theme == 'primary'){
    $bg = $colours['primary'];
    $txtCol = getContrastColor($bg);
}
else if($theme == 'secondary'){
    $bg = $colours['secondary'];
    $txtCol = getContrastColor($bg);
}
else if($theme == 'accent'){
    $bg = $colours['accent'];
    $txtCol = getContrastColor($bg);
}
else if($theme == 'none'){
    $bg = '';
    $txtCol = 'white';
}

?>
<div id="<?php echo esc_attr($id); ?>" 
    class="<?php echo esc_attr($className); ?> <?= $background['background_type'] . '-header'; ?>" 
    style="<?php 
    if($background['image']){
        if($background['background_type'] == 'image'){ 
            echo 'background-image:url(' . $background['image']['url'] . ')'; 
        }
    }
     else if($background['background_type'] == 'block') { 
        echo 'background-color:' . $bg; 
    }?>;
    color:<?= $txtCol; ?>">
    <div class="container align-<?= $align; ?>">
        <h1><?= $heading; ?></h1>
        <p><?= $description; ?></p>
        <?php 
        if($buttons){
            get_template_part('templates/partials/button', 'group', array('buttons' => $buttons));
        } ?>
    </div>
    <?php if($background['background_type'] == 'slider'){ ?>
        <div class="slider-background-container">
            <div class="slider-background">
            <?php foreach($background['gallery'] as $img){ ?>
                <img src="<?= $img['url']; ?>"/>
            <?php
                
            } ?>
            </div>
            <div class="slider-background-dots <?= $txtCol; ?>"></div>
        </div>
    <?php
    }
    else if($background['background_type'] == 'video'){ ?>
        <div class="video-background-container">
			<?php
			$video = $background['video_file'];
			if($video){ 
            echo $video; ?>
			<?php
			}?>
		</div>
    <?php
    } ?>
    <span class="overlay" style="background-color:<?= $bg; ?>"></span>
</div>
