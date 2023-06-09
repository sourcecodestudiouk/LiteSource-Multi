<?php

/**
 *  Contact Form
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-form' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-form-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.

    $colours = get_field('site_colours', 'options');
	$bodyCol = $colours['body_colour'];
        if($bodyCol == 'white'){
            $bg = '#ffffff';
        }
        else{
            $bg = $colours['background_colour'];
        }
	$textCol = getContrastColor($bg);

$form = get_field('contact_form');
$style = get_field('form_styling', 'options');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?= $textCol; ?> <?= $style; ?>" style="color:<?= $textCol; ?>; border-color:<?= 'red'; ?>;">
    <?= do_shortcode('[forminator_form id="' . $form->ID . '"]'); ?> 
</div>