<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dhl_custom_theme
 */

?>

<footer id="colophon"
	class="site-footer uk-padding-small uk-position-sticky uk-position-bottom uk-width-1-1 footer-bg uk-animation-slide-bottom">
	<div
		class="uk-container-small uk-flex uk-flex-between uk-flex-middle uk-padding-large uk-padding-remove-top uk-padding-remove-bottom uk-margin-auto">
		<a href="#"
			class="uk-position-relative uk-padding-small uk-flex uk-width-1-1 uk-flex-column@m uk-flex-center uk-flex-between uk-padding-remove-top">
			<h5
				class="uk-text-primary uk-block uk-padding-small uk-position-relative uk-text-bold uk-padding-remove-top uk-padding-remove-bottom uk-margin-remove-bottom">
				Explore the Report
			</h5>
			<p class="uk-text-lead uk-padding-small uk-padding-remove-top uk-padding-remove-bottom uk-margin-remove">
				Global Index</p>
			<div class="uk-transform-origin-top-center footer-custom uk-visible@m">
				<img src="<?php bloginfo('template_url'); ?>/assets/img/img_footer_bg.webp" alt="Footer Logo"
					class="uk-responsive-width">
			</div>
		</a>

	</div>
</footer><!-- #colophon -->
</div><!--container!-->
</div><!--grid!-->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>