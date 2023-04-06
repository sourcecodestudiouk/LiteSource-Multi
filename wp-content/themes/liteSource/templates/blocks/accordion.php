<?php

/**
 *  Accordion
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$theme = get_field('themes') ?: 'primary';
$colours = get_field('site_colours', 'options');

$accordion = get_field('accordion');

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
    <div class="accordion-container">
        <?php
        foreach($accordion as $acc){ ?>
          <div class="information-container" style="background-color:<?= $bg; ?>; color:<?= $textCol; ?>">
            <p class="title"><span class="plus">+</span><span class="minus">-</span><span class="text"><?= $acc['title']; ?></span></p>
            <div class="description">
              <?= $acc['description']; ?>
            </div>
          </div>
        <?php
        } ?>
    </div>
</div>