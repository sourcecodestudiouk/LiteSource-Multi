<?php

add_filter( 'block_categories_all' , function( $categories ) {

  // Adding a new category.
$categories[] = array(
  'slug'  => 'buttons',
  'title' => 'Buttons',
);

$categories[] = array(
  'slug'  => 'custom-layout',
  'title' => 'Custom Layout',
);

$categories[] = array(
  'slug'  => 'contact',
  'title' => 'Contact',
);

$categories[] = array(
  'slug'  => 'header',
  'title' => 'Header',
);

$categories[] = array(
  'slug'  => 'image',
  'title' => 'Images / Gallery',
);

$categories[] = array(
  'slug'  => 'team',
  'title' => 'Team',
);

$categories[] = array(
  'slug'  => 'testimonials',
  'title' => 'Testimonials',
);

$categories[] = array(
  'slug'  => 'portfolio',
  'title' => 'Portfolio',
);

$categories[] = array(
  'slug'  => 'service',
  'title' => 'Service',
);

$categories[] = array(
  'slug'  => 'events-module',
  'title' => 'Events',
);

$categories[] = array(
  'slug'  => 'news',
  'title' => 'News / Blog',
);


return $categories;
} );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Register ACF Blocks

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

      $icon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 94.85 53.05"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:url(#linear-gradient-2);}.cls-3{fill:url(#linear-gradient-3);}</style><linearGradient id="linear-gradient" x1="16.01" x2="16.01" y2="45.19" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ffbafa"/><stop offset="0.5" stop-color="#ffbafa"/><stop offset="1" stop-color="#3b027f"/></linearGradient><linearGradient id="linear-gradient-2" x1="78.84" y1="52.96" x2="78.84" y2="7.86" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-3" x1="22.54" y1="51.42" x2="72.31" y2="1.65" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#3b027f"/><stop offset="1" stop-color="#ffbafa"/></linearGradient></defs><title>SCS-Icon-Grad</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M22.36,43.75l4.11-4.11.05,0L13.39,26.47l17-17a5.55,5.55,0,0,0-7.84-7.85L1.62,22.55h0a5.55,5.55,0,0,0,0,7.84L15.2,44A5.51,5.51,0,0,0,22.36,43.75Z"/><path class="cls-2" d="M80.13,9.48a5.54,5.54,0,0,0-7.64-.17l-4.1,4.1L81.46,26.47l-17,17A5.55,5.55,0,0,0,68.39,53a5.52,5.52,0,0,0,3.92-1.64L93.23,30.4h0a5.56,5.56,0,0,0,0-7.85"/><path class="cls-3" d="M72.31,1.65a5.53,5.53,0,0,0-7.82,0l0,0-.1.1L26.52,39.6l-.05,0-4.11,4.11A5.51,5.51,0,0,1,15.2,44a5.84,5.84,0,0,1-.48-.39l7.82,7.83a5.53,5.53,0,0,0,7.81,0l0,0,38-38h0l4.1-4.1a5.54,5.54,0,0,1,7.64.17Z"/></g></g></svg>';

      $addons = get_field('modular_addons', 'admin-settings');

      $postTypes = get_field('post_types', 'options');

      //var_dump($postTypes);
      if(isset($addons)){
        if(in_array('events', $addons)){
          acf_register_block_type(array(
            'name'              => 'Events Card Slider',
            'title'             => __('Events Card Slider'),
            'description'       => __('Events card slider block for use within the events addon module.'),
            'render_template'   => 'templates/blocks/events-slider.php',
            'category'          => 'events-module',
            'icon'              => 'slides',
            'keywords'          => array( 'events', 'slider' ),
          ));

          acf_register_block_type(array(
            'name'              => 'Events Information',
            'title'             => __('Events Information'),
            'description'       => __('Events information block for use within the events addon module.'),
            'render_template'   => 'templates/blocks/events-information.php',
            'category'          => 'events-module',
            'icon'              => $icon,
            'keywords'          => array( 'events', 'information', 'overview' ),
          ));

          acf_register_block_type(array(
            'name'              => 'Events Calendar',
            'title'             => __('Events Calendar'),
            'description'       => __('Events calendar block for use within the events addon module.'),
            'render_template'   => 'templates/blocks/events-calendar.php',
            'category'          => 'events-module',
            'icon'              => $icon,
            'keywords'          => array( 'events', 'calendar' ),
          ));
        }
      }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Team Post Type Related Blocks
        if(isset($postTypes)){
          if(in_array('team', $postTypes)){
            acf_register_block_type(array(
              'name'              => 'Team Profiles',
              'title'             => __('Team Profiles'),
              'description'       => __('A block to display the team profiles in either a slider or a grid'),
              'render_template'   => 'templates/blocks/team-profiles.php',
              'category'          => 'team',
              'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path
                d="M15.5 9.5a1 1 0 100-2 1 1 0 000 2zm0 1.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm-2.25 6v-2a2.75 2.75 0 00-2.75-2.75h-4A2.75 2.75 0 003.75 15v2h1.5v-2c0-.69.56-1.25 1.25-1.25h4c.69 0 1.25.56 1.25 1.25v2h1.5zm7-2v2h-1.5v-2c0-.69-.56-1.25-1.25-1.25H15v-1.5h2.5A2.75 2.75 0 0120.25 15zM9.5 8.5a1 1 0 11-2 0 1 1 0 012 0zm1.5 0a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" fillRule="evenodd"/> </svg>',
              'keywords'          => array( 'team', 'slider', 'grid', 'content' ),
            ));
          }
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Service Post Type Related Blocks

        if(isset($postTypes)){
          if(in_array('services', $postTypes)){
            acf_register_block_type(array(
              'name'              => 'Services Overview',
              'title'             => __('Services Overview'),
              'description'       => __('A block to display the service cards in either a slider or a grid'),
              'render_template'   => 'templates/blocks/services-overview.php',
              'category'          => 'service',
              'icon'              => $icon,
              'keywords'          => array( 'services', 'slider', 'grid', 'content' ),
            ));
          }
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Portfolio Post Type Related Blocks
        if(isset($postTypes)){
          if(in_array('portfolio', $postTypes)){
            acf_register_block_type(array(
              'name'              => 'Portfolio Overview',
              'title'             => __('Portfolio Overview'),
              'description'       => __('A block to display the portfolio in either a grid view or full width view'),
              'render_template'   => 'templates/blocks/portfolio-overview.php',
              'category'          => 'portfolio',
              'icon'              => 'slides',
              'keywords'          => array( 'portfolio', 'full-width', 'grid', 'content' ),
            ));
          }
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Testimonial Post Type Related Blocks
        if(isset($postTypes)){
          if(in_array('testimonials', $postTypes)){
            acf_register_block_type(array(
              'name'              => 'Testimonials',
              'title'             => __('Testimonials'),
              'description'       => __('A block to display the customer testimonials in either a slider or a full width block'),
              'render_template'   => 'templates/blocks/testimonials.php',
              'category'          => 'testimonials',
              'icon'              => 'format-quote',
              'keywords'          => array( 'testimonials', 'slider', 'grid', 'content' ),
            ));
          }
        }

         //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Testimonial Post Type Related Blocks
        if(isset($postTypes)){
          if(in_array('news', $postTypes)){
            acf_register_block_type(array(
              'name'              => 'Latest News',
              'title'             => __('Latest News'),
              'description'       => __('A block to display the news in either a slider or a full width block'),
              'render_template'   => 'templates/blocks/latest-news.php',
              'category'          => 'news',
              'icon'              => 'slides',
              'keywords'          => array( 'news', 'slider', 'grid', 'content' ),
            ));
          }
        }

        

        // acf_register_block_type(array(
        //     'name'              => 'Link Grid',
        //     'title'             => __('Link Grid'),
        //     'description'       => __('Link Grid Custom Block'),
        //     'render_template'   => 'templates/blocks/link-grid.php',
        //     'category'          => 'custom-layout',
        //     'icon'              => 'screenoptions',
        //     'keywords'          => array( 'links', 'grid' ),
        // ));

        // acf_register_block_type(array(
        //     'name'              => 'Latest News',
        //     'title'             => __('Latest News'),
        //     'description'       => __('Latest News Custom Block'),
        //     'render_template'   => 'templates/blocks/latest-news.php',
        //     'category'          => 'custom-layout',
        //     'icon'              => 'widgets',
        //     'keywords'          => array( 'news', 'grid' ),
        // ));

        // acf_register_block_type(array(
        //     'name'              => 'Feature Blocks',
        //     'title'             => __('Feature Blocks'),
        //     'description'       => __('Feature Blocks Custom Block'),
        //     'render_template'   => 'templates/blocks/feature-blocks.php',
        //     'category'          => 'custom-layout',
        //     'icon'              => 'screenoptions',
        //     'keywords'          => array( 'blocks', 'inline' ),
        // ));

        // acf_register_block_type(array(
        //     'name'              => 'Large Text',
        //     'title'             => __('Large Text'),
        //     'description'       => __('Large Text Custom Block'),
        //     'render_template'   => 'templates/blocks/large-text.php',
        //     'category'          => 'custom-layout',
        //     'icon'              => 'screenoptions',
        //     'keywords'          => array( 'large', 'text' ),
        // ));

        // acf_register_block_type(array(
        //     'name'              => 'Stats',
        //     'title'             => __('Stats'),
        //     'description'       => __('Stats Custom Block'),
        //     'render_template'   => 'templates/blocks/stats.php',
        //     'category'          => 'custom-layout',
        //     'icon'              => 'screenoptions',
        //     'keywords'          => array( 'stats' ),
        // ));

        acf_register_block_type(array(
            'name'              => 'Contact Form',
            'title'             => __('Contact Form'),
            'description'       => __('Contact Form Custom Block'),
            'render_template'   => 'templates/blocks/contact-form.php',
            'category'          => 'contact',
            'icon'              => 'feedback',
            'keywords'          => array( 'contact', 'form' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Logos',
          'title'             => __('Logos'),
          'description'       => __('Logos Custom Block'),
          'render_template'   => 'templates/blocks/logos.php',
          'category'          => 'image',
          'icon'              => 'screenoptions',
          'keywords'          => array( 'logos', 'gallery' ),
      ));

        acf_register_block_type(array(
          'name'              => 'Single Image',
          'title'             => __('Single Image'),
          'description'       => __('Single Image Custom Block'),
          'render_template'   => 'templates/blocks/single-image.php',
          'category'          => 'image',
          'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 4.5h14c.3 0 .5.2.5.5v8.4l-3-2.9c-.3-.3-.8-.3-1 0L11.9 14 9 12c-.3-.2-.6-.2-.8 0l-3.6 2.6V5c-.1-.3.1-.5.4-.5zm14 15H5c-.3 0-.5-.2-.5-.5v-2.4l4.1-3 3 1.9c.3.2.7.2.9-.1L16 12l3.5 3.4V19c0 .3-.2.5-.5.5z" /></svg>',
          'keywords'          => array( 'image' ),
      ));

        acf_register_block_type(array(
            'name'              => 'Full Width Image',
            'title'             => __('Full Width Image'),
            'description'       => __('Full Width Image Custom Block'),
            'render_template'   => 'templates/blocks/full-width-image.php',
            'category'          => 'image',
            'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 4.5h14c.3 0 .5.2.5.5v8.4l-3-2.9c-.3-.3-.8-.3-1 0L11.9 14 9 12c-.3-.2-.6-.2-.8 0l-3.6 2.6V5c-.1-.3.1-.5.4-.5zm14 15H5c-.3 0-.5-.2-.5-.5v-2.4l4.1-3 3 1.9c.3.2.7.2.9-.1L16 12l3.5 3.4V19c0 .3-.2.5-.5.5z" /></svg>',
            'keywords'          => array( 'image', 'full width' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Button',
          'title'             => __('Button'),
          'description'       => __('Button Custom Block'),
          'render_template'   => 'templates/blocks/button.php',
          'category'          => 'buttons',
          'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 6.5H5c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-7c0-1.1-.9-2-2-2zm.5 9c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-7c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v7zM8 12.8h8v-1.5H8v1.5z" /></svg>',
          'keywords'          => array( 'button', 'component' ),
        ));

        acf_register_block_type(array(
            'name'              => 'Full Width Gallery',
            'title'             => __('Full Width Gallery'),
            'description'       => __('Full Width Gallery Custom Block'),
            'render_template'   => 'templates/blocks/full-width-gallery.php',
            'category'          => 'image',
            'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.375 4.5H4.625a.125.125 0 0 0-.125.125v8.254l2.859-1.54a.75.75 0 0 1 .68-.016l2.384 1.142 2.89-2.074a.75.75 0 0 1 .874 0l2.313 1.66V4.625a.125.125 0 0 0-.125-.125Zm.125 9.398-2.75-1.975-2.813 2.02a.75.75 0 0 1-.76.067l-2.444-1.17L4.5 14.583v1.792c0 .069.056.125.125.125h11.75a.125.125 0 0 0 .125-.125v-2.477ZM4.625 3C3.728 3 3 3.728 3 4.625v11.75C3 17.273 3.728 18 4.625 18h11.75c.898 0 1.625-.727 1.625-1.625V4.625C18 3.728 17.273 3 16.375 3H4.625ZM20 8v11c0 .69-.31 1-.999 1H6v1.5h13.001c1.52 0 2.499-.982 2.499-2.5V8H20Z" fillRule="evenodd" clipRule="evenodd"/></svg>',
            'keywords'          => array( 'image', 'full width', 'gallery' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Separator',
          'title'             => __('Separator'),
          'description'       => __('Separator Custom Block'),
          'render_template'   => 'templates/blocks/separator.php',
          'category'          => 'custom-layout',
          'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.2 7v4H3.8V7H2.2v9h1.6v-3.5h16.4V16h1.6V7z" /></svg>',
          'keywords'          => array( 'separator', 'spacing' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Contact Details',
          'title'             => __('Contact Details'),
          'description'       => __('Contact Details Custom Block'),
          'render_template'   => 'templates/blocks/contact-details.php',
          'category'          => 'contact',
          'icon'              => 'phone',
          'keywords'          => array( 'contact', 'details', 'content' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Page Header',
          'title'             => __('Page Header'),
          'description'       => __('Page Header Block'),
          'render_template'   => 'templates/blocks/page-header.php',
          'category'          => 'header',
          'icon'              => 'align-center',
          'keywords'          => array( 'header', 'title', 'page' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Hero Header',
          'title'             => __('Hero Header'),
          'description'       => __('Hero Header Block'),
          'render_template'   => 'templates/blocks/hero-header.php',
          'category'          => 'header',
          'icon'              => 'align-center',
          'keywords'          => array( 'header', 'title', 'hero' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Number Counter',
          'title'             => __('Number Counter'),
          'description'       => __('Number Counter Block'),
          'render_template'   => 'templates/blocks/number-counter.php',
          'category'          => 'custom-layout',
          'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M11.1 15.8H20v-1.5h-8.9v1.5zm0-8.6v1.5H20V7.2h-8.9zM5 6.7V10h1V5.3L3.8 6l.4 1 .8-.3zm-.4 5.7c-.3.1-.5.2-.7.3l.1 1.1c.2-.2.5-.4.8-.5.3-.1.6 0 .7.1.2.3 0 .8-.2 1.1-.5.8-.9 1.6-1.4 2.5h2.7v-1h-1c.3-.6.8-1.4.9-2.1.1-.3 0-.8-.2-1.1-.5-.6-1.3-.5-1.7-.4z" />
        </svg>',
          'keywords'          => array( 'numbers', 'counter', 'icon' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Accordion',
          'title'             => __('Accordion'),
          'description'       => __('Accordion Block'),
          'render_template'   => 'templates/blocks/accordion.php',
          'category'          => 'custom-layout',
          'icon'              => 'image-flip-vertical',
          'keywords'          => array( 'accordion', 'layout', 'text' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Image Gallery',
          'title'             => __('Image Gallery'),
          'description'       => __('Image Gallery Block'),
          'render_template'   => 'templates/blocks/image-gallery.php',
          'category'          => 'image',
          'icon'              => '<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.375 4.5H4.625a.125.125 0 0 0-.125.125v8.254l2.859-1.54a.75.75 0 0 1 .68-.016l2.384 1.142 2.89-2.074a.75.75 0 0 1 .874 0l2.313 1.66V4.625a.125.125 0 0 0-.125-.125Zm.125 9.398-2.75-1.975-2.813 2.02a.75.75 0 0 1-.76.067l-2.444-1.17L4.5 14.583v1.792c0 .069.056.125.125.125h11.75a.125.125 0 0 0 .125-.125v-2.477ZM4.625 3C3.728 3 3 3.728 3 4.625v11.75C3 17.273 3.728 18 4.625 18h11.75c.898 0 1.625-.727 1.625-1.625V4.625C18 3.728 17.273 3 16.375 3H4.625ZM20 8v11c0 .69-.31 1-.999 1H6v1.5h13.001c1.52 0 2.499-.982 2.499-2.5V8H20Z" fillRule="evenodd" clipRule="evenodd"/></svg>',
          'keywords'          => array( 'gallery', 'images' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Call To Action',
          'title'             => __('Call To Action'),
          'description'       => __('Call to action block as part of the standard system.'),
          'render_template'   => 'templates/blocks/call-to-action.php',
          'category'          => 'custom-layout',
          'icon'              => 'megaphone',
          'keywords'          => array( 'cta', 'divider', 'link' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Icon Blocks',
          'title'             => __('Icon Blocks'),
          'description'       => __('Icon Blocks Block'),
          'render_template'   => 'templates/blocks/icon-blocks.php',
          'category'          => 'custom-layout',
          'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M12 3c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 1.5c4.1 0 7.5 3.4 7.5 7.5v.1c-1.4-.8-3.3-1.7-3.4-1.8-.2-.1-.5-.1-.8.1l-2.9 2.1L9 11.3c-.2-.1-.4 0-.6.1l-3.7 2.2c-.1-.5-.2-1-.2-1.5 0-4.2 3.4-7.6 7.5-7.6zm0 15c-3.1 0-5.7-1.9-6.9-4.5l3.7-2.2 3.5 1.2c.2.1.5 0 .7-.1l2.9-2.1c.8.4 2.5 1.2 3.5 1.9-.9 3.3-3.9 5.8-7.4 5.8z" />
        </svg>',
          'keywords'          => array( 'icons', 'features', 'page' ),
        ));

        acf_register_block_type(array(
          'name'              => 'Content Slider',
          'title'             => __('Content Slider'),
          'description'       => __('content slider block as part of the standard system.'),
          'render_template'   => 'templates/blocks/content-slider.php',
          'category'          => 'custom-layout',
          'icon'              => 'slides',
          'keywords'          => array( 'content', 'posts', 'slider' ),
        ));
    }
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add options pages

if( function_exists('acf_add_options_page') ) {
  $args = array(
    'page_title' => 'Site Options',
    'menu_title' => 'Site Options',
    'menu_slug' => 'site-options',
    'capability' => 'edit_posts',
    'position' => false,
    'parent_slug' => '',
    'icon_url' => 'dashicons-menu',
    'redirect' => true,
    'post_id' => 'site-options',
    'autoload' => false,
    'update_button'		=> __('Update', 'acf'),
    'updated_message'	=> __("Options Updated", 'acf'),
  );
  acf_add_options_page( $args );

  $args = array(
    'page_title'  => __('Company Info'),
    'menu_title'  => __('Company Info'),
    'menu_slug' => 'company-info',
    'parent_slug' => 'site-options',
  );
  acf_add_options_sub_page( $args );

  $args = array(
    'page_title'  => __('Branding'),
    'menu_title'  => __('Branding'),
    'menu_slug' => 'branding-options',
    'parent_slug' => 'site-options',
  );
  acf_add_options_sub_page( $args );

  $args = array(
    'page_title'  => __('Header'),
    'menu_title'  => __('Header'),
    'menu_slug' => 'header-layout',
    'parent_slug' => 'site-options',
  );
  acf_add_options_sub_page( $args );

  $args = array(
    'page_title'  => __('Footer'),
    'menu_title'  => __('Footer'),
    'menu_slug' => 'footer-layout',
    'parent_slug' => 'site-options',
  );
  acf_add_options_sub_page( $args );

  $args = array(
    'page_title'  => __('Components'),
    'menu_title'  => __('Components'),
    'menu_slug' => 'components-style',
    'parent_slug' => 'site-options',
  );
  acf_add_options_sub_page( $args );

  $args = array(
    'page_title'  => __('Social Media'),
    'menu_title'  => __('Social Media'),
    'parent_slug' => 'site-options',
  );
  acf_add_options_sub_page( $args );

  $sub = get_field('subscription_status', 'admin-settings');

	if($sub != 'one-page'){
    $args = array(
      'page_title'  => __('Content'),
      'menu_title'  => __('Content'),
      'menu_slug' => 'content-types',
      'parent_slug' => 'site-options',
    );
    acf_add_options_sub_page( $args );
  }

  $args = array(
    'page_title'  => __('Integrations'),
    'menu_title'  => __('Integrations'),
    'parent_slug' => 'site-options',
  );
  acf_add_options_sub_page( $args );

  $addons = get_field('modular_addons', 'admin-settings');
  //var_dump($postTypes);
  if(isset($addons)){
    if(in_array('events', $addons)){
      $args = array(
        'page_title'  => __('Events Options'),
        'menu_title'  => __('Events Options'),
        'menu_slug' => 'events-options',
        'parent_slug' => 'edit.php?post_type=event',
      );
      acf_add_options_sub_page( $args );
    }
  }

  if(get_field('maintenance_mode', 'options')){
    $args = array(
      'page_title' => 'Maintenance / Holding Mode',
      'menu_title' => 'Maintenance / Holding Mode',
      'menu_slug' => 'maintenance',
      'capability' => 'edit_posts',
      'position' => false,
      'parent_slug' => '',
    	'icon_url' => false,
      'redirect' => true,
      'post_id' => 'maintenance-mode',
      'autoload' => false,
    	'update_button'		=> __('Update', 'acf'),
      'updated_message'	=> __("Options Updated", 'acf'),
    );
    acf_add_options_page( $args );
  }
  if(is_scs()){
    $args = array(
      'page_title' => 'Admin Settings',
      'menu_title' => 'Admin Settings',
      'menu_slug' => 'admin-settings',
      'capability' => 'edit_posts',
      'position' => false,
      'parent_slug' => '',
    	'icon_url' => 'dashicons-lock',
      'redirect' => true,
      'post_id' => 'admin-settings',
      'autoload' => false,
    	'update_button'		=> __('Update', 'acf'),
      'updated_message'	=> __("Options Updated", 'acf'),
    );
    acf_add_options_page( $args );
  }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ACF Map Usage

function my_acf_google_map_api( $api ){
  $key = get_field('google_maps_api_key', 'options');
  $api['key'] = $key;
  $api['key'] = 'AIzaSyDwuAmO85Z0y59Ey2Gjn_ib39a-6mW4xhA';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Create and remove pages depending on 

add_action('acf/save_post', 'my_acf_save_post');
function my_acf_save_post( $post_id ) {

////////////////////////////////////////////////////////////////////////////////////////////////
// Modular Addons
    $modules = get_field('modular_addons', 'admin-settings');
    // Projects Archive
    if($modules){
      
   
    }
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();
    
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Add an archive state into the page, this will automatcially create archive pages.

function wpsites_custom_post_states($states) {
    $post = get_post();
    if(isset($post)){
      if( is_archive() ) {
        $states[] = __('Archive');
        //update_post_meta( $post->ID, '_wp_page_template', 'content-archive.php' );
      }
      if($post->post_name == 'terms-of-service' || $post->post_name == 'privacy-policy'){
        $states[] = __('Legal');
      }
      if( ('page'==get_post_type($post->ID) && ($post->post_name == 'search-results' ) )) {
        $states[] = __('Search Results');
      } 
    }
      
}
add_filter('display_post_states', 'wpsites_custom_post_states');

function remove_page_attribute_support() {
  global $post;
    if( ('page' == get_post_type($post->ID) && ($post->post_name == 'terms-of-service' || $post->post_name == 'privacy-policy' || $post->post_name == 'search-results' || $post->post_name == 'events' || $post->post_name == 'portfolio' || $post->post_name == 'services' || $post->post_name == 'departments' || $post->post_name == 'team' || $post->post_name == 'news' || $post->post_name == 'projects')) ) {
      remove_post_type_support('page','page-attributes');
      remove_post_type_support('page' ,'editor');
      remove_meta_box('pageparentdiv', 'page', 'side');
    }
}
add_action( 'admin_head-post.php', 'remove_page_attribute_support' );

function wpse_125800_sample_permalink( $return ) {
  global $post;
  if( ('page' == get_post_type($post->ID) && ($post->post_name == 'terms-of-service' || $post->post_name == 'privacy-policy' || $post->post_name == 'search-results' || $post->post_name == 'events' || $post->post_name == 'our-portfolio' || $post->post_name == 'services' || $post->post_name == 'departments' || $post->post_name == 'team' || $post->post_name == 'news' || $post->post_name == 'projects')) ) {
    $return = '';
    return $return;
  }
  
}
add_filter( 'get_sample_permalink_html', 'wpse_125800_sample_permalink' );


function my_disable_quick_edit( $actions = array(), $post = null ) {
  global $post;
  if( ('page' == get_post_type($post->ID) && ( $post->post_name == 'terms-of-service' || $post->post_name == 'privacy-policy' || $post->post_name == 'search-results'  || $post->post_name == 'our-portfolio' || $post->post_name == 'services' || $post->post_name == 'departments' || $post->post_name == 'team' || $post->post_name == 'news' || $post->post_name == 'projects')) ) {
    if ( isset( $actions['inline hide-if-no-js'] ) ) {
      unset( $actions['inline hide-if-no-js'] );
      unset( $actions['trash']);
      unset( $actions['dt_duplicate_post_as_draft'] );
  }
  
  }
  return $actions; 

}
add_filter( 'post_row_actions', 'my_disable_quick_edit', 10, 2 );
add_filter( 'page_row_actions', 'my_disable_quick_edit', 10, 2 );





function disable_gutenberg( $can_edit, $post ) {
  $disabled = array('services', 'departments', 'team', 'news', 'projects', 'events', 'search-results', 'terms-of-service', 'privacy-policy', 'portfolio');
  if (empty($post->ID)) return $can_edit;
	
	if ('page' == get_post_type($post->ID) && in_array($post->post_name, $disabled)) return false;
	
	return $can_edit;
}
add_filter( 'use_block_editor_for_post', 'disable_gutenberg', 10, 2 );


?>
