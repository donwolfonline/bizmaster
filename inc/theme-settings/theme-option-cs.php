<?php

/**
 * Theme Options
 * @package bizmaster
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $allowed_html = bizmaster()->kses_allowed_html(array('mark'));
    $prefix = 'bizmaster';
    // Create options
    CSF::createOptions($prefix . '_theme_options', array(
        'menu_title' => esc_html__('Theme Options', 'bizmaster'),
        'menu_slug' => 'bizmaster_theme_options',
        'menu_parent' => 'bizmaster_theme_options',
        'menu_type' => 'submenu',
        'footer_credit' => ' ',
        'menu_icon' => 'fa fa-filter',
        'show_footer' => false,
        'enqueue_webfont' => false,
        'show_search' => true,
        'show_reset_all' => true,
        'show_reset_section' => true,
        'show_all_options' => false,
        'theme' => 'dark',
        'framework_title' => bizmaster()->get_theme_info('name')
    ));

    /*-------------------------------------------------------
        ** General  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('General', 'bizmaster'),
        'id' => 'general_options',
        'icon' => 'fas fa-cogs',
    ));
    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Preloader & SVG Enable', 'bizmaster'),
        'id' => 'theme_general_preloader_options',
        'icon' => 'fa fa-spinner',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Preloader Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'preloader_enable',
                'title' => esc_html__('Preloader', 'bizmaster'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader', 'bizmaster'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'preloader_bg_color',
                'title' => esc_html__('Background Color', 'bizmaster'),
                'type' => 'color',
                'default' => '#ffffff',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for preloader background image', 'bizmaster'), $allowed_html),
                'dependency' => array('preloader_enable', '==', 'true')
            ),
            array(
                'id' => 'enable_svg_upload',
                'type' => 'switcher',
                'title' => esc_html__('Enable Svg Upload ?', 'bizmaster'),
                'desc' => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'bizmaster'),
                'default' => false,
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Typography  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'typography',
        'title' => esc_html__('Typography', 'bizmaster'),
        'icon' => 'fas fa-text-height',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body Font Options', 'bizmaster') . '</h3>',
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'bizmaster'),
                'id' => '_body_font',
                'default' => array(
                    'font-family' => 'Inter',
                    'font-size' => '16',
                    'line-height' => '26',
                    'unit' => 'px',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'bizmaster'), $allowed_html),
            ),
            array(
                'id' => 'body_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'bizmaster'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'bizmaster'),
                    '400' => esc_html__('Regular 400', 'bizmaster'),
                    '500' => esc_html__('Medium 500', 'bizmaster'),
                    '600' => esc_html__('Semi Bold 600', 'bizmaster'),
                    '700' => esc_html__('Bold 700', 'bizmaster'),
                    '800' => esc_html__('Extra Bold 800', 'bizmaster'),
                ),
                'default' => array('500', '600', '700')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading Font Options', 'bizmaster') . '</h3>',
            ),
            array(
                'type' => 'switcher',
                'id' => 'heading_font_enable',
                'title' => esc_html__('Heading Font', 'bizmaster'),
                'desc' => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'bizmaster'), $allowed_html),
                'default' => true
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'bizmaster'),
                'id' => 'heading_font',
                'default' => array(
                    'font-family' => 'Inter',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'font_size' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2mh3,h4,h5,h6', 'bizmaster'), $allowed_html),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
            array(
                'id' => 'heading_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'bizmaster'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'bizmaster'),
                    '400' => esc_html__('Regular 400', 'bizmaster'),
                    '500' => esc_html__('Medium 500', 'bizmaster'),
                    '600' => esc_html__('Semi Bold 600', 'bizmaster'),
                    '700' => esc_html__('Bold 700', 'bizmaster'),
                    '800' => esc_html__('Extra Bold 800', 'bizmaster'),
                ),
                'default' => array('500', '600', '700'),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
        )
    ));

    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Back To Top', 'bizmaster'),
        'id' => 'theme_general_back_top_options',
        'icon' => 'fa fa-arrow-up',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Back Top Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'back_top_enable',
                'title' => esc_html__('Back Top', 'bizmaster'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'bizmaster'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'back_top_icon',
                'title' => esc_html__('Back Top Icon', 'bizmaster'),
                'type' => 'icon',
                'default' => 'fa fa-angle-up',
                'desc' => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'bizmaster'), $allowed_html),
                'dependency' => array('back_top_enable', '==', 'true')
            ),
        )
    ));

    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Sitebar', 'bizmaster'),
        'id' => 'theme_general_sitebar_options',
        'icon' => 'fa fa-arrow-up',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sitebar Option', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'sitebar_logo',
                'type' => 'media',
                'title' => esc_html__('Sitebar Logo', 'bizmaster'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'bizmaster'), $allowed_html),
            ),
            array(
                'id' => 'sitebar_content_1',
                'type' => 'text',
                'title' => esc_html__('Sitebar content', 'bizmaster'),
                'default' => esc_html__('We understand better that enim ad minim veniam, consectetur adipis cing elit, sed do', 'bizmaster'),
            ),
			array(
                'id' => 'sitebar_address',
                'type' => 'text',
                'title' => esc_html__('Sitebar Address', 'bizmaster'),
                'default' => esc_html__('Lavaca Street, Suite 2000', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_email',
                'type' => 'text',
                'title' => esc_html__('Sitebar email', 'bizmaster'),
                'default' => esc_html__('email@evha.com', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_email_2',
                'type' => 'text',
                'title' => esc_html__('Sitebar email 2', 'bizmaster'),
                'default' => esc_html__('email@evha.com', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_phone',
                'type' => 'text',
                'title' => esc_html__('Sitebar phone', 'bizmaster'),
                'default' => esc_html__('(+880) 172570051', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_phone_2',
                'type' => 'text',
                'title' => esc_html__('Sitebar phone 2', 'bizmaster'),
                'default' => esc_html__('(+880) 172570051', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_facebook',
                'type' => 'text',
                'title' => esc_html__('Sitebar facebook url', 'bizmaster'),
                'default' => esc_html__('#', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_twitter',
                'type' => 'text',
                'title' => esc_html__('Sitebar twitter url', 'bizmaster'),
                'default' => esc_html__('#', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_instagram',
                'type' => 'text',
                'title' => esc_html__('Sitebar instagram', 'bizmaster'),
                'default' => esc_html__('#', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_linkedin',
                'type' => 'text',
                'title' => esc_html__('Sitebar linkedin', 'bizmaster'),
                'default' => esc_html__('#', 'bizmaster'),
            ),
            array(
                'id' => 'sitebar_gallery',
                'type' => 'gallery',
                'title' => esc_html__('Sitebar Gallery', 'bizmaster'),
            ),
        )
    ));

    /*----------------------------------
        Header & Footer Style
    -----------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Set Header & Footer Type', 'bizmaster'),
        'id' => 'header_footer_style_options',
        'icon' => 'eicon-banner',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Header Style', 'bizmaster'),
            ),
            array(
                'id' => 'navbar_type',
                'title' => esc_html__('Navbar Type', 'bizmaster'),
                'type' => 'image_select',
                'options' => array(
                    'default' => BIZMASTER_THEME_SETTINGS_IMAGES . '/header/01.png',
                    'style-01' => BIZMASTER_THEME_SETTINGS_IMAGES . '/header/02.png',
                    'style-02' => BIZMASTER_THEME_SETTINGS_IMAGES . '/header/03.png'
                ),
                'default' => 'default',
                'desc' => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'bizmaster'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Footer Style', 'bizmaster'),
            ),
            array(
                'id' => 'footer_type',
                'title' => esc_html__('Footer Type', 'bizmaster'),
                'type' => 'image_select',
                'options' => array(
                    'default' => BIZMASTER_THEME_SETTINGS_IMAGES . '/footer/01.png',
                    'style-01' => BIZMASTER_THEME_SETTINGS_IMAGES . '/footer/02.png',
                    'style-02' => BIZMASTER_THEME_SETTINGS_IMAGES . '/footer/03.png'
                ),
                'default' => 'default',
                'desc' => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'bizmaster'), $allowed_html),
            ),
        )
    ));

    /* Breadcrumb */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Breadcrumb', 'bizmaster'),
        'id' => 'breadcrumb_options',
        'icon' => ' eicon-product-breadcrumbs',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Breadcrumb Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'breadcrumb_enable',
                'title' => esc_html__('Breadcrumb', 'bizmaster'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'bizmaster'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'breadcrumb_bg',
                'title' => esc_html__('Background Image', 'bizmaster'),
                'type' => 'background',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'bizmaster'), $allowed_html),
                'default' => array(
                    'background-size' => 'cover',
                    'background-position' => 'center bottom',
                    'background-repeat' => 'no-repeat',
                ),
                'background_color' => false,
                'dependency' => array('breadcrumb_enable', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_bg_color',
                'title' => esc_html__('Breadcrumb Background Color', 'bizmaster'),
                'type' => 'color',
                'default' => 'rgb(235, 243, 238);',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for Breadcrumb background image', 'bizmaster'), $allowed_html),
                'dependency' => array('breadcrumb_enable', '==', 'true')
            ),
        )
    ));


    /*-------------------------------------------------------
       ** Entire Site Header  Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'headers_settings',
        'title' => esc_html__('Headers', 'bizmaster'),
        'icon' => 'fa fa-home'
    ));

    /* Header Style 01 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header One', 'bizmaster'),
        'id' => 'theme_header_one_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_one_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'bizmaster'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'bizmaster'), $allowed_html),
            ),
            array(
                'id' => 'header_social_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Repeater', 'bizmaster'),
                'fields' => array(
                    array(
                        'id' => 'header_social_icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'bizmaster'),
                    ),
                    array(
                        'id' => 'header_social_url',
                        'type' => 'text',
                        'title' => esc_html__('Info URL', 'bizmaster'),
                        'default' => '#'
                    ),
                )
            ),
        )
    ));

    /* Header Style 02 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Two', 'bizmaster'),
        'id' => 'theme_header_two_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Navbar Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_two_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'bizmaster'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'bizmaster'), $allowed_html),
            ),
            array(
                'id' => 'header_two_btn_text',
                'type' => 'text',
                'title' => esc_html__('Btn Texr', 'bizmaster'),
                'default' => esc_html__('Get A Quote', 'bizmaster')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Project Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_two_btn_url',
                'type' => 'text',
                'title' => esc_html__('Btn Url', 'bizmaster'),
                'default' => esc_html__('#', 'bizmaster')
            ),
        )
    ));

    /* Header Style 03 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Three', 'bizmaster'),
        'id' => 'theme_header_three_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Navbar Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_three_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'bizmaster'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'bizmaster'), $allowed_html),
            ),
            
            array(
                'id' => 'header_three_phone_number',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'bizmaster'),
                'default' => esc_html__('(629) 555-0129', 'bizmaster'),
            ),
            array(
                'id' => 'header_three_email',
                'type' => 'text',
                'title' => esc_html__('Email', 'bizmaster'),
                'default' => esc_html__('info@example.com', 'bizmaster'),
            ),
            array(
                'id' => 'header_three_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'bizmaster'),
                'default' => esc_html__('6391 Elgin St. Celina, 10299', 'bizmaster'),
            ),
            array(
                'id' => 'header_three_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Btn text', 'bizmaster'),
                'default' => 'Get A Quote ',
            ),
            array(
                'id' => 'header_three_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Btn url', 'bizmaster'),
                'default' => esc_html__('#', 'bizmaster'),
            ),
            array(
                'id' => 'header_three_social_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Repeater', 'bizmaster'),
                'fields' => array(
                    array(
                        'id' => 'header_three_social_icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'bizmaster'),
                    ),
                    array(
                        'id' => 'header_three_social_url',
                        'type' => 'text',
                        'title' => esc_html__('Info URL', 'bizmaster'),
                        'default' => '#'
                    ),
                )
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Footer', 'bizmaster'),
        'id' => 'footer_options',
        'icon' => ' eicon-footer',
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_general_options',
        'title' => esc_html__('Footer One', 'bizmaster'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings One', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_shortcode',
                'type' => 'textarea',
                'title' => esc_html__('Footer Shortcode', 'bizmaster'),
                'shortcoder' => 'bizmaster_shortcodes'
            ),
			array(
                'id' => 'footer_one_bg_color',
                'title' => esc_html__('Footer Background Color', 'bizmaster'),
                'type' => 'color',
				'desc' => wp_kses(__('you can set <mark>overlay color</mark> for footer background image', 'bizmaster'), $allowed_html)
			),
			array(
                'id' => 'footer_one_bg_image',
                'type' => 'media',
                'title' => esc_html__('Footer Background Image', 'bizmaster'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> background image</mark> here it will overwrite customizer uploaded logo', 'bizmaster'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'bizmaster'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'bizmaster'), $allowed_html)
            ),
			array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Spacing Options', 'bizmaster') . '</h3>'
            ),
			array(
                'id' => 'footer_one_spacing_top',
                'title' => esc_html__('Page Spacing Top', 'bizmaster'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for footer area.', 'bizmaster'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 220,
            ),
			array(
				'id' => 'footer_one_spacing_right',
				'title' => esc_html__('Page Spacing Right', 'bizmaster'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>Padding Right</mark> for footer area.', 'bizmaster'), $allowed_html),
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'unit' => 'px',
				'default' => 0
			),
			array(
                'id' => 'footer_one_spacing_bottom',
                'title' => esc_html__('Page Spacing Bottom', 'bizmaster'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for footer area.', 'bizmaster'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 0,
            ),
			array(
				'id' => 'footer_one_spacing_left',
				'title' => esc_html__('Page Spacing Left', 'bizmaster'),
				'type' => 'slider',
				'desc' => wp_kses(__('you can set <mark>Padding Left</mark> for footer area.', 'bizmaster'), $allowed_html),
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'unit' => 'px',
				'default' => 0
			)
		)
	));

    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_two_options',
        'title' => esc_html__('Footer Two', 'bizmaster'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Top Settings', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_two_bg_image',
                'type' => 'media',
                'title' => esc_html__('Footer Background Image', 'bizmaster'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> background image</mark> here it will overwrite customizer uploaded logo', 'bizmaster'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_two_copyright_text',
                'title' => esc_html__('Footer Two Copyright Area Text', 'bizmaster'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'bizmaster'), $allowed_html)
            )
        )
    ));

    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_three_options',
        'title' => esc_html__('Footer Three', 'bizmaster'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Top Settings', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_three_bg_image',
                'type' => 'media',
                'title' => esc_html__('Footer Background Image', 'bizmaster'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> background image</mark> here it will overwrite customizer uploaded logo', 'bizmaster'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_three_copyright_text',
                'title' => esc_html__('Footer Two Copyright Area Text', 'bizmaster'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'bizmaster'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------------------------
          ** Blog  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_settings',
        'title' => esc_html__('Blog Settings', 'bizmaster'),
        'icon' => 'fa fa-book'
    ));

	CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_post_options',
        'title' => esc_html__('Blog Page', 'bizmaster'),
        'icon' => 'fa fa-list-ul',
        'fields' => Bizmaster_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'bizmaster'))
    ));

	CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_single_post_options',
        'title' => esc_html__('Blog Single Post', 'bizmaster'),
        'icon' => 'fa fa-list-alt',
        'fields' => Bizmaster_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'bizmaster'))
    ));

    /*-------------------------------------------------------
          ** Pages & templates Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'pages_and_template',
        'title' => esc_html__('Pages Settings', 'bizmaster'),
        'icon' => 'fa fa-files-o'
    ));

    /*  404 page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => '404_page',
        'title' => esc_html__('404 Page', 'bizmaster'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-exclamation-triangle',
        'fields' => array(
            array(
                'id' => 'error_bg_switch',
                'title' => esc_html__('404 Image Enable', 'bizmaster'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide 404 image', 'bizmaster'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'error_bg',
                'title' => esc_html__('404 Image', 'bizmaster'),
                'type' => 'media',
                'desc' => wp_kses(__('you can set <mark>image</mark> for 404 page', 'bizmaster'), $allowed_html),
                'dependency' => array('error_bg_switch', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('404 Page Options', 'bizmaster') . '</h3>',
            ),
						array(
								'id' => 'set_custom_breadcrumb_bg',
								'type' => 'switcher',
								'title' => esc_html__('Set Custom Breadcrumb Background', 'bizmaster'),
								'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page custom breadcrumb background options.', 'bizmaster'), $allowed_html),
								'text_on' => esc_html__('Yes', 'bizmaster'),
								'text_off' => esc_html__('No', 'bizmaster'),
								'default' => false
						),
						array(
								'id' => '404_breadcrumb_bg',
								'title' => esc_html__('Background Image', 'bizmaster'),
								'type' => 'background',
								'desc' => wp_kses(__('you can set <mark>background</mark> for page breadcrumb', 'bizmaster'), $allowed_html),
								'default' => array(
										'background-size' => 'cover',
										'background-position' => 'center center',
										'background-repeat' => 'no-repeat',
								),
								'background_color' => false,
								'dependency' => array('set_custom_breadcrumb_bg', '==', 'true')
						),
						array(
								'id' => '404_breadcrumb_bg_color',
								'title' => esc_html__('Breadcrumb Background Color', 'bizmaster'),
								'type' => 'color',
								'default' => '#ebf3ee',
								'desc' => wp_kses(__('you can set <mark>overlay color</mark> for page breadcrumb background image', 'bizmaster'), $allowed_html),
								'dependency' => array('set_custom_breadcrumb_bg', '==', 'true')
						),
						array(
                'id' => '404_bg_color',
                'type' => 'color',
                'title' => esc_html__('Page Background Color', 'bizmaster'),
                'default' => '#ffffff'
            ),
            array(
                'id' => '404_title',
                'title' => esc_html__('Title', 'bizmaster'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>title</mark> of 404 page', 'bizmaster'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'bizmaster'))
            ),
            array(
                'id' => '404_paragraph',
                'title' => esc_html__('Paragraph', 'bizmaster'),
                'type' => 'textarea',
                'info' => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'bizmaster'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'bizmaster'))
            ),
            array(
                'id' => '404_button_text',
                'title' => esc_html__('Button Text', 'bizmaster'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'bizmaster'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('back to home', 'bizmaster'))
            ),
            array(
                'id' => '404_spacing_top',
                'title' => esc_html__('Page Spacing Top', 'bizmaster'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'bizmaster'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
            array(
                'id' => '404_spacing_bottom',
                'title' => esc_html__('Page Spacing Bottom', 'bizmaster'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'bizmaster'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
        )
    ));

    /*  blog page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_page',
        'title' => esc_html__('Blog Page', 'bizmaster'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Bizmaster_Group_Fields::page_layout_options(esc_html__('Blog', 'bizmaster'), 'blog')
    ));

    /*  archive page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'archive_page',
        'title' => esc_html__('Archive Page', 'bizmaster'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-archive',
        'fields' => Bizmaster_Group_Fields::page_layout_options(esc_html__('Archive', 'bizmaster'), 'archive')
    ));

    /*  search page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'search_page',
        'title' => esc_html__('Search Page', 'bizmaster'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-search',
        'fields' => Bizmaster_Group_Fields::page_layout_options(esc_html__('Search', 'bizmaster'), 'search')
    ));

    /*-------------------------------------------------------
           ** Backup  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'backup',
        'title' => esc_html__('Import / Export', 'bizmaster'),
        'icon' => 'eicon-export-kit',
        'fields' => array(
            array(
                'type' => 'notice',
                'style' => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'bizmaster'),
            ),
            array(
                'type' => 'backup',
                'title' => esc_html__('Backup & Import', 'bizmaster')
            )
        )
    ));
}
