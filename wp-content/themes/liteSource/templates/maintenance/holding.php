<!-- Layout for Claba Holding Page -->

<?php
$style = get_field('style', 'maintenance-mode');
$content = get_field('content', 'maintenance-mode');
$font = $style["font_option"];

$preloader = get_field('enable_preloader', 'maintenance-mode');
$loader_colour = get_field('loader_colour', 'maintenance-mode');
$loader_icon = get_field('loader_icon');
if($preloader == true){ ?>
  <div class="preloader load-fade" style="background-color: <?php echo $loader_colour; ?>;">
    <div class="icon">
      <div class="icon-two">
      </div>
    </div>
  </div>
<?php
}?>


<?php if($content["title_tag"]){ ?>
  <title><?php echo $content["title_tag"]; ?></title>
<?php } ?>

<section class="holding-template <?php echo $font; ?>">

  <?php if($style["layout"]["layout"] == 'half-image'){ ?>
    <div class="<?php echo $style["layout"]["layout"]; ?>">
      <div class="content" style="background-color:<?php echo $style['background_colour']; ?>; color:<?php echo $style['text_colour']; ?>  ">

        <?php if($content["page_logo"]){ ?>
          <img class="site-logo" src="<?php echo $content['page_logo']; ?>"/>
        <?php } ?>

        <?php if($content["page_title"]){ ?>
          <h1><?php echo $content["page_title"]; ?></h1>
        <?php } ?>

        <?php if($content["page_content"]){ ?>
          <?php echo $content["page_content"]; ?>
        <?php } ?>

        <?php if($content["include_contact_form"]){
          echo do_shortcode('[contact-form-7 id="46" title="Contact form 1"]');
        } ?>
      </div>
      <div class="image" style="background-image: url('<?php echo $content['background_image']; ?>')">

      </div>
    </div>

  <?php
  }
  else if($style["layout"]["layout"] == 'full-image'){ ?>
    <div class="<?php echo $style["layout"]["layout"]; ?>">
      <div class="content" style="background-image: url('<?php echo $content['background_image']; ?>'); color:<?php echo $style['text_colour']; ?>  ">

        <?php if($content["page_logo"]){ ?>
          <img class="site-logo" src="<?php echo $content['page_logo']; ?>"/>
        <?php } ?>

        <?php if($content["page_title"]){ ?>
          <h1><?php echo $content["page_title"]; ?></h1>
        <?php } ?>

        <?php if($content["page_content"]){ ?>
          <?php echo $content["page_content"]; ?>
        <?php } ?>

        <?php if($content["include_contact_form"]){
          echo do_shortcode('[contact-form-7 id="46" title="Contact form 1"]');
        } ?>
        <div class="background-color" style="background-color:<?php echo $style['background_colour']; ?>;"> </div>
      </div>
    </div>

  <?php
  }
  else if($style["layout"]["layout"] == 'block-color'){ ?>
    <div class="<?php echo $style["layout"]["layout"]; ?>">
      <div class="content" style="background-color:<?php echo $style['background_colour']; ?>; color:<?php echo $style['text_colour']; ?>  ">

        <?php if($content["page_logo"]){ ?>
          <img class="site-logo" src="<?php echo $content['page_logo']; ?>"/>
        <?php } ?>

        <?php if($content["page_title"]){ ?>
          <h1><?php echo $content["page_title"]; ?></h1>
        <?php } ?>

        <?php if($content["page_content"]){ ?>
          <?php echo $content["page_content"]; ?>
        <?php } ?>

        <?php if($content["include_contact_form"]){
          echo do_shortcode('[contact-form-7 id="46" title="Contact form 1"]');
        } ?>
      </div>
    </div>

  <?php
  }?>



</section>
