<?php
/**
 * The template used for displaying individual search results for search.php
 *
 * @package boiler
 */
?>

	<a href="<?php the_permalink(); ?>" class="entry-title"><?php the_title(); ?></a>

	<div>
		<?php the_content(); ?>
	</div>
	<?php //edit_post_link( __( 'Edit', 'boiler' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

