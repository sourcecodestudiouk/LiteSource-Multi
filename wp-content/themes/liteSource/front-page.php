<?php get_header(); ?>
	<main role="main">
		<section class="page-content">
			<?php the_content(); ?>
			<?php $events = get_lite_events(); 
			echo $events; ?>
			<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
			<script>

			document.addEventListener('DOMContentLoaded', function() {
				var calendarEl = document.getElementById('calendar');
				var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				events:'fetchvents.php',
				});
				calendar.render();
			});

			</script>
			<div id='calendar'></div>
		</section>
	</main>
<?php get_footer(); ?>
