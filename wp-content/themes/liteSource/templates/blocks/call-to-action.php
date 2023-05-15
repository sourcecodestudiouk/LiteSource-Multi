<?php

/**
 *  Call To Action
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'call-to-action' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'call-to-action-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title');
$desc = get_field('description');

$link = get_field('link');

$width = get_field('width');

$style = get_field('style');

$theme = get_field('themes') ?: 'primary';
$colours = get_theme_colours($theme); 

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?= $style . '-style'; ?> <?= $width . '-width'; ?>" style="background-color:<?= $colours['bg']; ?>">
    <div class="container">
        <div class="content" style="color:<?= $colours['textCol']; ?>">
            <h3><?= $title; ?></h3>
            <p class="description"><?= $desc; ?></p>
        </div>
        <p class="btn" style="background-color:<?= $colours['bg']; ?>">
            <a href="<?= $link['url']; ?>" style="color:<?= $colours['textCol']; ?>; border:2px solid <?= $colours['textCol']; ?>"><?= $link['title']; ?></a>
        </p>
    </div>
</div>