<?php
/**
 * The template for displaying the footer.
 *
 * @package boiler
 */
?>

	<footer id="global_footer" class="site_footer">
		<!--<img class="footer_border" src="<?php echo bloginfo('template_url'); ?>/images/footer_border.png" alt="" />-->
		<div class="footer_border">
			<div class="footer_border_1"></div>
			<div class="footer_border_2"></div>
			<div class="footer_border_3"></div>
			<div class="footer_border_4"></div>
		</div>
		<div class="container">
			<nav class="footer_nav">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer_menu' ) ); ?>
			</nav>
			<div class="footer_col">
				<a href="<?php the_field('contact_link', 'options'); ?>"><h3>Contact Us</h3></a>
					<ul>
						<li><?php the_field('contact_phone', 'options'); ?></li>
						<li><?php the_field('contact_email', 'options'); ?></li>
					</ul>
					<div class="slide_button"><a href="<?php the_field('thermostat_registration_link', 'options'); ?>"><span>Thermostat</span><span>Registration</span></a></div>
					<div class="privacy_links">
						<a href="<?php the_field('privacy_policy_link', 'options'); ?>">Privacy Policy</a>
						<a href="<?php the_field('terms_of_use_link', 'options'); ?>">Terms of Use</a>
					</div>
			</div>
			<div class="footer_col footer_logos">
				<h3><?php the_field('brand_family_text', 'options'); ?></h3>
				<h3 class="mobile_footer_brand"><?php the_field('brand_family_mobile_text', 'options'); ?></h3>
				<?php if(have_rows('brand_logos', 'options')) : ?>
					<ul>
					<?php while(have_rows('brand_logos', 'options')) : the_row(); ?>
						<?php $brand_image = get_sub_field('brand_logo', 'options'); ?>
						<li><a href="<?php the_sub_field('brand_link', 'options'); ?>"><img src="<?php echo $brand_image['url']; ?>" alt="<?php echo $brand_image['alt']; ?>" /></a></li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<div class="mobile_footer_links">
					<a href="<?php the_field('privacy_policy_link', 'options'); ?>"><h3>Privacy Policy<h3></a>&nbsp;
					<a href="<?php the_field('terms_of_use_link', 'options'); ?>"><h3>Terms of Use</h3></a>
				</div>
			</div>
			<!-- <p class="copy">&copy; <?php echo date('Y'); ?> <?php bloginfo('site_title'); ?></p> -->
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>