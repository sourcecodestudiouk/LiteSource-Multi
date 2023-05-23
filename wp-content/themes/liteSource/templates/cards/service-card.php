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
?> 

<div class="service-card content-card <?= $class; ?>" style="background-color:<?= $bg; ?>; color:<?= $textCol; ?>">
    <a href="<?= the_permalink(); ?>" style="color:<?= $textCol; ?>">
         <div class="image-container">
            <img src="<?= $url; ?>" alt="<?= $alt; ?>">
        </div>
        <div class="card-content">
            <h6><?= get_the_title(); ?></h6>
         </div>
    </a>
</div>