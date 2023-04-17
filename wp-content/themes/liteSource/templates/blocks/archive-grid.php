<?php

/**
 * Archive Grid
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
if(!is_page_template( 'content-archive.php' )){
    $id = 'archive-grid-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }
    $archive = get_field('post_type');
    $num = get_field('posts_to_show');
    $title = '<h3>' . get_field('title') . '</h3>';
}
else{
    $archive = get_post();
    $title = '<h1>' . $archive->post_title . '</h1>';
    $type = scs_get_post_type($archive);
    $num = '-1';
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'archive-grid-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="news-facets">
        <?php //wp_dropdown_categories(); 
        //$archive = wp_get_archives();?>
    </div>
    <div class="content-grid">
        <div class="container">
            <?php
            $currentID = get_the_ID();
            if(isset($_GET['category'])){
                $args = array( 'post_type' => $type, 'posts_per_page' => $num, 'order' => 'ASC', 'orderby' => 'menu_order', 'tax_query' => array( array('taxonomy' => 'category', 'field'    => 'slug', 'terms'    => $_GET['category'], ), ),);
            }
            else{
                $args = array( 'post_type' => $type, 'posts_per_page' => $num, 'order' => 'ASC', 'orderby' => 'menu_order');
            }
            $post_query = new WP_Query($args);
            if($post_query->have_posts() ) {
                while($post_query->have_posts() ) { $post_query->the_post();
                    get_template_part('/templates/cards/' . $type . '', 'card');
                }
            }
            wp_reset_postdata(); ?>
        </div>
       
    </div>    
</div>
