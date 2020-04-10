<?php
/**
 * @package boiler
 */
?>

<?php $manualType = ($_GET['manual-type']) ? esc_attr($_GET['manual-type']) : $manualLink; ?>

<div class="sidebar">
	<?php if(get_field('manuals')) : ?>
		<div class="manuals">
			<ul>
				<?php while(has_sub_field('manuals')) : ?>
					<?php $mLink = get_sub_field('manual_link'); ?>
					<?php if(($mLink != '/toptech-dealer-imprint-form') && ($mLink != '/toptech-dealer-imprint-form/')) : ?>
						<a href="<?php echo $mLink . '?manual-type=' . $manualType; ?>"><li><?php the_sub_field('manual_title'); ?></li></a>
					<?php else : ?>
						<a href="<?php echo $mLink; ?>"><li><?php the_sub_field('manual_title'); ?></li></a>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
	<?php if(get_field('quick_links')) : ?>	
		<div class="quick_links">
			<h4>Quick Links</h4>
			<ul>
				<?php while(has_sub_field('quick_links')) : ?>
					<li class="quick_link">
						<?php $fileID = get_sub_field('quick_link_url'); ?>
							<?php 
								  $url = wp_get_attachment_url( $fileID );
								  $filesize = filesize(get_attached_file( $fileID ));
								  $filesize = size_format($filesize, 2);
							?>
						<a href="<?php echo $url; ?>">
							<?php the_sub_field('quick_link_title'); ?><br /><?php the_sub_field('quicklink_type'); ?>(<?php echo $filesize; ?>)
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>