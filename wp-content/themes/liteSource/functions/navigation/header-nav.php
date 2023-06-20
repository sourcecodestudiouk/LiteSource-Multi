<?php

// Main Navigation
function header_nav() {
  if( function_exists('acf_add_options_page') ) {
    $theme = get_field('header_theme', 'options');
    $colours = get_field('site_colours', 'options');
  
    if($theme['themes'] == 'primary'){
        $bg = $colours['primary'];
        $textCol = getContrastColor($bg);   
        $accent = $colours['accent'];        
    }
    else if($theme['themes'] == 'secondary'){
        $bg = $colours['secondary'];
        $textCol = getContrastColor($bg);
        $accent = $colours['accent'];        
    }
    else if($theme['themes'] == 'accent'){
        $bg = $colours['accent'];
        $textCol = getContrastColor($bg);  
        $accent = $colours['secondary'];
    }
    else if($theme['themes'] == 'none'){
      $bg = '';
      $textCol = 'white';
      $accent = $colours['secondary'];
    }
    ?>
    <nav class="desktop-navigation">
      <?php
      $menu_name = 'header-menu';
      $locations = get_nav_menu_locations();
      if($locations){
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
      }
       ?>
        <ul class="navigation-container">
            <?php
            $count = 0;
            $topCount = 1;
            $totalCount = 1;
            $submenu = false;
            $current = get_the_ID();
            if(isset($menuitems)){
              foreach( $menuitems as $item ):
                  // set up title and url
                  $totalCount++;
                  $title = $item->title;
                  $link = $item->url;
                  $ID = $item->ID;
                  // item does not have a parent so menu_item_parent equals 0 (false)
                  if ( !$item->menu_item_parent ):
                  // save this id for later comparison with sub-menu items
                  $parent_id = $item->ID;?>
                  <li class="item parent-link">
                      <p class="title <?php if($item->object_id == $current){ echo 'current'; }?>"><a href="<?php echo $link; ?>" style="<?= $textCol; ?>"><span class="text"><?php echo $title; $topCount++; ?><span class="line" style="background-color:<?= $accent; ?>"></span></span></a> </p>
                      <?php endif; ?>
                          <?php if ( $parent_id == $item->menu_item_parent ): ?>
                              <?php if ( !$submenu ): $submenu = true;?>
                              <i class="fa-solid fa-chevron-down"></i>
                              <ul class="sub-menu" style="background-color:<?= $bg; ?>; border-color:<?= $accent; ?>">
                              
                                  <?php endif; ?>
                                    <li class="item child-link" >
                                        <a href="<?php echo $link; ?>" class="title">
                                          <span class="text"><?php echo $title; ?><span class="line" style="background-color:<?= $accent; ?>"></span></span>
                                          
                                        </a>
                                    </li>
                                  <?php if ( $menuitems[ $count ]->menu_item_parent != $parent_id && $submenu ):
                                    ?>
                                  
                              </ul>
                              <?php $submenu = false; endif; ?>
                       <?php endif; ?>
                      <?php 
                      if($item->menu_item_parent){ 
                        if ($menuitems[ $count ]->menu_item_parent != $parent_id ): ?>
                          </li>
                      <?php $submenu = false; endif; 
                      }
                      if($topCount == 6){
                        break;
                      }
              $count++; endforeach; ?>
              
            <?php

            if($topCount == 5){
              $menuitems = array_slice($menuitems, $totalCount - 1); 
              if(count($menuitems) > 1){ ?>
                <li class="item parent-link">
                    <p class="title"><a href="<?php echo $link; ?>"><span class="text">More</span></a> </p>
                    <i class="fa-solid fa-chevron-down"></i>
                    <ul class="sub-menu" style="background-color:<?= $bg; ?>">
                    <?php
                       foreach($menuitems as $item){ 
                          $title = $item->title;
                          $link = $item->url; ?>
                          <li class="item child-link" >
                                        <a href="<?php echo $link; ?>" class="title">
                                          <span class="text"><?php echo $title; ?><span class="line" style="background-color:<?= $accent; ?>"></span></span>
                                          
                                        </a>
                                    </li>
                        <?php } ?>
                    </ul>
                </li>
              <?php 
              }
              else{ ?>
               <li class="item parent-link">
                <p class="title"><a href="<?php echo $menuitems[0]->url; ?>" class="title"><span class="text"><?php echo $menuitems[0]->title; ?></span></a></p>
              </li>
              <?php
              }?>
               
            <?php
            }
            } ?>
          </ul>
      
      </nav>
<?php
  }
}
