<?php 
$theme = get_field('events_theme', 'options')['themes'];
$colours = get_field('site_colours', 'options');
if($theme == 'primary'){
    $bg = $colours['primary']; 
    $textCol = getContrastColor($bg);            
}
else if($theme == 'secondary'){
    $bg = $colours['secondary'];  
    $textCol = getContrastColor($bg);          
}
else if($theme == 'accent'){
    $bg = $colours['accent'];  
    $textCol = getContrastColor($bg);     
} ?>

<div class="facets-container">
    <?php if(is_page('news') || is_page('events')){ ?>
		<div class="category-archive-filters">
			<?php
			if(isset($_GET['category'])){ ?> <p class="category reset"><a href="<?= get_permalink(); ?>">Reset</a></p> <?php }
            if(is_page('news')){
                $cats = get_categories();
            }
            else if(is_page('events')){
                $cats = get_terms( 'event_cat');
            }
            if(is_page('news') || (is_page('events') && isset($_GET['view']) && $_GET['view'] == 'grid') OR !isset($_GET['view']))
			foreach($cats as $cat){ ?>
				<p class="category<?php if(isset($_GET['category'])){ if($_GET['category'] == $cat->slug){ echo ' current'; }; } ?>"><a href="?category=<?= $cat->slug; ?>"><?= $cat->name; ?></a></p>
			<?php
			} ?>
		</div>	
	<?php
	} ?>
    <?php if(is_page('events')){ ?>
    <div class="view-archive-filters">
        <?php 
        if((isset($_GET['view']) && $_GET['view'] == 'grid')OR !isset($_GET['view'])){ ?>
                <?php 
                if(isset($_GET['events']) && $_GET['events'] == 'past'){ ?>
                 <p class="past-events" style="background-color: <?= $bg; ?>; color:<?= $textCol; ?>;">
                    <a href="?view=grid">View Future Events</a>
                </p>
                <?php
                }
                else{ ?>
                 <p class="future-events">
                    <a href="?view=grid&events=past">View Past Events</a>
                </p>
                <?php
                } ?>
            </p>
        <?php
        } ?>

        <p class="grid-view" <?php if((isset($_GET['view']) && $_GET['view'] == 'grid')OR !isset($_GET['view'])){?>style="background-color: <?= $bg; ?>; color:<?= $textCol; ?>;"<?php }; ?>><a href="?view=grid"><i class="fa-solid fa-grip"></i></a></p>
        <p class="map-view" <?php if(isset($_GET['view']) && $_GET['view'] == 'map'){?>style="background-color: <?= $bg; ?>; color:<?= $textCol; ?>;"<?php }; ?>><a href="?view=map"><i class="fa-solid fa-earth-europe"></i></a></p>
        <!-- <p class="calendar-view" <?php if(isset($_GET['view']) && $_GET['view'] == 'calendar'){?>style="background-color: <?= $bg; ?>; color:<?= $textCol; ?>;"<?php }; ?>><a href="?view=calendar"><i class="fa-solid fa-calendar"></i></a></p> -->
    </div>
    <?php
    } ?>
    
</div>