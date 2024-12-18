<?php
/**
 * Theme Default Footer
 * @package bizmaster
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('© Bizmaster 2024 All Rights Reserved','bizmaster');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);

$footer_shortcode = cs_get_option('footer_shortcode');
$footer_one_bg_color = cs_get_option('footer_one_bg_color');
$footer_one_bg_image = cs_get_option('footer_one_bg_image');
$footer_one_spacing_top = cs_get_option('footer_one_spacing_top');
$footer_one_spacing_right = cs_get_option('footer_one_spacing_right');
$footer_one_spacing_bottom = cs_get_option('footer_one_spacing_bottom');
$footer_one_spacing_left = cs_get_option('footer_one_spacing_left');

$footer_shortcode_class = '';
if (!empty($footer_shortcode)) {
    $footer_shortcode_class = 'footer-top-space';
};

if(!empty($footer_shortcode)){
    echo do_shortcode($footer_shortcode);
}
?>

<div class="footer-style-1 mt-0 bg-cover bg-heading <?php echo esc_attr($footer_shortcode_class); ?>" style="
	<?php if(!empty($footer_one_bg_image['url'])){ ?> background-image: url('<?php echo esc_attr($footer_one_bg_image['url']); ?>'); <?php } ?>
	<?php if(!empty($footer_one_bg_color)){ ?> background-color: <?php echo esc_attr($footer_one_bg_color); ?>; <?php } ?>
	<?php if(!empty($footer_one_spacing_top)){ ?> padding-top: <?php echo esc_attr($footer_one_spacing_top) . 'px'; ?>; <?php } ?>
	<?php if(!empty($footer_one_spacing_right)){ ?> padding-right: <?php echo esc_attr($footer_one_spacing_right) . 'px'; ?>; <?php } ?>
	<?php if(!empty($footer_one_spacing_bottom)){ ?> padding-bottom: <?php echo esc_attr($footer_one_spacing_bottom) . 'px'; ?>; <?php } ?>
	<?php if(!empty($footer_one_spacing_left)){ ?> padding-left: <?php echo esc_attr($footer_one_spacing_left) . 'px'; ?>; <?php } ?>
">
	<footer class="footer-wraps">
        <div class="container">
            <?php get_template_part('template-parts/content/footer-widget'); ?>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="copyright-content">
                            <div class="copyright-text">
                                <?php echo wp_kses($copyright_text, bizmaster()->kses_allowed_html(array('a'))); ?>
                            </div>
                        </div>
                    </div>
                    <?php if ( has_nav_menu( 'footer-menu' ) ){ ?>
                        <div class="col-lg-6 mt-lg-0 mt-2 text-lg-end align-self-center">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                            )); ?>
                        </div>  
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>
</div>
