<?php

//Template Name: Driers

get_header(); ?>

	<section class="hero_section">
		<?php $heroImage = get_field('hero_image'); ?>
		<div id="image_wrap">
			<img src="<?php echo $heroImage['url']; ?>" alt="<?php echo $heroImage['alt']; ?>" />
		</div>
	</section>
	
	<?php $manualLink = strtok($_SERVER['REQUEST_URI'], '/'); ?>

	<section class="category_filter">
		<div class="container">
			<ul id="filter_products">
				<?php $tax = isset( $wp_query->query_vars['tax']) ? $wp_query->query_vars['tax'] : null; ?>
				<li class="filter"><a href="#" data-type="all" <?php if(!$tax) { echo 'class="active"'; } ?>>All</a></li>
				<?php $productTypes = get_terms( 'drier-type', array( 'child_of' => 0, 'hide_empty' => 0, )); ?>
				<?php foreach($productTypes as $productType) : ?>
					<li class="filter"><a href="#" data-type="<?php echo $productType->slug; ?>" <?php if($tax === $productType->slug) { echo 'class="active"'; } ?>><?php echo $productType->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	
	<script type="text/javascript">var filter = "<?= $tax ?>";</script>

	<section class="product_category">
		<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<h1><?php the_title(); ?></h1>
		
		<div class="filter_by">
			<p class="filter_by">Filter: </p>
		</div>
		<div class="mobile_filter">
			<div class="select">
				<select>
					<option data-type="all">All</option>
					<?php $productTypesMob = get_terms( 'drier-type', array( 'child_of' => 0, 'hide_empty' => 0, )); ?>
					<?php foreach($productTypesMob as $productTypeMob) : ?>
						<option data-type="<?php echo $productTypeMob->slug; ?>" <?php if($tax === $productTypeMob->slug) { echo 'class="active"'; } ?>><?php echo $productTypeMob->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		
		<?php endwhile; else: ?>
		
		<?php endif; ?>
			<div class="products_wrap">
				<div class="grid">
					<ul class="product_grid">
					<?php
						$i = 0;
					
						$args = array (
							'post_type' => 'driers',
							'posts_per_page' => -1,
							'order' => 'ASC'
						);
					
						$indoorAir = new WP_Query($args);
					
						while( $indoorAir->have_posts() ) : $indoorAir->the_post();
					?>
					
					<?php $productCategories = get_the_terms($post->ID, 'drier-type'); ?>
					<?php 
					
						$rows = get_field('product_images'); // get all the rows
						$first_row = $rows[0]; // get the first row
						$first_row_image = $first_row['product_image'];
						$image = $first_row_image['url'];
						$j = 0;
					
					 ?>
						<a class="product" href="<?php the_permalink(); ?>" data-id="<?php echo $i; ?>" data-type="<?php foreach ($productCategories as $productCategory){ echo $productCategory->slug . ' '; } ?>">
							<li>
								<div>
									<h2><?php the_title(); ?></h2>
									<?php if(get_field('product_images')) : ?>
										<img src="<?php echo $image; ?>" />
									<?php endif; ?>
									<p>
									<?php 
										foreach ($productCategories as $productCategory){ 
											$j++; if(($j >= 2)){
												echo '/' . $productCategory->name; 
											} else { 
												echo $productCategory->name; 
											}
										} ?>
									</p>
								</div>
							</li>
						</a>
					<?php $i++; endwhile; wp_reset_query(); ?>
					</ul>
				</div>
			</div>
			<?php include(locate_template('content-product-cat-sidebar.php')); ?>
		</div>
	</section>

<?php get_footer(); ?>
