<?php
if( function_exists('acf_add_options_page') ) {
    $sub = get_field('subscription_status', 'admin-settings');
    if(($sub == 'business-plus' || $sub == 'ecommerce') && is_singular()){
        $addons = get_field('modular_addons', 'admin-settings');

        function my_add_template_to_posts() {
            $post_type_object = get_post_type_object( 'event' );
            $post_type_object->template = array(
                array( 'acf/events-information' ),
            );
        }
    
        if(isset($addons)){
            if(in_array('events', $addons)){
                add_action( 'init', 'my_add_template_to_posts' );
            }
        }

        function my_header_template_to_posts() {
            $post_type_object = get_post_type_object( 'post' );
            $post_type_object->template = array(
                array( 'acf/page-header' ),
            );
        }
        add_action( 'init', 'my_header_template_to_posts' );

        function my_header_template_to_services() {
            $post_type_object = get_post_type_object( 'service' );
            $post_type_object->template = array(
                array( 'acf/page-header' ),
            );
        }
        add_action( 'init', 'my_header_template_to_services' );

        function my_header_template_to_portfolio() {
            $post_type_object = get_post_type_object( 'portfolio' );
            $post_type_object->template = array(
                array( 'acf/page-header' ),
            );
        }
        add_action( 'init', 'my_header_template_to_portfolio' );

        function my_header_template_to_industry() {
            $post_type_object = get_post_type_object( 'industries' );
            $post_type_object->template = array(
                array( 'acf/page-header' ),
            );
        }
        add_action( 'init', 'my_header_template_to_industry' );

        function my_header_template_to_department() {
            $post_type_object = get_post_type_object( 'department' );
            $post_type_object->template = array(
                array( 'acf/page-header' ),
            );
        }
        add_action( 'init', 'my_header_template_to_derpartment' );

        // function my_header_template_to_portfolio() {
        //     $post_type_object = get_post_type_object( 'portfolio' );
        //     $post_type_object->template = array(
        //         array( 'acf/page-header' ),
        //     );
        // }
        // add_action( 'init', 'my_header_template_to_portfolio' );
    }
}

?>