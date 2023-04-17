<?php
    //$event = get_event_info();
    $url = get_the_post_thumbnail_url();
    $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

    if(!$url){
        $url = get_field('company_icon', 'options')['url'];
        $alt = 'Placeholder image for the the event';
        $class = 'incl-placeholder';
    }
    
    $blocks = parse_blocks( $post->post_content ); 
    foreach($blocks as $block){
        if($block['blockName'] == 'acf/events-information'){
            $dates = [];
            $index = $block['attrs']['data']['date_time'];
            $i = 0;
            while($i < $index){
                $d['date'] = date("F d, Y", strtotime($block['attrs']['data']['date_time_' . $i . '_event_date']));
                $d['stime'] = date("g:ia", strtotime($block['attrs']['data']['date_time_' . $i . '_start_time']));
                $d['etime'] = date("g:ia", strtotime($block['attrs']['data']['date_time_' . $i . '_end_time']));
                
                $start_datetime = new DateTime($d['stime']); 
                $diff = $start_datetime->diff(new DateTime($d['etime'])); 
                $d['hours'] = $hours = $diff->h;
                $dates[] = $d; 
                $i++;
            }
            if(isset($dates)){
                if(count($dates) > 1){
                    $length = count($dates) . ' Days';
                }
                else{
                    $length = $hours . ' Hours';
                }
            }
            if(isset($block['attrs']['data']['location'])){
                $address = $block['attrs']['data']['location']['address'];
            }
            if(isset($block['attrs']['data']['ticket_information_ticket_prices'])){
                $price = $block['attrs']['data']['ticket_information_ticket_prices'];
            }
        }
    }
?> 

<div class="event-card content-card <?= $class; ?>">
    <a href="<?= the_permalink(); ?>">
         <div class="image-container">
            <img src="<?= $url; ?>" alt="<?= $alt; ?>">
        </div>
        <div class="card-content">
            <h4><?= get_the_title(); ?></h4>
            <?php 
            if(isset($address)){ ?>
                <p class="location"><?= $address; ?></p>
            <?php
            } ?>
            <?php 
            if(isset($price)){ ?>
                <p class="price"><?= $price; ?> <?php if(isset($length)){ echo '- ' . $length; }?></p>
            <?php
            }
            if(isset($dates)){ ?>
                <p class="date-length"><?= $dates[0]['date'] . ' - ' . $dates[0]['stime']; ?></p>
            <?php
            } ?>
            
         </div>
    </a>
</div>