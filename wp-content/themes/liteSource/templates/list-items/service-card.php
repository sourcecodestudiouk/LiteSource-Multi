<?php

    $url = get_the_post_thumbnail_url();
    $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

    if(!$url){
        $url = get_field('company_icon', 'options')['url'];
        $alt = 'Placeholder image for the the service';
        $class = 'incl-placeholder';
    }

    if(isset($args['theme'])){
        $theme = $args['theme'];
    }
    else{
        $theme = get_field('themes');
    }

    $colours = get_theme_colours($theme); 
    $btnCols = get_button_colours($theme);
    
?> 

<div class="service-card list-card <?= $class; ?>" style="background-color:<?= $colours['bg']; ?>; color:<?= $colours['textCol']; ?>">
    <a href="<?= the_permalink(); ?>" style="color:<?= $colours['textCol']; ?>">
         <div class="image-container">
            <img src="<?= $url; ?>" alt="<?= $alt; ?>">
        </div>
        <div class="card-content">
            <h6><?= get_the_title(); ?></h6>
            <div class="description">
                <?= get_short_description($post->post_content); ?>
            </div>
            <p class="btn" style="background-color:<?= $btnCols['bg']; ?>"><span style="color:<?= $btnsCols['textCol']; ?>" href="#">View <?= get_the_title(); ?></span></p>
         </div>
    </a>
</div>

