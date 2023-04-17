<?php 

function get_lite_events(){
        $events = get_posts(array('post_type' => 'event', 'posts_per_page' => '-1'));

        foreach($events as $ev){
                $id = $ev->ID;
                $name = $ev->post_title;
                var_dump($name);
        }
        //var_dump($newEvents);
        //return json_encode($events);
}

?>