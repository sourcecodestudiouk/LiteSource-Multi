<footer class="lower-footer">
  <div class="container">
    <div class="copyright-link">
      <?php if(isset($vat) OR isset($company)){ ?>  
        <p><?php if($company){ echo '<span>Registered Number: ' . $vat . '</span>'; }; if($vat){ echo '<span>VAT Number: ' . $vat . '</span>'; };?></p>
      <?php } ?>
      <p>&copy;<?= date('Y'); ?> <?= get_bloginfo();?>.  All Rights Reserved. <a target="_blank" href="https://www.sourcecodestudio.co.uk">LiteSource by SourceCodeStudio</a>.</p>
    </div>
    <div class="legal-menu">
      <a href="<?= get_site_url(); ?>/privacy-policy">Privacy Policy</a>
      <a href="<?= get_site_url(); ?>/terms-of-service">Terms of Service</a>
    </div>
  </div>
</footer> 