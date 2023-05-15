<?php

/**
 * Full Width Gallery
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-width-gallery-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'full-width-gallery-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$gallery = get_field('gallery');
$width = get_field('width');
$theme = get_field('theme')['themes'];
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
else if($theme == 'none'){
    $bg = '';
    $textCol = 'white';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if($width == 'contained'){ ?><div class="container"><?php } ?>
    <div class="gallery-container">
        <?php foreach($gallery as $gal){ ?>
            <img src="<?= $gal['url']; ?>" alt="<?= $gal['alt']; ?>"/>
        <?php
        } ?>
    </div>
    <div class="slider-arrows">
        <div class="previous" style="background-color:<?= $bg; ?>;"><i style="color:<?= $textCol; ?>" class="fa-solid fa-chevron-left"></i></div>
        <div class="next" style="background-color:<?= $bg; ?>; color:<?= $textCol; ?>"><i style="color:<?= $textCol; ?>" class="fa-solid fa-chevron-right"></i></div>
    </div>
  <?php if($width == 'contained'){ ?></div><?php } ?>
</div>
