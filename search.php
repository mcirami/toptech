<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package boiler
 */

get_header(); ?>

	<section class="search_results_section">
	
		<div class="container">

			<?php if ( have_posts() ) : ?>
	
				<h1><?php printf( __( 'Search Results: %s', 'boiler' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'content', 'search' ); ?>
	
				<?php endwhile; ?>
	
			<?php else : ?>
	
				<?php get_template_part( 'no-results', 'search' ); ?>
	
			<?php endif; ?>
		
		</div>
		
	</section>

<?php get_footer(); ?>