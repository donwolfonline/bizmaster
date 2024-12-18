<?php
/**
 * Template part for displaying single team post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bizmaster
 */

$bizmaster = bizmaster();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bizmaster-details-content-area team-details-section'); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php $bizmaster->link_pages(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
