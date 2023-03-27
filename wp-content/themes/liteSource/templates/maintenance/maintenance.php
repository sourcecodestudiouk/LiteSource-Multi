<?php echo 'Maintenance Template';

$preloader = get_field('enable_preloader', 'maintenance-mode');
$loader_colour = get_field('loader_colour', 'maintenance-mode');
$loader_icon = get_field('loader_icon');
if($preloader == true){ ?>
  <div class="preloader load-fade" style="background-color: <?php echo $loader_colour; ?>;">
    <div class="icon">
      <div class="icon-two">
      </div>
    </div>
  </div>
<?php
}?>
