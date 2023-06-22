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
            $cols['bg'] = '';
        }
        else{
            $cols['bg'] = ''; 
        }    
    }
    $cols['textCol'] = getContrastColor($cols['bg']);
    return $cols;
}

function get_header_colours($theme, $type){
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
    if(is_null($theme) OR $theme == 'none' OR $type == 'text'){
        $bodyCol = $colours['body_colour'];
        if($bodyCol == 'white'){
            $cols['bg'] = '#ffffff';
        }
        else{
            $cols['bg'] = $colours['background_colour'];
        }    
    }
    $cols['textCol'] = getContrastColor($cols['bg']);
    return $cols;
}

function get_button_colours($theme){
    $colours = get_field('site_colours', 'options');
    if($theme == 'primary'){
        $cols['bg'] = $colours['secondary'];          
    }
    else if($theme == 'secondary'){
        $cols['bg'] = $colours['primary'];      
    }
    else if($theme == 'accent'){
        $cols['bg'] = $colours['secondary'];       
    }
    $cols['textCol'] = getContrastColor($cols['bg']);
    return $cols;
}

function get_accent_colours(){
    $colours = get_field('site_colours', 'options');
    $cols['bg'] = $colours['accent']; 
    $cols['textCol'] = getContrastColor($cols['bg']);
    return $cols;
}