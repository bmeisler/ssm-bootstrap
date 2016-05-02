<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sensitive_Skin_Bootstrap
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">

			<!-- Links to previously featured posts -->
			<div class="row five-column-container">
				<div class="col-md-12 col-lg-12">
					<?php include('inc/recentPostsFiveCol.php');?>
				</div>
			</div><!-- .row -->
			


	<div class="row" id="footer-info">
        <div class="col-sm-4 footer-border first-col"><!-- 1st column -->
          <h3 class="mb40">Sensitive<br/>
          Skin<br/>
          Magazine</h3><br/>
              <div class="small">
                <p class="top"><i>Editor-In-Chief:</i> Bernard Meisler</p>
        				<p><i>Associate Editors:</i> Rob Hardin and B. Kold</p>
        				<p><i>Music Editor:</i> Steve Horowitz</p>
        				<p><i>Contributing Editors:</i>Ron Kolm, <br/>Franklin Mount, Patrick O'Neil</p>
              </div>

        

        </div><!-- end 1st column -->


        <div class="col-sm-4 footer-border"><!-- 2nd column -->
          <h3 class="mb40">Contact</h3>
          <div class="mb40">For general inquiry:
          <br/>
          <script type="text/javascript">maillink('info','sensitiveskinmagazine.com')</script>
          </div>
          <br/>
          <!-- social buttons -->
          <div id="awesome-social-buttons">
            <span class="mb40">Follow us:</span><br/>
				      <a class="btn btn-social-icon btn-md" href="http://www.twitter.com/sensitivemag">
					     <span class="fa fa-twitter"></span>
					   </a>
					   <a class="btn btn-social-icon btn-md" href="http://www.facebook.com/sensitiveskin">
				        <span class="fa fa-facebook"></span>
				      </a>
				    <a class="btn btn-social-icon btn-md btn-google-plus" href="//plus.google.com/100022193362098500932?prsrc=3">
    				    <span class="fa fa-google-plus"></span>
    				</a>
        
			</div>
      <br/>
			<!-- Mini-menu and copyright -->
        <div class="menu-desktop ">
          <nav class="menu">
            <a href="index.php">Home</a>
            <span> | </span>
            <a href="<?php bloginfo('wpurl'); ?>/our-history">About</a>
          	<span> | </span>
          	<a href="<?php bloginfo('wpurl'); ?>/contact">Contact</a>
            <span> | </span>
            <a href="<?php bloginfo('wpurl'); ?>/submissions">Submissions</a>
            <br/>
            <a href="<?php bloginfo('wpurl'); ?>/back-issues">Issues</a>
            <span> | </span>
            <a href="<?php bloginfo('wpurl'); ?>/sensitive-skin-books">Books</a>
            <span> | </span>
            <a href="<?php bloginfo('wpurl'); ?>/checkout/purchase-history">Purchase History</a>
          </nav>
          <br/>
          <br/>
          <span class="small">Copyright &#169;&nbsp;<script>document.write(new Date().getFullYear())</script><noscript>2015</noscript> Sensitive Skin Magazine. <br/>All Rights Reserved.</span>
        </div>

        </div>

        <div class="col-sm-4 footer-border"><!-- 3rd column -->

        <!-- Subscribe -->
        <h3>Join our mailing list</h3>
        <p class="small">We'll send you info about our latest issues, books and upcoming events, as well as discount coupons.</p>
      <br/>
       <!-- Begin MailChimp Signup Form -->
        <div id="bottom-signup">

            <?php include('inc/mailchimp-signup-form.php');?>

        </div>
		</div><!-- end 3rd column -->
      </div><!-- row -->



		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

</div> <!-- end #container -->

<?php wp_footer(); ?>
   <script src="<?php bloginfo('wpurl'); ?>/wp-content/js/googleanalytics.js" type="text/javascript"></script>

       <script type="text/javascript">
        <!--
        function popitup(url, params) {
            newwindow=window.open(url,'name', params);
            if (window.focus) {newwindow.focus()}
            return false;
        }

        // -->
    </script>


    <?php if( $_SERVER['SERVER_ADDR'] != '127.0.0.1'){ ?>
            <?php   echo '<script src="//static.getclicky.com/js" type="text/javascript"></script>';?>
            <?php   echo '<script type="text/javascript">try{ clicky.init(66421456); }catch(e){}</script>';?>
            <?php   echo '<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/66421456ns.gif" /></p></noscript>'; }?>
</body>
</html>
