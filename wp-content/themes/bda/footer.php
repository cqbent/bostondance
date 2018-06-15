<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bda
 */

?>

</div><!--site content End-->
        <footer id="colophon" class="site-footer desktop-footer" role="contentinfo"><!--footer start-->
            <div class="container">
                <div class="section-wrapper footer">
                    <div class="row">
                        <div class="col-sm-2 footer-widget">
                            <img src="<?php echo get_theme_mod( 'footer_logo' ) ?>" width="130" height="125" alt="footer-logo" class="img-responsive"/>
                        </div>
                        <?php
                            if ( is_active_sidebar( 'footer-1' ) ){
                                dynamic_sidebar( 'footer-1' );
                            }
                            if ( is_active_sidebar( 'footer-2' ) ) {
                                dynamic_sidebar( 'footer-2' );
                            }
                        ?>                       
                        <div class="col-sm-12">
                            <div class="copyright">
                                &copy; Copyright <?php echo date('Y');?> BostonDanceAlliance
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer><!--footer end-->

        <footer id="colophon" class="site-footer mobile-footer" role="contentinfo"><!--footer start-->
            <div class="container">
                <div class="section-wrapper footer">
                    <div class="row">

                        <?php  
                        if ( is_active_sidebar( 'footer-mobile' ) ) {
                            dynamic_sidebar( 'footer-mobile' ); 
                        }
                        ?>

                        <div class="footer-widget">
                            <img src="<?php echo get_theme_mod( 'footer_logo' ) ?>" width="130" height="125" alt="footer-logo" class="img-responsive"/>
                        </div>
                        <div class="">
                            <div class="copyright">
                                &copy; Copyright <?php echo date('Y');?> BostonDanceAlliance
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer><!--footer end-->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
