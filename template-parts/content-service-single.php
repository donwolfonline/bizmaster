<?php
/**
 * Template part for displaying single service post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bizmaster
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('service-details-item'); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>