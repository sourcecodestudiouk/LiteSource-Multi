<?php 

$events = get_posts(array('post_type' => 'event'));


?>

<div class="map-container">
    <div class="acf-map" data-zoom="16">
        <?php 
            foreach($events as $ev){
                $blocks = parse_blocks( $ev->post_content ); 
                foreach($blocks as $block){
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
                        }
                    }
                } ?>
            <div class="marker" data-lat="<?php echo esc_attr($lat); ?>" data-lng="<?php echo esc_attr($long); ?>">
                <h6>Event Title</h6>
            </div>
            <?php
            }
        ?>
    </div>
</div>