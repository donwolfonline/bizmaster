<?php
/**
 * Template part for displaying link posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bizmaster
 */

$bizmaster = bizmaster();
$post_meta = get_post_meta(get_the_ID(),'bizmaster_post_link_options',true);
$link_url = isset($post_meta['link_url']) && $post_meta['link_url'] ? $post_meta['link_url'] : '';
$link_target = isset($post_meta['link_target']) && $post_meta['link_target'] ? $post_meta['link_target'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-main-item-01 margin-bottom-30 blog-single-card'); ?>>

	<?php if(!empty($link_url)) { ?>
		<div class="link-post-type-content px-5 pt-5">
			<a target="_blank" class="post-link text-center display-block" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_html($link_target); ?>">
				<?php the_title(); ?> <span><?php echo esc_url($link_url); ?></span>
			</a>
		</div>
	<?php } else { ?>
		<?php get_template_part('template-parts/content/thumbnail-classic'); ?>
	<?php } ?>

	<div class="link-post-type content blog-content">
        <?php
			get_template_part('template-parts/content/post-meta');
			the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			get_template_part('template-parts/content/post-excerpt');
        ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->