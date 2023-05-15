<?php 

function get_theme_colours($theme){
    $colours = get_field('site_colours', 'options');
    if($theme == 'primary'){
        $cols['bg'] = $colours['primary'];          
    }
    else if($theme == 'secondary'){
        $cols['bg'] = $colours['secondary'];        
    }
    else if($theme == 'accent'){
        $cols['bg'] = $colours['accent'];       
    }
    else if(is_null($theme) OR $theme == 'none'){
        $bodyCol = $colours['body_colour'];
        if($bodyCol == 'white'){
            $cols['bg'] = '#fff';
        }
        else{
            $cols['bg'] = $colours['background_colour'];
        }    
    }
    $cols['textCol'] = getContrastColor($cols['bg']);
    return $cols;
}