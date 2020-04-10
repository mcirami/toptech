<?php

//Template Name: Installation Manuals

get_header(); ?>

<?php $manualType = ($_GET['manual-type']) ? esc_attr($_GET['manual-type']) : null; ?>

<section class="manual_files">
	<div class="container">
		<div class="manuals_left">
			<h1><?php the_title(); ?></h1>
			<?php 
				
				$args = array(
					'public' => true,
					'_builtin' => false,
					'name' => $manualType
				);
				
				$postTypes = get_post_types( $args, 'objects' );
				
			?>
			
			<ul class="post_types">
			<?php foreach($postTypes as $postType) : ?>
				<li class="post_type">
					<h3><?php echo $postType->label; ?></h3>
					<ul class="categories">
					
					<?php $categories = get_terms($postType->taxonomies[0], $args); ?>
					<?php foreach($categories as $category) : ?>
						<li class="category_type">
							<h4><?php echo $category->name; ?></h4>
							<ul class="manual_links">
							<?php
								$args = array (
									'order' => 'ASC',
									'post_type' => $postType->name,
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => $category->taxonomy,
											'field' => 'slug',
											'terms' => $category->slug
										)
									)
								);
							
								$manual = new WP_Query($args);
							
								while( $manual->have_posts() ) : $manual->the_post();
							?>
							
								<?php if(have_rows('installation_manual')) : ?>
									<?php while(have_rows('installation_manual')) : the_row(); ?>
										<?php if( get_sub_field( 'inst_manual_link' ) ) : ?>
											<li class="manual_link"><a href="<?php echo wp_get_attachment_url( get_sub_field( 'inst_manual_link' ) ); ?>" target="_blank"><?php the_title(); ?></a></li>	
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
					
							<?php endwhile; wp_reset_query(); //endwpquery ?>
							</ul>
						</li>
					<?php endforeach; //end category foreach ?>
					</ul>
				</li>
			<?php endforeach; //end post_type foreach ?>
			</ul>
		</div>
		<div class="manuals_right">
			<?php include(locate_template('content-product-cat-sidebar.php')); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>