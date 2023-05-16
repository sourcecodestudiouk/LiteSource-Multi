<?php

// Add all front-end styles to the back-end editor
add_action( 'after_setup_theme', 'gutenberg_css' );

function gutenberg_css(){
	add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
  	add_editor_style( '/assets/bootstrap/bootstrap.css' ); // tries to include style-editor.css directly from your theme folder
	add_editor_style( '/assets/style/style.css' ); // tries to include style-editor.css directly from your theme folder
}


// Hide Gutenberg Editor on certain pages.
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  // Get the Post ID.
  if(isset($_GET['post'])){
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  }
  
  if( !isset( $post_id ) ) return;

  // Hide the editor on the page titled 'Homepage'
  $pagename = get_the_title($post_id);
  if($pagename == 'News'){
    remove_post_type_support('page', 'editor');
  }

  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);

  if($template_file == 'my-page-template.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}

function my_custom_js() {
	$colours = get_field('site_colours', 'options'); 
	$bodyCol = $colours['body_colour'];
	if($bodyCol == 'white'){
		$bg = '#ffffff';
	}
	else{
		$bg = $colours['background_colour'];
	}
	$textCol = getContrastColor($bg);
    echo '<style type="text/css">
	.editor-styles-wrapper{
		background:'.$bg.'!important;
		color:'.$textCol.'!important;
	}
	.acf-block-preview a {
		pointer-events: none!important;
	}
	</style>';
}
// Add hook for admin <head></head>
add_action( 'admin_head', 'my_custom_js' );



// Remove Comments From Menu Section
//add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
  remove_menu_page( 'edit-comments.php' );
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Gutenberg Block - ONLY USE THE ONES YOU WANT.

add_filter( 'allowed_block_types_all', 'allowed_block_types', 25, 2 );

function allowed_block_types( $allowed_blocks, $editor_context ) {

	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/list-item',
		'core/block',
		'core/spacer',
		'core/row',
		'core/group',
		'core/columns',
		'core/gallery',
		'core/table',
		'core/pullquote',
		'core/preformatted',
		'core/heading',
		'core/paragraph',
		

		// Core Bespoke Blocks
		'acf/hero-header',
		'acf/page-header',
		'acf/call-to-action',
		'acf/content-slider',
		'acf/icon-blocks',
		'acf/number-counter',
		'acf/accordion',
		'acf/contact-details',
		'acf/image-gallery',
		'acf/separator',
		'acf/full-width-image',
		'acf/full-width-gallery',
		'acf/contact-form',
		'acf/portfolio-overview',
		'acf/single-image',
		'acf/logos',


		// Team Content
		'acf/team-profiles',
		'acf/testimonials',

		// News Blocks
		'acf/latest-news',


		// Events Module Blocks
		'acf/events-card-slider',
		'acf/events-calendar',
		'acf/events-information',


	);
}

?>
