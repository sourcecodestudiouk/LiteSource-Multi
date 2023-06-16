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
if(is_archive()){
    $archive = get_post_type();
    $type = scs_get_post_type($archive);
    $num = '-1';
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
    if(is_post_type_archive('industries')){
        $content = get_field('industries_archive', 'options');
    }
    if(is_post_type_archive('events')){
        $content = get_field('events_archive', 'options');
    }
    $theme = $content['archive_theme'];
    $layout = $content['archive_layout'] ?: 'list';
}
else{
    $id = 'archive-grid-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }
    $archive = get_field('post_type');
    $num = get_field('posts_to_show');
    $title = '<h3>' . get_field('title') . '</h3>';
    $theme = get_field('archive_theme');
}

$colours = get_theme_colours($theme);

// Create class attribute allowing for custom "className" and "align" values.
$className = 'archive-grid-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="content-grid">
        <div class="container">
            <?php
            if(isset($_GET['view']) && $_GET['view'] == 'map'){
                get_template_part('templates/events/events-overview-map');
            }
            else if(isset($_GET['view']) && $_GET['view'] == 'calendar'){
                echo "View Calendar";
            }
            else{
                $currentID = get_the_ID();
                if(isset($_GET['category']) && is_page('news')){
                    $args = array( 'post_type' => $type, 'posts_per_page' => $num, 'order' => 'ASC', 'orderby' => 'menu_order', 'tax_query' => array( array('taxonomy' => 'category', 'field' => 'slug', 'terms' => $_GET['category'], ), ),);
                }
                if(isset($_GET['category']) && is_post_type_archive('portfolio')){
                    $args = array( 'post_type' => $type, 'posts_per_page' => $num, 'order' => 'ASC', 'orderby' => 'menu_order', 'tax_query' => array( array('taxonomy' => 'portfolio_cat', 'field' => 'slug', 'terms' => $_GET['category'], ), ),);
                }
                if(isset($_GET['category']) && is_page('events')){
                    $args = array( 'post_type' => $type, 'posts_per_page' => $num, 'order' => 'ASC', 'orderby' => 'menu_order', 'tax_query' => array( array('taxonomy' => 'category', 'field' => 'slug', 'terms' => $_GET['category'], ), ),);
                }
                else{
                    $args = array( 'post_type' => $type, 'posts_per_page' => $num, 'order' => 'ASC', 'orderby' => 'menu_order');
                }
                $post_query = new WP_Query($args);
                if($post_query->have_posts() ) {
                    while($post_query->have_posts() ) { $post_query->the_post();
                        if(is_page_template( 'content-archive.php' ) && is_page('events')){
                            $today = intval(date('Ymd'));
                            $blocks = parse_blocks( $post->post_content ); 
                            foreach($blocks as $block){
                                if($block['blockName'] == 'acf/events-information'){
                                    $date = intval(date($block['attrs']['data']['date_time_0_event_date']));
                                    if(isset($_GET['events']) && $_GET['events'] == 'past'){
                                        if($today >= $date){
                                            get_template_part('/templates/cards/' . $type . '', 'card', ['theme' => $theme]);
                                        }
                                    } 
                                    else{
                                        if($today <= $date){
                                            get_template_part('/templates/cards/' . $type . '', 'card', [ 'theme' => $theme ]);
                                        }
                                    }
                                    
                                }
                            }
                            
                        }
                        else{ 
                            if($layout == 'list'){

                                get_template_part('/templates/list-items/' . $type . '', 'card', ['theme' => $theme]);
                            }   
                            else{
                                get_template_part('/templates/cards/' . $type . '', 'card', ['theme' => $theme]);
                            }
                        }
                        
                    }
                }
                wp_reset_postdata(); 
            }
            ?>
        </div>
       
    </div>    
</div>

