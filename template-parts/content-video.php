<?php
/**
 * Template part for displaying video posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bizmaster
 */

$bizmaster = bizmaster();
$post_meta = get_post_meta(get_the_ID(),'bizmaster_post_video_options',true);
$video_url = isset($post_meta['video_url']) && $post_meta['video_url'] ? $post_meta['video_url'] : '';
$video_type = isset($post_meta['video_type']) && $post_meta['video_type'] ? $post_meta['video_type'] : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-main-item-01 margin-bottom-30 blog-single-card'); ?>>

	<?php if(!empty($video_url) && !empty($video_type)) { ?>
		<div class="thumbnail-video text-center">
			<?php if($video_type == "youtube") { ?>
				<iframe width="100%" height="400" src="<?php echo esc_url($video_url); ?>"></iframe>
			<?php } elseif($video_type == "vimeo") { ?>
				<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="<?php echo esc_url($video_url); ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
			<?php } elseif($video_type == "self_hosted_video") { ?>
				<video width="100%" height="400" controls><source src="<?php echo esc_url($video_url); ?>" type="video/mp4"></video>
			<?php } else { ?>
				<div class="hover pt-3">
					<a href="<?php echo esc_url($video_url); ?>" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
				</div>
			<?php } ?>
		</div>
	<?php } else { ?>
		<?php if (has_post_thumbnail()): ?>
			<div class="thumbnail">
				<?php $bizmaster->post_thumbnail('post-thumbnail'); ?>
			</div>
		<?php endif;?>
	<?php } ?>

	<div class="content blog-content">
        <?php
			get_template_part('template-parts/content/post-meta');
			the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			get_template_part('template-parts/content/post-excerpt');
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->