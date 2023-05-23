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
if(is_archive() || is_page('project')){
    if(is_post_type_archive('portfolio')){
        $content = get_field('portfolio_archive', 'options');
    }
    if(is_post_type_archive('project')){
        $content = get_field('projects_archive', 'options');
    }
    if(is_post_type_archive('service')){
        $content = get_field('services_archive', 'options');
    }
    if(is_post_type_archive('departments')){
        $content = get_field('department_archive', 'options');
    }
    if(is_post_type_archive('news')){
        $content = get_field('news_archive', 'options');
    }
    $options = $content['archive_page_header_options'];
    $type = $options['type'] ?: 'text';
    $align = $options['alignment'];
    $img = $options['background_image'];
    $height = $options['height'] ?: 'small';
    $title = $options['title'] ?: get_the_archive_title();
    $desc = $options['description'];
    $theme = $content['archive_theme'];
    $colours = get_header_colours($theme, $type);
}
else{
    $id = 'page-header' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }
    // Load values and assign defaults.
    $type = get_field('type') ?: 'text';
    $align = get_field('alignment');
    $img = get_field('background_image');
    $height = get_field('height') ?: 'small';
    $title = get_field('title') ?: get_the_title();
    $desc = get_field('description');
    $theme = get_field('themes') ?: 'primary';
    $colours = get_theme_colours($theme); 
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'page-header-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}



?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?= $type . '-header'; ?>" style="<?php if($type == 'image' && $img){?>background-image:url('<?= $img['url']; ?>);  <?php }; ?>">
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
