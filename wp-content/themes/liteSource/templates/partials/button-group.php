<?php 

$buttons = $args['buttons']; 
$colours = get_field('site_colours', 'options');?>

<div class="button-group">
    <?php 
    foreach($buttons as $but){ 
        $btn = $but['button']['button_url_label']; 
        $style = $but['button']['button_style'];
       
        if($style == 'primary'){
            $bg = $colours['primary'];
            $tc = getContrastColor($bg);
            $bc = '';
        }
        else if($style == 'secondary'){
            $bg = $colours['secondary'];
            $tc = getContrastColor($bg);
            $bc = '';
        } 
        else if($style == 'ghost'){
            $bg = '';
            $tc = '';
            $bc = $colours['accent'];
        }?>
        <p style="background-color:<?= $bg; ?>; border-color:<?= $bc; ?>" class="btn <?= $style; ?>"><a style="color:<?= $tc; ?>" target="<?= $btn['target'];?>" href="<?= $btn['url']; ?>"><?= $btn['title']; ?></a></p>
    <?php
    } ?>
</div>