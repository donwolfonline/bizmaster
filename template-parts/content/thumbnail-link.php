<?php
/**
 * Post Thumbnail Video
 * @package bizmaster
 * @since 1.0.0
 */

$bizmaster = bizmaster();
$post_meta = get_post_meta(get_the_ID(),'bizmaster_post_link_options',true);
$link_url = isset($post_meta['link_url']) && $post_meta['link_url'] ? $post_meta['link_url'] : '';
$link_target = isset($post_meta['link_target']) && $post_meta['link_target'] ? $post_meta['link_target'] : '';
if(!empty($link_url)) { ?>
	<div class="link-post-type-content px-4 pt-4">
		<a target="_blank" class="post-link text-center display-block" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_html($link_target); ?>">
			<?php the_title(); ?> <span><?php echo esc_url($link_url); ?></span>
		</a>
	</div>
<?php } else { ?>
	<?php get_template_part('template-parts/content/thumbnail-classic'); ?>
<?php } ?>
