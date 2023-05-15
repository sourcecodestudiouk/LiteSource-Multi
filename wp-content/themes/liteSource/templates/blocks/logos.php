<?php

/**
 *  Logos
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'logos-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'logos-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$logos = get_field('logos');

$colours = get_field('site_colours', 'options'); 
$bg = $colours['background_colour'];


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color:<?= $bg; ?>">
    <?php foreach($logos as $logo){ ?>
            <div class="image-container">
                <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt']; ?>"/>
            </div>
        <?php
    } ?>
</div>
