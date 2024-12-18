<?php
/**
 * Post Thumbnail Video
 * @package bizmaster
 * @since 1.0.0
 */

$bizmaster = bizmaster();
$post_meta = get_post_meta(get_the_ID(),'bizmaster_post_video_options',true);
$video_url = isset($post_meta['video_url']) && $post_meta['video_url'] ? $post_meta['video_url'] : '';
$video_type = isset($post_meta['video_type']) && $post_meta['video_type'] ? $post_meta['video_type'] : '';
if(!empty($video_url) && !empty($video_type)) { ?>
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
		<div class="thumbnail text-center">
			<?php $bizmaster->post_thumbnail('post-thumbnail'); ?>
		</div>
	<?php endif;?>
<?php } ?>
