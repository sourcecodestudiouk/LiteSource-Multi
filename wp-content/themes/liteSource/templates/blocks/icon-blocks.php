<?php

/**
 *  Icon Blocks
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'icon-blocks-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'icon-blocks-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.


$colours = get_field('site_colours', 'options');
$theme = get_field('themes');

if($theme == 'primary'){
    $bg = $colours['primary'];
    $textCol = getContrastColor($bg); 
    $bc = $colours['accent'];           
}
else if($theme == 'secondary'){
    $bg = $colours['secondary'];
    $textCol = getContrastColor($bg);   
    $bc = $colours['accent'];       
}
else if($theme == 'accent'){
    $bg = $colours['accent'];
    $textCol = getContrastColor($bg); 
    $bc = $colours['primary'];       
}

$blocks = get_field('icon_blocks');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color:<?= $bg; ?>; color:<?= $textCol; ?>">
    <div class="container">
        <?php
        foreach($blocks as $bl){ ?>
            <div class="icon-block">
                <div class="icon-container" style="border-color:<?= $bc; ?>">
                    <?= $bl['icon']; ?>
                </div>
                <div class="content">
                    <h3><?= $bl['title']; ?></h3>
                    <?= $bl['description']; ?>
                </div>
            </div>
        <?php
        } ?>
    </div>
</div>