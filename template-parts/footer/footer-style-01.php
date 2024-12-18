<?php
/**
 * Footer Style 01
 * @package bizmaster
 * @since 1.0.0
 */

$footer_two_copyright_text = !empty(cs_get_option('footer_two_copyright_text')) ? cs_get_option('footer_two_copyright_text') : esc_html__('© Bizmaster 2024 All Rights Reserved', 'bizmaster');
$footer_two_copyright_text = str_replace('{copy}', '&copy;', $footer_two_copyright_text);
$footer_two_copyright_text = str_replace('{year}', date('Y'), $footer_two_copyright_text);
$footer_two_bg_image = cs_get_option('footer_two_bg_image');

if(!empty($footer_two_bg_image['url'])){ ?>
   <div class="footer-style-2 mt-0 bg-cover bg-heading" style="background-image: url('<?php echo esc_attr($footer_two_bg_image['url']); ?>')">
<?php }else { ?>
    <div class="footer-area footer-style-2 bg-gray box-shadow-none">
<?php } ?>
    <footer class="footer-wrap">
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar('footer-widget-two'); ?>
            </div>
        </div>
        <div class="copyright-wrap mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="copyright-content">
                            <div class="copyright-text color-gray">
                                <?php
                                echo wp_kses($footer_two_copyright_text, bizmaster()->kses_allowed_html(array('a')));
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php if ( has_nav_menu( 'footer-menu' ) ){ ?>
                        <div class="col-lg-6  text-lg-end align-self-center color-gray">
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