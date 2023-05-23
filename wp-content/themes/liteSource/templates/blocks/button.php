<?php

/**
 *  Button 
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'button' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'button-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$button = get_field('button');
$position = get_field('position');

$theme = get_field('themes');
$colours = get_theme_colours($theme); 

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="justify-content:<?= $position; ?>">
    <p class="btn" style="background-color:<?= $colours['bg']; ?>"><a target="<?= $button['target']; ?>" style="color:<?= $colours['textCol']; ?>" href="<?= $button['url']; ?>"><?= $button['title']; ?></a></p>
</div>