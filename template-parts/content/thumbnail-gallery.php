<?php
/**
 * Post Thumbnail Gallery
 * @package bizmaster
 * @since 1.0.0
 */

$bizmaster = bizmaster();
$post_meta = get_post_meta(get_the_ID(),'bizmaster_post_gallery_options',true);
$post_meta_gallery = isset($post_meta['gallery_images']) && !empty($post_meta['gallery_images']) ? $post_meta['gallery_images'] : '';
$gallery_image = explode(',',$post_meta_gallery);
$blog_single_options = Bizmaster_Group_Fields_Value::post_meta('blog_single_post');
?>
<?php if ( isset($post_meta['gallery_images']) && !empty($post_meta['gallery_images']) ): ?>
    <div id="bizmaster_post_gallery" class="carousel slide thumbnail" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
				for ($i =0; $i < count($gallery_image); $i++) {
					if($i == 0) {
						echo '<button type="button" data-bs-target="#bizmaster_post_gallery" data-bs-slide-to="'. $i .'" class="active" aria-current="true"></button>';
					} else {
						echo '<button type="button" data-bs-target="#bizmaster_post_gallery" data-bs-slide-to="'. $i .'"></button>';
					}
				}
            ?>
        </div>
		<div class="carousel-inner">
            <?php
            for ($i=0; $i < count($gallery_image); $i++):
				$class = '';
				if($i == 0) {
					$class = 'active';
				}
				$img_src = wp_get_attachment_image_src($gallery_image[$i],'bizmaster_classic');
				$img_alt = get_post_meta($gallery_image[$i],'wp_attachment_image_alt',true);
			?>
				<div class="carousel-item <?php echo esc_attr($class);?>">
					<img class="d-block w-100" src="<?php echo esc_url($img_src[0]);?>" alt="<?php echo esc_attr($img_alt);?>">
				</div>
			<?php endfor; ?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#bizmaster_post_gallery" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden"><?php echo esc_html__('Previous', 'bizmaster') ?></span>
        </button>
		<button class="carousel-control-next" type="button" data-bs-target="#bizmaster_post_gallery" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden"><?php echo esc_html__('Next', 'bizmaster') ?></span>
        </button>
	</div>
<?php
else:
    if ( has_post_thumbnail() ):
	?>
		<div class="thumbnail">
            <?php $bizmaster->post_thumbnail('post-thumbnail'); ?>
        </div>
	<?php
    endif;
endif;
?>