<?php
/**
 * Blog Single Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bizmaster
 */

get_header();

$bizmaster = bizmaster();
if ($bizmaster->is_bizmaster_core_active()) {
	bizmaster_core()->setPostViews(get_the_ID());
}

$page_layout_meta = Bizmaster_Group_Fields_Value::page_layout('bizmaster');
$page_container_meta = Bizmaster_Group_Fields_Value::page_container('bizmaster','container_options');
$full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';

if ('blank' == $page_layout_meta['layout']):
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'single' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() || get_option( 'thread_comments' )) :
			comments_template();
		endif;
	endwhile; // End of the loop.
else:
?>
	<div id="primary" class="content-area blog-content-page padding-120 page-content-wrap-<?php the_ID(); ?> <?php echo esc_attr($full_width_class);?>">
		<main id="main" class="site-main">
			<div class="<?php echo esc_attr($page_container_meta['page_container_class'])?>">
				<div class="row">
					<div class="<?php echo esc_attr($page_layout_meta['content_column_class']);?>">
						<div class="page-content-inner-<?php the_ID(); ?>">
							<?php
								while ( have_posts() ) :
									the_post();
									get_template_part( 'template-parts/content', 'single' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() || get_option( 'thread_comments' )) :
										comments_template();
									endif;
								endwhile; // End of the loop.
							?>
						</div>
					</div>

					<?php if ($page_layout_meta['sidebar_enable']): ?>
						<div class="<?php echo esc_attr($page_layout_meta['sidebar_column_class']);?>">
							<?php get_sidebar();?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
endif;
get_footer();
