<?php

/**
 *  Events Calendar
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events-calendar-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'events-calendar-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
    $events = get_lite_events(); 
    var_dump($events);
    // $events = json_decode($events);
    // foreach($events as $ev){
    //     var_dump($ev);
    //     echo '</br></br></br>';
    // }
	?>
   
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events:'wp-content/themes/litesource/functions/events/get_events.php',
            eventSourceFailure(error) {
    if (error instanceof JsonRequestError) {
      console.log(`Request to ${error.response.url} failed`)
    }
  }
        });
        calendar.render();
    });

    </script>    
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div id='calendar'></div>		
</div>
