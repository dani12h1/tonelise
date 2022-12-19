<?php
/**
 * The template for displaying the footer.
 *
 * @package OceanWP WordPress theme
 */

?>

	</main><!-- #main -->

	<?php do_action( 'ocean_after_main' ); ?>

	<?php do_action( 'ocean_before_footer' ); ?>

	<?php
	// Elementor `footer` location.
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		?>

		<?php do_action( 'ocean_footer' ); ?>

	<?php } ?>

	<?php do_action( 'ocean_after_footer' ); ?>

</div><!-- #wrap -->

<?php do_action( 'ocean_after_wrap' ); ?>

</div><!-- #outer-wrap -->

<?php do_action( 'ocean_after_outer_wrap' ); ?>

<?php
// If is not sticky footer.
if ( ! class_exists( 'Ocean_Sticky_Footer' ) ) {
	get_template_part( 'partials/scroll-top' );
}
?>

<?php
// Search overlay style.
if ( 'overlay' === oceanwp_menu_search_style() ) {
	get_template_part( 'partials/header/search-overlay' );
}
?>

<?php
// If sidebar mobile menu style.
if ( 'sidebar' === oceanwp_mobile_menu_style() ) {

	// Mobile panel close button.
	if ( get_theme_mod( 'ocean_mobile_menu_close_btn', true ) ) {
		get_template_part( 'partials/mobile/mobile-sidr-close' );
	}
	?>

	<?php
	// Mobile Menu (if defined).
	get_template_part( 'partials/mobile/mobile-nav' );
	?>

	<?php
	// Mobile search form.
	if ( get_theme_mod( 'ocean_mobile_menu_search', true ) ) {
		ob_start();
		get_template_part( 'partials/mobile/mobile-search' );
		echo ob_get_clean();
	}
}
?>

<?php
// If full screen mobile menu style.
if ( 'fullscreen' === oceanwp_mobile_menu_style() ) {
	get_template_part( 'partials/mobile/mobile-fullscreen' );
}
?>

<?php wp_footer(); ?>
<footer id="footer-main">
  <div class="footer-grid">
   
        <section class="footer-1">
          <h4>INFORMATION</h4>
            <p>Shipping and returns</p>
            <p>Terms and conditions</p>
            <p>FAQ</p>
        </section>

       <section class="footer-2">
          <h4>SOCIALS</h4>
            <p>Facebook</p>
            <p>Instagram</p>
        </section>

       <section class="footer-3">
         <h4>CONTACT</h4>
           <p>tonelise@tone.dk</p>
           <p>+ 45 00 00 00 00</p>
       </section>

	     <section class="footer-4">
         <h4>JOIN THE COMMUNITY</h4>
		 <textarea id="subject" placeholder=Email ></textarea>

    <input type="submit" value="SIGN UP">
       </section>
</div>


<section class="footer_copyright">
	<div class="footer_copyright_grid">
		<p>CVR: 43707655</p>
		<p class="copyright">Copyright 2022 © All rights Reserved. Design by Tone-lise</p>
	</div>
</section>
</footer>
</body>
</html>
