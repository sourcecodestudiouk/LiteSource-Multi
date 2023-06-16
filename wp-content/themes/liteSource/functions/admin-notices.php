<?php

function general_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'nav-menus.php' ) {
         echo '<div class="notice notice-warning is-dismissible">
             <p>The Header Navigation Menu can only contain 5 top level items, the rest will automatically go into a dropdown menu.</p>
         </div>';
    }
}
add_action('admin_notices', 'general_admin_notice');

?>