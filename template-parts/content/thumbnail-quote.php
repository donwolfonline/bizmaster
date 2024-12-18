<?php
/**
 * Post Thumbnail Video
 * @package bizmaster
 * @since 1.0.0
 */

$bizmaster = bizmaster();
$post_meta = get_post_meta(get_the_ID(),'bizmaster_post_quote_options',true);
$quote_text = isset($post_meta['quote_text']) && $post_meta['quote_text'] ? $post_meta['quote_text'] : '';
$quote_author = isset($post_meta['quote_author']) && $post_meta['quote_author'] ? $post_meta['quote_author'] : '';
$quote_author_position = isset($post_meta['quote_author_position']) && $post_meta['quote_author_position'] ? $post_meta['quote_author_position'] : '';
if(!empty($quote_text)) { ?>
	<blockquote class="highlighted-quote">
		<p><?php echo esc_html($quote_text); ?></p>
		<footer>
			<?php if(!empty($quote_author)) { ?>
				<div class="author-name"><?php echo esc_html($quote_author); ?></div>
			<?php } ?>
			<?php if(!empty($quote_author_position)) { ?>
				<cite><?php echo esc_html($quote_author_position); ?></cite>
			<?php } ?>
		</footer>
	</blockquote>
<?php } else { ?>
	<?php get_template_part('template-parts/content/thumbnail-classic'); ?>
<?php } ?>
