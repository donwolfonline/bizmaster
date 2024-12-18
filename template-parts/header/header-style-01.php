<?php
/**
 * Theme Default Header
 * @package bizmaster
 * @since 1.0.0
 */
?>

<nav class="navbar navbar-area navbar-expand-lg navigation-style-01 navbar-style-02 navbar-default m-0 pt-2 pb-2 bg-smoke">
    <div class="container custom-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <?php
                $header_two_logo = cs_get_option('header_two_logo');
                if (has_custom_logo() && empty($header_two_logo['id'])) {
                    the_custom_logo();
                } elseif (!empty($header_two_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_two_logo['url'], $header_two_logo['alt']);
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
            'menu_class' => 'navbar-nav',
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'bizmaster_main_menu',
            'fallback_cb' => 'bizmaster_theme_fallback_menu',
        ));
        ?>
        <?php if (bizmaster()->is_bizmaster_core_active()) : ?>
            <div class="nav-right-part nav-right-part-desktop align-self-center">
                <?php
                    $header_two_btn_text = cs_get_option('header_two_btn_text');
                    $header_two_btn_url = cs_get_option('header_two_btn_url');
                ?>
                <a class="global-btn mt-2 mb-2" href="<?php echo esc_url($header_two_btn_url); ?>">
                    <span class="me-1"><?php echo esc_html($header_two_btn_text); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
                        <path d="M13.7266 5.37891L10.2266 8.87891C9.89844 9.23438 9.32422 9.23438 8.99609 8.87891C8.64062 8.55078 8.64062 7.97656 8.99609 7.64844L10.9922 5.625H0.875C0.382812 5.625 0 5.24219 0 4.75C0 4.23047 0.382812 3.875 0.875 3.875H10.9922L8.99609 1.87891C8.64062 1.55078 8.64062 0.976562 8.99609 0.648438C9.32422 0.292969 9.89844 0.292969 10.2266 0.648438L13.7266 4.14844C14.082 4.47656 14.082 5.05078 13.7266 5.37891Z" fill="white"/>
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>