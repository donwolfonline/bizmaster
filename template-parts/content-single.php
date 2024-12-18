<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bizmaster
 */

$bizmaster = bizmaster();
$post_meta = get_post_meta(get_the_ID(), 'bizmaster_post_gallery_options', true);
$post_meta_gallery = isset($post_meta['gallery_images']) && !empty($post_meta['gallery_images']) ? $post_meta['gallery_images'] : '';
$post_single_meta = Bizmaster_Group_Fields_Value::post_meta('blog_single_post');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-content-wrap'); ?>>
    <?php
		if (has_post_thumbnail() || !empty($post_meta_gallery)):
			$get_post_format = get_post_format();
			if ('video' == $get_post_format || 'gallery' == $get_post_format || 'quote' == $get_post_format || 'link' == $get_post_format) {
				get_template_part('template-parts/content/thumbnail', $get_post_format);
			} else {
				get_template_part('template-parts/content/thumbnail');
			}
		endif;
    ?>
    <div class="pe-xl-4 pe-3 ps-xl-4 ps-3 pt-2 pb-2">
        <div class="entry-content">
            <?php if ('post' == get_post_type()): ?>
				<ul class="post-meta">
                    <?php if ($post_single_meta['posted_by']): ?>
                        <li>
                            <i class="far fa-user"></i>
                            <?php $bizmaster->posted_by(); ?>
                        </li>
                    <?php endif; ?>
					<?php if ($post_single_meta['posted_category']): ?>
						<li>
							<i class="far fa-folder-open"></i>
							<?php the_category(', ', '') ?>
						</li>
					<?php endif; ?>
                </ul>
            <?php endif; ?>
			<?php the_content(); ?>
			<?php $bizmaster->link_pages(); ?>
		</div>
        <?php if ('post' == get_post_type() && ((has_tag() && $post_single_meta['posted_tag']) || (shortcode_exists('bizmaster_post_share') && $post_single_meta['posted_share']))): ?>
            <div class="blog-details-footer">
                <?php if (has_tag() && $post_single_meta['posted_tag']): ?>
                    <div class="left">
                        <h5 class="title"><?php echo esc_html__('Tags:', 'bizmaster') ?></h5>
                        <?php $bizmaster->posted_tag(); ?>
                    </div>
                <?php endif; ?>
                <?php if (shortcode_exists('bizmaster_post_share') && $post_single_meta['posted_share']) : ?>
                    <div class="right">
                        <h5 class="title"><?php echo esc_html__('Social Share:', 'bizmaster') ?></h5>
                        <?php
							if (shortcode_exists('bizmaster_post_share') && $post_single_meta['posted_share']) {
								echo do_shortcode('[bizmaster_post_share]');
							}
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
		<?php
			if ($post_single_meta['post_navigation'] && $bizmaster->is_bizmaster_core_active()) {
				echo wp_kses($bizmaster->post_navigation(), $bizmaster->kses_allowed_html('all'));
			}

			if ($post_single_meta['author_bio'] && $bizmaster->is_bizmaster_core_active()) {
				echo wp_kses($bizmaster->author_biography(get_the_ID()), $bizmaster->kses_allowed_html('all'));
			}

			if ($bizmaster->is_bizmaster_core_active()) {
				if ($post_single_meta['get_related_post']) {
					$bizmaster->get_related_post([
						'post_type' => 'post',
						'taxonomy' => 'category',
						'exclude_id' => get_the_ID(),
						'posts_per_page' => 2
					]);
				}
			}
        ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
