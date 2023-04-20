<?php 

function get_lite_events(){
        $events = get_posts(array('post_type' => 'event', 'posts_per_page' => '-1'));
        $all = [];
        foreach($events as $ev){
                $blocks = parse_blocks( $ev->post_content ); 
                foreach($blocks as $block){
                        if($block['blockName'] == 'acf/events-information'){
                                $event = array();
                                $event['title'] = $ev->post_title;
                                if(isset($block['attrs']['data']['date_time'])){
                                        $dates = [];
                                        $index = $block['attrs']['data']['date_time'];
                                        $i = 0;
                                        while($i < $index){
                                        $d['date'] = date("Y-m-d", strtotime($block['attrs']['data']['date_time_' . $i . '_event_date']));
                                        $d['start'] = date("g:ia", strtotime($block['attrs']['data']['date_time_' . $i . '_start_time']));
                                        $d['end'] = date("g:ia", strtotime($block['attrs']['data']['date_time_' . $i . '_end_time']));
                                        
                                        $start_datetime = new DateTime($d['start']); 
                                        $diff = $start_datetime->diff(new DateTime($d['end'])); 
                                        $d['hours'] = $hours = $diff->h;
                                        $dates[] = $d; 
                                        $i++;
                                        //var_dump($dates);
                                        }
                                        //array_push($event, $dates);
                                        $event['start'] = $dates[0]['date'];
                                        $event['end'] = $dates[1]['date'];
                                }

                                if(isset($dates)){
                                        if(count($dates) > 1){
                                                $length = count($dates) . ' Days';
                                        }
                                        else{
                                                $length = $hours . ' Hours';
                                        }
                                        $event['length'] = $length;
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

                                array_push($all, $event);
                                //$all = array(array('"title" : "event title"', '"start": "2023-04-04"') );
                        }
                }
        }
        return json_encode($all);
}

?>