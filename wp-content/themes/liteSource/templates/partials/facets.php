<?php 
if(is_archive()){
    if(is_post_type_archive('portfolio')){
        $content = get_field('portfolio_archive', 'options');
        $link = get_site_url() . '/portfolio';
    }
    if(is_post_type_archive('project')){
        $content = get_field('projects_archive', 'options');
        $link = get_site_url() . '/projects';
    }
    if(is_post_type_archive('service')){
        $content = get_field('services_archive', 'options');
        $link = get_site_url() . '/services';
    }
    if(is_post_type_archive('departments')){
        $content = get_field('department_archive', 'options');
        $link = get_site_url() . '/derpartments';
    }
    if(is_post_type_archive('news')){
        $content = get_field('news_archive', 'options');
        $link = get_site_url() . '/news';
    }
    if(is_post_type_archive('industries')){
        $content = get_field('industries_archive', 'options');
        $link = get_site_url() . '/industries';
    }
    $options = $content['archive_page_header_options'];
    $type = $options['type'] ?: 'text';
    $theme = $content['archive_theme'];
    $colours = get_header_colours($theme, $type);
} ?>

<div class="facets-container">
    <?php if(is_page('news') || is_page('events') || is_post_type_archive('portfolio')){ ?>
		<div class="category-archive-filters">
			<?php
			if(isset($_GET['category'])){ ?> <p class="category reset"><a href="<?= $link; ?>">Reset</a></p> <?php }
            if(is_page('news')){
                $cats = get_categories();
            }
            if(is_post_type_archive('portfolio')){
                $cats = get_terms( 'portfolio_cat');
            }
            else if(is_page('events')){
                $cats = get_terms( 'event_cat');
            }
            if(is_page('news') || is_post_type_archive('portfolio') || (is_page('events') && isset($_GET['view']) && $_GET['view'] == 'grid') OR !isset($_GET['view']))
			foreach($cats as $cat){ ?>
				<p class="category" <?php if(isset($_GET['category'])){ if($_GET['category'] == $cat->slug){?> style="background-color:<?= $colours['bg']; ?>; color:<?= $colours['textCol']; ?>" <?php } } ?>><a href="?category=<?= $cat->slug; ?>"><?= $cat->name; ?></a></p>
			<?php
			} ?>
		</div>	
	<?php
	} ?>
    <?php if(is_page('events')){ ?>
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