<?php
    //$event = get_event_info();
    $url = get_the_post_thumbnail_url();
    $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

    if(!$url){
        $url = get_field('company_icon', 'options')['url'];
        $alt = 'Placeholder image for the project';
        $class = 'incl-placeholder';
    }

?> 

<div class="project-card content-card <?= $class; ?>">
    <a href="<?= the_permalink(); ?>">
         <div class="image-container">
            <img src="<?= $url; ?>" alt="<?= $alt; ?>">
        </div>
        <div class="card-content">
            <h6><?= get_the_title(); ?></h6>
        </div>
    </a>
</div>