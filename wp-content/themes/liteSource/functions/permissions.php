<?php
////////////////////////////////////////////////////////////////////////////////////
// Subscription Status and User Permissions

if( function_exists('acf_add_options_page') ) {
$sub = get_field('subscription_status', 'admin-settings');

  if($sub == 'lapsed'){

  }

  if($sub == 'one-page'){
    $role = get_role('editor');
    $role->remove_cap('delete_pages');
    $role->remove_cap('delete_others_pages');
    $role->remove_cap('delete_published_pages');
    $role->remove_cap('create_pages');

    function one_page_post_remove(){
    remove_menu_page('edit.php');
    }
    add_action('admin_menu', 'one_page_post_remove');
  }

  if($sub == 'business-plus'){

  }

  if($sub == 'ecommerce'){

  }

}


?>
