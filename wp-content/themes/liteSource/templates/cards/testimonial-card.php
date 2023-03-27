<?php 
$img = get_field('company_person_image', get_the_ID());   
$type = $args['type'];  
$theme = $args['theme'];   

$colours = get_field('site_colours', 'options');
$bg = '';
$txtCol = '';
if($theme['themes'] == 'primary'){
    $bg = $colours['primary'];
    $txtCol = getContrastColor($bg);
}
if($theme['themes'] == 'secondary'){
    $bg = $colours['secondary'];
    $txtCol = getContrastColor($bg);
}
if($theme['themes'] == 'third'){
    $bg = $colours['accent'];
    $txtCol = getContrastColor($bg);
}
?>

<div class="testimonial-card <?= $type; ?>" style="background-color:<?= $bg; ?>; color:<?= $txtCol; ?>">
    <div class="inner">
        <?php if($img){ ?>
            <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>"/>
        <?php
        } ?>
        <p class="name"><?= get_field('company_person_name', get_the_ID()); ?></p>
        <p class="quote">"<?= get_field('quote', get_the_ID()); ?>"</p>
        
    </div>
</div>