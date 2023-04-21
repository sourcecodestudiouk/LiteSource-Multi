<?php

/**
 *  Page Header
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
if(!is_page_template( 'content-archive.php' )){
    $id = 'page-header' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'page-header-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$type = get_field('type') ?: 'text';
$title = get_field('title') ?: get_the_title();
$desc = get_field('description');
$align = get_field('alignment');
$theme = get_field('themes') ?: 'primary';
$colours = get_field('site_colours', 'options');
$img = get_field('background_image');

$textCol = 'black';

if($type == 'image' || $type == 'block'){
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
}


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?= $type . '-header'; ?>" style="<?php if($type == 'image' && isset($img)){?>background-image:url('<?= $img['url']; } ?>');">
    <div class="container <?= $align; ?>" style="color:<?= $textCol; ?>">
        <?php if($type == 'text'){ get_template_part('templates/partials/breadcrumbs'); } ?>
        <h2><?= $title; ?></h2>
        <?php 
        if($desc){ ?>
        <p class="description"><?= $desc; ?></p>
        <?php } ?>
    </div>
    <?php if($type == 'image' || $type == 'block'){?><div class="overlay" style="background-color:<?= $bg; ?>"></div> <?php } ?>
</div>
<?php if($type != 'text'){ get_template_part('templates/partials/breadcrumbs'); } ?>
