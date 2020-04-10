<?php
/**
 * @package boiler
 */
 
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="product_list techpure">
	<div class="container">
	<?php $tax = get_post_type(); ?>

		<ul id="categories">
			<?php if( $tax != 'techpure_flex' ) : ?>
				<?php $page_name = dirname(get_permalink()); ?>
					<li><a href="<?php echo $page_name; ?>">all</a></li>
				<?php 
					$taxonomy_objects = get_object_taxonomies($tax);
		
					if($taxonomy_objects) :
						/*$product_cats = get_the_terms($post->ID, $taxonomy_objects[0]);
						$product_cat = '';
						if($product_cats) {
							$product_cat = $product_cats[0];
						}
						print_r($product_cat);*/
					
						$categories = get_terms($taxonomy_objects[0], array('hide_empty' => 0)); 
						foreach($categories as $category) :
				?>
						<li><a class="product_sub_menu" href="<?php echo $page_name.'?tax='.$category->slug; ?>"><?php echo $category->name; ?></a></li>
						<?php endforeach; ?>
					<?php endif; ?>
			<?php else: ?>
				<section class="hero_section">
					<?php $heroImage = get_field('hero_image'); ?>
					<div id="image_wrap">
						<img src="<?php echo $heroImage['url']; ?>" alt="<?php echo $heroImage['alt']; ?>" />
					</div>
				</section>
			<?php endif; ?>
		</ul>

	</div>
</section>

<section class="product_single">
	<div class="container">
		<div class="product_wrap">
			<h1><?php the_title(); ?></h1>
			<div class="product_right">
				<div class="flexslider">
					<ul class="slides">
						<?php if(get_field('featured_video')) : ?>
							<?php $videoURL = get_field('featured_video'); ?>
							<?php $videoURL = apply_filters('the_content', $videoURL); ?>
								<li><?php echo $videoURL; ?></li>
						<?php endif; ?>
						<?php while(has_sub_field('product_images')) : ?>
						<?php $image = get_sub_field('product_image'); ?>
							<li>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
			<div class="product_left">
				<?php if(get_field('sub_title')) : ?>
					<h4><?php the_field('sub_title'); ?></h4>
				<?php endif; ?>
				<?php if(get_field('product_description')) : ?>
					<p><?php the_field('product_description'); ?></p>
				<?php endif; ?>
			</div>
		<?php if(get_field('table_id')) : ?>
		<div class="product_chart">
			<div class="scroll">
				<?php $tableID = get_field('table_id'); ?>
				<?php tablepress_print_table( array( 'id' => $tableID, 'use_datatables' => true, 'print_name' => false ) ); ?>
			</div>
		<?php endif; ?>
		<?php if(get_field('table_id')) : ?>
			<div class="mobile_table">
				<i class="fa fa-arrow-left"></i> Table is scrollable <i class="fa fa-arrow-right"></i>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>
<section class="related_specs">
	<div class="container">
		<div class="specs">
		<section class="tabs_container">
			<ul class="tabs tabs-horizontal">
			<?php if(have_rows('operation_manual') || have_rows('installation_manual') ) : ?>
				<li class="active"><a data-tab="#tab1">Features and Specs</a></li>
			<?php else : ?>
				<li class="active no_manual"><a data-tab="#tab1">Features and Specs</a></li>
			<?php endif; ?>
			<?php if(have_rows('operation_manual') || have_rows('installation_manual') ) : ?>
				<li><a data-tab="#tab2">Manuals</a></li>
			<?php endif; ?>
			</ul>
			
			<div class="tabs-content">
			    <div class="tabs-pane active" id="tab1">
			        <?php the_field('features_and_specs'); ?>
			    </div>
			 
				<?php if(have_rows('operation_manual') || have_rows('installation_manual') ) : ?>
				    <div class="tabs-pane" id="tab2">
				    	<ul class="manuals">
				    	<?php if(have_rows('operation_manual')) : ?>
						 	<?php while(have_rows('operation_manual')) : the_row(); ?>
						 		<li>
						 		<?php $fileID1 = get_sub_field('manual_link'); ?>
								<?php 
									  $url = wp_get_attachment_url( $fileID1 );
									  $filesize = filesize(get_attached_file( $fileID1 ));
									  $filesize = size_format($filesize, 2);
								?>
						 			<a href="<?php echo $url; ?>"><?php the_sub_field('manual_link_title'); ?></a><br /><p><?php the_sub_field('manual_type'); ?>(<?php echo $filesize; ?>)</p>
						 		</li>
						 	<?php endwhile; ?>
					 	<?php endif; ?>
					 	
					 	<?php if(have_rows('installation_manual')) : ?>
						 	<?php while(have_rows('installation_manual')) : the_row();?>
						 		<li>
						 		<?php $fileID2 = get_sub_field('inst_manual_link'); ?>
								<?php 
									  $url = wp_get_attachment_url( $fileID2 );
									  $filesize = filesize(get_attached_file( $fileID2 ));
									  $filesize = size_format($filesize, 2);
								?>
							 		<a href="<?php echo $url; ?>"><?php the_sub_field('inst_manual_link_title'); ?></a><br /><p><?php the_sub_field('inst_manual_type'); ?>(<?php echo $filesize; ?>)</p>
						 		</li>
						 	<?php endwhile; ?>
					 	<?php endif; ?>
				    	</ul>
				    </div>
			    <?php endif; ?>
			</div>
		</section>
		</div>
		<?php $related = get_field('related_products'); ?>
		<?php if( $related ): ?>
			<div class="related">
				<h4>Related Products</h4>
				<ul>
				<?php foreach( $related as $p ): // variable must NOT be called $post (IMPORTANT) ?>
					<?php 
						$images = get_field('product_images', $p->ID);
						$image = $images[0]['product_image'];
						
					 ?>
				    <li>
				    	<a href="<?php echo get_permalink( $p->ID ); ?>">
				    	<img src="<?php echo $image['url']; ?>" alt="" />
				    	<?php echo $p->post_title; ?></a>
				    </li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>			
	</div>
</section>

<?php endwhile; else: ?>

<?php endif; ?>
	
<?php get_footer(); ?>