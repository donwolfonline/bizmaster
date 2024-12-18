<?php
/**
 * Single Team Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bizmaster
 */

get_header();

$page_layout_meta = Bizmaster_Group_Fields_Value::page_layout('bizmaster');
$page_container_meta = Bizmaster_Group_Fields_Value::page_container('bizmaster','container_options');
$full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';

if ('blank' == $page_layout_meta['layout']):
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'service-single' );
	endwhile; // End of the loop.
else:
?>
	<div id="primary" class="service-content-area service-details-page padding-top-120 page-content-wrap-<?php the_ID(); ?> <?php echo esc_attr($full_width_class);?>">
		<main id="main" class="site-main">
			<div class="<?php echo esc_attr($page_container_meta['page_container_class'])?>">
				<div class="row">
					<div class="<?php echo esc_attr($page_layout_meta['content_column_class']);?>">
						<div class="page-content-inner-<?php the_ID(); ?>">
							<?php
								while ( have_posts() ) :
									the_post();
									get_template_part( 'template-parts/content', 'service-single' );
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
