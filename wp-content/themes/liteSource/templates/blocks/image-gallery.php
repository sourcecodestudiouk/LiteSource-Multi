<?php

/**
 *  Image Gallery
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-gallery-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image-gallery-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$theme = get_field('themes') ?: 'primary';
$colours = get_field('site_colours', 'options');

$gallery = get_field('gallery');
$lightbox = get_field('lightbox_images');
$columns = get_field('columns');

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
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="gallery-container <?php if($lightbox){ echo 'lightbox-enabled';}  ?> <?= $columns . '-columns'; ?>">
        <?php foreach($gallery as $img){ ?>
            <div class="image-container">
            <?php if($lightbox){?> <a href="<?= $img['url'] ?>"  data-lightbox="image-group"><?php } ?><img src="<?= $img['url'] ?>" alt="<?= $img['alt']; ?>"/> <?php if($lightbox){?></a><?php } ?>
            </div>
        <?php
        } ?>
    </div>
</div>