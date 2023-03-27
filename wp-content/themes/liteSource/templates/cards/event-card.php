<?php
    //$event = get_event_info();
    $url = get_the_post_thumbnail_url();
    $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

    if(!$url){
        $url = '/wp-content/themes/litesource/assets/img/user-placeholder.jpg';
        $alt = 'Placeholder image for the team member';
    }
    
    $blocks = parse_blocks( $post->post_content ); 
    foreach($blocks as $block){
        if($block['blockName'] == 'acf/events-information'){
            if(isset($block['attrs']['data']['location'])){
                $address = $block['attrs']['data']['location']['address'];
            }
            if(isset($block['attrs']['data']['ticket_information_ticket_prices'])){
                $price = $block['attrs']['data']['ticket_information_ticket_prices'];
            }
        }
    }
?> 

<div class="event-card content-card">
    <a href="<?= the_permalink(); ?>">
         <div class="image-container">
            <img src="<?= $url; ?>" alt="<?= $alt; ?>">
        </div>
        <div class="card-content">
            <h6><?= get_the_title(); ?></h6>
            <?php 
            if(isset($address)){ ?>
                <p class="location"><?= $address; ?></p>
            <?php
            } ?>
            <?php 
            if(isset($price)){ ?>
                <p class="price-date"><?= $price; ?> - </p>
            <?php
            } ?>
         </div>
    </a>
</div>