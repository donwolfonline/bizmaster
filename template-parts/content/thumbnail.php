<?php
/**
 * Post Thumbnail 
 * @package bizmaster
 * @since 1.0.0
 */
?>

<div class="thumbnail text-center">
	<?php
		if (has_post_thumbnail() && get_post_type() == 'post') {
			bizmaster()->post_thumbnail('post-thumbnail');
		}
	?>
</div>
