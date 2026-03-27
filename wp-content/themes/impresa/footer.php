<div class="footer-container">
  <div id="footer">
    <div class="leftFooter">
      <ul class="ab">
        <li class="first"><a href="http://www.magepsycho.com/about-us">About Us</a></li>
      </ul>
      <ul class="ab">
        <li class="first"><a href="http://www.magepsycho.com/our-service">Our Services</a></li>
      </ul>
      <ul class="links">
        <li class="first"><a title="Site Map" href="http://www.magepsycho.com/catalog/seo_sitemap/category/">Site Map</a></li>
        <li><a title="Search Terms" href="http://www.magepsycho.com/catalogsearch/term/popular/">Search Terms</a></li>
        <li><a title="Advanced Search" href="http://www.magepsycho.com/catalogsearch/advanced/">Advanced Search</a></li>
        <li><a title="Contact Us" href="http://www.magepsycho.com/contacts/">Contact Us</a></li>
        <li class=" last"><a class="link-rss" title="RSS" href="http://www.magepsycho.com/rss/">RSS</a></li>
      </ul>
      <div class="newsl">
        <?php echo wordgento('newsletter'); ?>
      </div>
    </div>
    <div class="rightFooter">
      <div class="payment"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/paymenticons.png" /></div>
    </div>
    <address>
    &copy; 2011 MagePsycho Store. All Rights Reserved.
    </address>
  </div>
</div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<?php $google = stripslashes(get_option('templatesquare_google'));?>
<?php if($google==""){?>
<?php }else{?>
<?php echo $google; ?>
<?php } ?>
</body></html>