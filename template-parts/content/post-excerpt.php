<?php
/**
 * Theme Post excerpt Template
 * @package bizmaster
 * @since 1.0.0
 */

$bizmaster = bizmaster();
$post_meta = Bizmaster_Group_Fields_Value::post_meta('blog_post');
$excerpt_length = !empty($post_meta['excerpt_length']) ? $post_meta['excerpt_length'] : 55;
$readmore_text = !empty($post_meta['readmore_btn_text']) ? $post_meta['readmore_btn_text'] : esc_html__('Read More','bizmaster');
$excerpt_more = !empty($post_meta['excerpt_more']) ? $post_meta['excerpt_more'] : '...';

Bizmaster_Excerpt($excerpt_length, $excerpt_more);
?>
<div class="blog-bottom mt-3">
	<?php
		if($post_meta['readmore_btn']){
			printf('<div class="btn-wrap"><a href="%1$s" class="global-btn style-border2">%2$s <i class="fas fa-arrow-right ms-1"></i></a></div>',esc_url(get_the_permalink()),esc_html($readmore_text));
		}
	?>
</div>