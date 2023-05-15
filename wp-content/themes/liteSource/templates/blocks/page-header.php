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
$colours = get_field('site_colours', 'options');
$img = get_field('background_image');
$height = get_field('height') ?: 'small';

$theme = get_field('themes') ?: 'primary';
$colours = get_theme_colours($theme); 

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?= $type . '-header'; ?>" style="<?php if($type == 'image' && $img){?>background-image:url('<?= $img['url']; } ?>');">
    <div class="container <?= $align; ?> <?= $height; ?>" style="color:<?= $colours['textCol']; ?>">
        <?php if($type == 'text'){ get_template_part('templates/partials/breadcrumbs'); } ?>
        <h1><?= $title; ?></h1>
        <?php 
        if($desc){ ?>
        <p class="description"><?= $desc; ?></p>
        <?php } ?>
    </div>
    <?php if($type == 'image' || $type == 'block'){?><div class="overlay" style="background-color:<?= $colours['bg']; ?>"></div> <?php } ?>
</div>
<?php if($type != 'text'){ get_template_part('templates/partials/breadcrumbs'); } ?>
