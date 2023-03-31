<?php

function my_body_classes( $classes ) {
    $selectedFont = get_field('system_fonts', 'options');
    $classes[] = sanitize_title($selectedFont) . '-font-family';
    $borderStyle = get_field('universal_border_radius', 'options');
    $classes[] = $borderStyle . '-border-radius';
    return $classes;
  }
if( function_exists('acf_add_options_page') ) {
  add_filter( 'body_class','my_body_classes' );
}


// Calculate Contrast Ratio

function getContrastColor($hexcolor) {               
    $r = hexdec(substr($hexcolor, 1, 2));
    $g = hexdec(substr($hexcolor, 3, 2));
    $b = hexdec(substr($hexcolor, 5, 2));
    $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
    return ($yiq >= 128) ? 'black' : 'white';
}

function get_system_fonts(){
  $fonts = get_field('system_fonts', 'options');
		
		if(sanitize_title($fonts) == 'gloock-roboto'){ ?>
			<link href="https://fonts.googleapis.com/css2?family=Gloock&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
      <?php
      $bfont = "'Roboto', sans-serif!important;";
      $hfont = "'Gloock', serif!important;";
		}
    else if(sanitize_title($fonts) == 'montserrat-source-sans-pro'){ ?>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
      <?php
      $bfont = "'Source Sans Pro', sans-serif!important;";
      $hfont = "'Montserrat', sans-serif;!important;";
    }
    else if(sanitize_title($fonts) == 'josefin-sans-lato'){ ?>
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
      <?php
      $bfont = "'Lato', sans-serif!important;";
      $hfont = "'Josefin Sans', sans-serif;!important;";
    }
    else if(sanitize_title($fonts) == 'poppins-bold-poppins-regular'){ ?>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
       <?php
       $bfont = "'Poppins', sans-serif!important;";
       $hfont = "'Poppins', sans-serif;!important;";
     }
     else if(sanitize_title($fonts) == 'oswald-open-sans'){ ?>
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@700&display=swap" rel="stylesheet">
       <?php
       $bfont = "'Open Sans', sans-serif!important;";
       $hfont = "'Oswald', sans-serif;!important;";
     }
    ?>
    <style>
				body{
					font-family: <?= $bfont; ?>
				}
				h1, h2, h3, h4, h5, h6{
					font-family: <?= $hfont; ?>
				}
			</style>
<?php
} ?>