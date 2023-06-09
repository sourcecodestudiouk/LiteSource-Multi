<?php

/**
 * Full Width Image
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-width-image-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'full-width-image-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$image = get_field('image');
$width = get_field('width');
$height = get_field('height');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php if($width == 'contained'){ ?><div class="container"><?php } ?>
    <img style="height:<?= $height; ?>px;" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>"/>
  <?php if($width == 'contained'){ ?></div><?php } ?>
</div>
