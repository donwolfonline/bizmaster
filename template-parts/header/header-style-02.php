<?php
/**
 * Theme Default Header
 * @package bizmaster
 * @since 1.0.0
 */
?>
<?php
    $header_three_phone_number = cs_get_option('header_three_phone_number');
    $header_three_email = cs_get_option('header_three_email');
    $header_three_address = cs_get_option('header_three_address');
?>
<div class="nav-header header-layout3">
    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto">
                    <div class="header-links first">
                        <ul>
                            <li><i class="me-2 fas fa-envelope"></i><?php echo esc_html($header_three_email, 'bizmaster'); ?></li>
                            <li><i class="me-2 fas fa-map-marker-alt"></i><?php echo esc_html($header_three_address, 'bizmaster'); ?></li>
                            <li><i class="me-2 fas fa-phone-alt"></i><?php echo esc_html($header_three_phone_number, 'bizmaster'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links second ps-0">
                        <ul>
                            <li>
                                <div class="social-links">
                                    <?php
                                        $header_three_social_repeater = cs_get_option('header_three_social_repeater');
                                        if($header_three_social_repeater) : 
                                            foreach ($header_three_social_repeater as $s_icon) { ?>
                                                <a href="<?php echo esc_url($s_icon['header_three_social_url'], 'bizmaster') ?>">
                                                    <i class="<?php echo esc_attr($s_icon['header_three_social_icon'], 'bizmaster'); ?>"></i>
                                                </a>
                                            <?php }
                                        endif;
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top-bg-shape"></div>
    </div>
</div>
<nav class="navbar navbar-area navbar-expand-lg navigation-style-01 navbar-style-03 navbar-default m-0 pt-1 pb-1">
    <div class="container custom-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <?php
                $header_three_logo = cs_get_option('header_three_logo');
                if (has_custom_logo() && empty($header_three_logo['id'])) {
                    the_custom_logo();
                } elseif (!empty($header_three_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_three_logo['url'], $header_three_logo['alt']);
                } else {
                    printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                }
                ?>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bizmaster_main_menu" aria-controls="bizmaster_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'menu_class' => 'navbar-nav text-lg-center',
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'bizmaster_main_menu',
            'fallback_cb' => 'bizmaster_theme_fallback_menu',
        ));
        ?>
        <?php if (bizmaster()->is_bizmaster_core_active()) : ?>
            <div class="nav-right-part nav-right-part-desktop align-self-center">
                <?php
                    $header_three_right_btn_text = cs_get_option('header_three_right_btn_text');
                    $header_three_right_btn_url = cs_get_option('header_three_right_btn_url');
                ?>
                <button type="button" class="simple-icon searchBoxToggler"><i class="fas fa-search"></i></button>
                <a class="global-btn mt-2 mb-2" href="<?php echo esc_url($header_three_right_btn_url); ?>">
                    <span class="me-1"><?php echo esc_html($header_three_right_btn_text); ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div class="popup-search-box">
    <button class="searchClose"><i class="fas fa-times"></i></button>
    <form role="search" action="<?php echo esc_url(home_url('/')) ?>" method="get">
        <input type="text"  name="s" placeholder="<?php echo esc_attr__('What are you looking for?','bizmaster');?>">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>