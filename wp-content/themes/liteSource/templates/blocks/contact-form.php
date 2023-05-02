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

$form = get_field('contact_form');
$style = get_field('form_styling', 'options');

var_dump($style);

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-color:<?= $bg; ?>">
    <?= do_shortcode('[forminator_form id="' . $form->ID . '"]'); ?> 
</div>