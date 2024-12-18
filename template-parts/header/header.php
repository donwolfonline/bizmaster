<?php
/**
 * Theme Default Header
 * @package bizmaster
 * @since 1.0.0
 */
?>

<nav class="navbar navbar-area navbar-expand-lg navigation-style-01 navbar-style-01 navbar-default m-0 header-layout1 pt-2 pb-2">
    <div class="container custom-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <?php
                $header_one_logo = cs_get_option('header_one_logo');
                if (has_custom_logo() && empty($header_one_logo['id'])) {
                    the_custom_logo();
                } elseif (!empty($header_one_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], $header_one_logo['alt']);
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
                <div class="header-wrapper">
                    <div class="header-button">
                        <button type="button" class="simple-icon searchBoxToggler"><i class="fas fa-search"></i></button>
                        <a href="#" class="simple-icon sideMenuToggler d-none d-lg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" viewBox="0 0 30 24" fill="none">
                                <line x1="0.0078125" y1="12.293" x2="30.0078" y2="12.293" stroke="#19352D" stroke-width="3"/>
                                <path d="M5.00781 22.293H30.0078" stroke="#19352D" stroke-width="3"/>
                                <path d="M10.0078 2.29297H30.0078" stroke="#19352D" stroke-width="3"/>
                            </svg>
                        </a>
                    </div>
                    <div class="social-links d-xl-inline-flex d-none">
                        <?php
                            $header_social_repeater = cs_get_option('header_social_repeater');
                            if($header_social_repeater) : 
                                foreach ($header_social_repeater as $s_icon) { ?>
                                    <a href="<?php echo esc_url($s_icon['header_social_url'], 'bizmaster') ?>">
                                        <i class="<?php echo esc_attr($s_icon['header_social_icon'], 'bizmaster'); ?>"></i>
                                    </a>
                                <?php }
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div class="sidemenu-wrapper sidemenu-info">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="fas fa-times"></i></button>
        <div class="widget  ">
            <div class="th-widget-about">
                <div class="about-logo mb-3">
                    <?php
                        $sitebar_logo = cs_get_option('sitebar_logo');
                        $sitebar_content_1 = cs_get_option('sitebar_content_1');
                        $sitebar_address = cs_get_option('sitebar_address');
                        $sitebar_email = cs_get_option('sitebar_email');
                        $sitebar_email_2 = cs_get_option('sitebar_email_2');
                        $sitebar_phone = cs_get_option('sitebar_phone');
                        $sitebar_phone_2 = cs_get_option('sitebar_phone_2');
                        $sitebar_facebook = cs_get_option('sitebar_facebook');
                        $sitebar_twitter = cs_get_option('sitebar_twitter');
                        $sitebar_instagram = cs_get_option('sitebar_instagram');
                        $sitebar_linkedin = cs_get_option('sitebar_linkedin');
                        $sitebar_gallery = cs_get_option('sitebar_gallery');

                        if (has_custom_logo() && empty($sitebar_logo['id'])) {
                            the_custom_logo();
                        } elseif (!empty($sitebar_logo['id'])) {
                            printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $sitebar_logo['url'], $sitebar_logo['alt']);
                        } else {
                            printf('<h3 class="mb-4"><a class="site-title" href="%1$s">%2$s</a></h3>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                        }
                    ?>
                </div>
                <p class="about-text"><?php echo esc_html($sitebar_content_1, 'bizmaster'); ?></p>
                <div class="social-links">
                    <a href="<?php echo esc_url($sitebar_facebook, 'bizmaster'); ?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo esc_url($sitebar_twitter, 'bizmaster'); ?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo esc_url($sitebar_instagram, 'bizmaster'); ?>"><i class="fab fa-linkedin-in"></i></a>
                    <a href="<?php echo esc_url($sitebar_linkedin, 'bizmaster'); ?>"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-20">
                <h4><?php echo esc_html('Office Address', 'bizmaster'); ?></h4>
                <p><?php echo esc_html($sitebar_address, 'bizmaster'); ?></p>
            </div>
            <div class="contact-list mb-20">
                <h4><?php echo esc_html('Phone Number', 'bizmaster'); ?></h4>
                <p class="mb-0"><?php echo esc_html($sitebar_phone, 'bizmaster'); ?></p>
                <p class="mb-0"><?php echo esc_html($sitebar_phone_2, 'bizmaster'); ?></p>
            </div>
            <div class="contact-list mb-20">
                <h4><?php echo esc_html('Email Address', 'bizmaster'); ?></h4>
                <p class="mb-0"><?php echo esc_html($sitebar_email, 'bizmaster'); ?></p>
                <p class="mb-0"><?php echo esc_html($sitebar_email_2, 'bizmaster'); ?></p>
            </div>
        </div>
        <ul class="side-instagram list-wrap">
            <?php 
                $gallery_image = explode(',',$sitebar_gallery);

                for ($i=0; $i < count($gallery_image); $i++):

                $img_src = wp_get_attachment_image_src($gallery_image[$i],'guardsy_classic');
                $img_alt = get_post_meta($gallery_image[$i],'wp_attachment_image_alt',true);
                ?>
                <li><img src="<?php echo esc_url($img_src[0]);?>" alt="<?php echo esc_attr($img_alt);?>"></li>
            <?php endfor; ?>
        </ul>
    </div>
</div>
<div class="popup-search-box">
    <button class="searchClose"><i class="fas fa-times"></i></button>
    <form role="search" action="<?php echo esc_url(home_url('/')) ?>" method="get">
        <input type="text"  name="s" placeholder="<?php echo esc_attr__('What are you looking for?','bizmaster');?>">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>