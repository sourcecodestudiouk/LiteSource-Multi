<?php 
$colours = get_field('site_colours', 'options');
$txtCol = getContrastColor($colours['secondary']);

$imgUrl = get_the_post_thumbnail_url();
$imgAlt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

if ( has_block( 'acf/events-information') ) {
    $blocks = parse_blocks( $post->post_content ); 
    foreach($blocks as $block){
        //var_dump($block);
        if($block['blockName'] == 'acf/events-information'){
            if(isset($block['attrs']['data']['date_time'])){
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
            }

            if(isset($dates)){
                if(count($dates) > 1){
                    $length = count($dates) . ' Days';
                }
                else{
                    $length = $hours . ' Hours';
                }
            }
            if(isset($block['attrs']['data']['ticket_information_ticket_prices'])){
                $price = $block['attrs']['data']['ticket_information_ticket_prices'];
            }
            if(isset($block['attrs']['data']['ticket_information_ticket_url'])){
                $url = $block['attrs']['data']['ticket_information_ticket_url'];
            }
            if(isset($block['attrs']['data']['location'])){
                $address = $block['attrs']['data']['location']['address'];
                $lat = $block['attrs']['data']['location']['lat'];
                $long = $block['attrs']['data']['location']['lng'];
                $zoom = $block['attrs']['data']['location']['zoom'];
            }
        }
    }?>
    <div class="events-template-container">
        <div class="events-content">
            <?php get_template_part('templates/partials/breadcrumbs'); ?>
            <?php if($imgUrl != ''){ ?>
                <img src="<?= $imgUrl; ?>" alt="<?= $imgAlt; ?>"/>
            <?php
            } ?>
            <div class="date-location">
            <?php if(isset($dates)){ ?>
                <div class="date-time">
                    <h3>Date & Time</h3>
                    <i class="fa-regular fa-calendar"></i>
                    <div class="dates">
                    <?php foreach($dates as $da){ ?>
                        <p class="date"><?= $da['date']; ?> / <?= $da['stime']; ?> - <?= $da['etime']; ?></p>
                        <p class="time"></p>
                    <?php
                    }  ?>
                    
                    </div>
                    <?php
                    if(isset($length)){ ?>
                        <p class="length"><i class="fa-solid fa-hourglass-half"></i><span><?= $length; ?></span></p>
                    <?php
                    } ?>
                </div>
            <?php 
            } ?>
            <?php 
                if(isset($address) ){ ?>
                <div class="location">
                    <h3>Location</h3>
                    <address><a target="_blank" href="https://www.google.com/maps/dir//<?= $address; ?>"><?= $address; ?></a></address>
                </div>
                <?php } ?>
            </div>
            <?php the_content(); ?>
            <?php scs_share_buttons(array('facebook', 'twitter', 'email', 'linkedin')); ?>
        </div>
        <div class="location-ticket">
            <div class="inner">
                <?php 
                if( isset($address) ){ ?>
                <div class="map-container">
                    <div class="acf-map" data-zoom="16">
                        <div class="marker" data-lat="<?php echo esc_attr($lat); ?>" data-lng="<?php echo esc_attr($long); ?>"></div>
                    </div>
                </div>
                    
                <?php } ?>
                
                <?php 
                if(isset($url) || isset($price)){ ?>
                    <div class="ticket-information">
                        <?php if($price){ ?>
                            <p class="price"><?= $price; ?></p>
                        <?php
                        } ?>
                        <?php if($url){ ?>
                            <p class="btn" style="background-color:<?= $colours['secondary']; ?>">
                                <a target="_blank" href="<?= $url; ?>" style="color:<?= $txtCol; ?>">Get Tickets</a>
                            </p>
                        <?php
                        } ?>
                        
                    </div>
                <?php
                } ?>
                
            </div>
            
        </div>
    </div>
<?php
}
else{
    the_content();
} ?>

