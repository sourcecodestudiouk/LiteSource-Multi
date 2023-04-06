<?php

/**
 *  Number Counter
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'number-counter' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

// Create class attribute allowing for custom "className" and "align" values.
$className = 'number-counter-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title');
$desc = get_field('description');
$counters = get_field('counters');
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
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color:<?= $bg; ?>">
    <div class="container" style="color:<?= $textCol; ?>">
        <div class="title-desc">
            <h2><?= $title; ?></h2>
            <p class="description"><?= $desc; ?></p>
        </div>
        <div class="counters">
            <?php foreach($counters as $co){?>
                <div class="counter">
                    <?= $co['icon']; ?>
                    <h2><span><?= $co['number']; ?></span></h2>
                    <p class="title"><?= $co['label']; ?></p>
                    <p class="counter-description"><?= $co['description']; ?></p>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>