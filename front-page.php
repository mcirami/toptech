<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package boiler
 */
 //Template Name: Front Page

get_header(); ?>

<?php if( (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') === false) || (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') === false) ) { ?>
	<section class="home_slider">
		<article>
			<div id="homepage_slider" class="flexslider">
				<ul class="slides">
				    <?php if(have_rows('slider')) : ?>
					<?php while(have_rows('slider')) : the_row(); ?>
						<li class="slide">
							<div class="copy_wrap">
								<div class="slide_copy">
									<h3><?php the_sub_field('slide_header'); ?></h3>
									<?php the_sub_field('slide_copy'); ?>
									<a class="slide_button" href="<?php the_sub_field('slide_button_link'); ?>"><?php the_sub_field('slide_button_text'); ?></a>
								</div>
							</div>
							<?php $image = get_sub_field('slide_image') ?>
							<div class="image_wrap" style="background-image: url('<?php echo $image['url']; ?>');"></div>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
				</ul>
			</div>
		</article>
	</section>
<?php } ?>
<section class="mobile_main_products">
	<article>
		<div class="container">
			<?php if(have_rows('mobile_product_categories')) : ?>			
				<ul>
				<?php while(have_rows('mobile_product_categories')) : the_row(); ?>
					<li class="main_product">
						<?php $product_image = get_sub_field('category_image'); ?>
						<img src="<?php echo $product_image['url']; ?>" alt="<?php echo $product_image['alt']; ?>">
						<a href="<?php the_sub_field('category_page'); ?>" class="green_label"><h3><?php the_sub_field('category_name'); ?></h3></a>
					</li>
				<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</article>
</section>
<section class="featured_products home_row">
	<article>
		<div class="container">
			<h2>Featured Products</h2>
				<?php if(have_rows('featured_products')) : ?>
				<?php while(have_rows('featured_products')) : the_row(); ?>
					<?php

						$post_object = get_sub_field('featured_product');
				 
						if( $post_object ): 
				 
						// override $post
						$post = $post_object;
						setup_postdata( $post ); 
				 
					?>
				    <div class="featured_product row_column">
						<?php $about_images = get_field('product_images'); ?>
						<?php $video = get_field('featured_video'); ?>
						<?php if(get_field('featured_video')) : ?>
						<a class="featured_wrap fancybox" href="#video">
							<img class="play_btn" src="<?php echo bloginfo('template_url'); ?>/images/play_btn.png" />
							<img src="<?php echo $about_images[0]['product_image']['url']; ?>" alt="<?php echo $about_images[0]['product_image']['alt']; ?>" />
						</a>
						<div id="video">
							<?php echo apply_filters('the_content', $video); ?>
							<?php if(get_field('video_file')) : ?>
							<?php $fileID = get_field('video_file'); ?>
							<?php 
								  $url = wp_get_attachment_url( $fileID );
								  $filesize = filesize(get_attached_file( $fileID ));
								  $filesize = size_format($filesize, 2);
							?>
								<a href="<?php echo $url; ?>">Download Video (<?php echo $filesize; ?>)</a>
							<?php endif; ?>
						</div>
						<?php else : ?>
						<a class="featured_wrap" href="<?php the_permalink(); ?>"><img src="<?php echo $about_images[0]['product_image']['url']; ?>" alt="<?php echo $about_images[0]['product_image']['alt']; ?>"></a>
						<?php endif; ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_field('short_description'); ?></p>
					</div>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				    <?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</article>
</section>
<section class="mission_statement" style="background-image: url('<?php $ms_bg_image = get_field('mission_statement_background_image'); echo $ms_bg_image['url']; ?>');">
	<article>
		<div class="container">
			<div class="mission_copy"><?php the_field('mission_statement_copy'); ?></div>
		</div>
	</article>
</section>
<?php if( (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') === false) || (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') === false) ) { ?>
	<section class="about_section home_row">
		<article>
			<div class="container">
				<h2>About TopTech</h2>
				<?php if(have_rows('about_top_tech')) : ?>
					<?php while(have_rows('about_top_tech')) : the_row(); ?>
						<div class="about row_column">
							<?php $about_image = get_sub_field('about_image'); ?>
							<img src="<?php echo $about_image['url']; ?>" alt="<?php echo $about_image['alt']; ?>">
							<h3><?php the_sub_field('about_header'); ?></h3>
							<p><?php the_sub_field('about_copy'); ?></p>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</article>
	</section>
<?php } ?>
<section class="mobile_registration">
	<article>
		<div class="container">
			<?php $registration_image = get_field('mobile_registration_image'); ?>
			<img src="<?php echo $registration_image['url']; ?>" alt="<?php echo $registration_image['alt']; ?>">
			<?php the_field('mobile_registration_copy'); ?>
			<div class="slide_button"><a href="#"><?php the_field('mobile_registration_button_text'); ?></a></div>
		</div>
	</article>
</section>

<?php get_footer(); ?>