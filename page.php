<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package boiler
 */

get_header(); ?>

	<section class="single_page">
	
		<article class="container">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<h1><?php the_title(); ?></h1>
			
				<?php the_content(); ?>
	
				<?php //get_template_part( 'content', 'page' ); ?>
	
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					/*if ( comments_open() || '0' != get_comments_number() )
						comments_template();*/
				?>
	
			<?php endwhile; // end of the loop. ?>
			
		</article>
		
		<?php //get_sidebar(); ?>
		
	</section>

<?php get_footer(); ?>
