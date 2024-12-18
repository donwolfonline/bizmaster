<?php
/**
 *Theme Group Fields
 * @package bizmaster
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}


if (!class_exists('Bizmaster_Group_Fields')) {

    class Bizmaster_Group_Fields
    {
        
        /**
         * $instance
         * @since 1.0.0
         */
        private static $instance;


        /**
         * construct()
         * @since 1.0.0
         */
        public function __construct()
        {

        }

        /**
         * getInstance()
         * @since 1.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout()
        {
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => esc_html__('Page Layouts & Colors Options', 'bizmaster'),
                ),
                array(
                    'id' => 'page_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'bizmaster'),
                    'options' => array(
                        'default' => BIZMASTER_THEME_SETTINGS_IMAGES . '/page/default.png',
                        'left-sidebar' => BIZMASTER_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'right-sidebar' => BIZMASTER_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'blank' => BIZMASTER_THEME_SETTINGS_IMAGES . '/page/blank.png',
                    ),
                    'default' => 'default'
                ),
                array(
                    'id' => 'page_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'bizmaster'),
                    'default' => '#ffffff'
                ),
                array(
                    'id' => 'page_content_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Background Color', 'bizmaster'),
                    'default' => '#ffffff'
                ),
                array(
                    'id' => 'page_content_text_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Text Color', 'bizmaster'),
                    'default' => '#5f5f5f'
                )

            );

            return $fields;
        }

        /**
         * Page container options
         * @since 1.0.0
         */
        public static function Page_Container_Options($type)
        {
            $fields = array();
            $allowed_html = bizmaster()->kses_allowed_html(array('mark'));
            if ('header_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Header, Footer & Breadcrumb Options', 'bizmaster'),
                    ),
                    array(
                        'id' => 'page_title',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Title', 'bizmaster'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page title.', 'bizmaster'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'bizmaster'),
                        'text_off' => esc_html__('No', 'bizmaster'),
                        'default' => true
                    ),
                    array(
                        'id' => 'page_breadcrumb',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Breadcrumb', 'bizmaster'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page breadcrumb.', 'bizmaster'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'bizmaster'),
                        'text_off' => esc_html__('No', 'bizmaster'),
                        'default' => true
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
												'id' => 'page_breadcrumb_bg',
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
												'id' => 'page_breadcrumb_bg_color',
												'title' => esc_html__('Breadcrumb Background Color', 'bizmaster'),
												'type' => 'color',
												'default' => '#ebf3ee',
												'desc' => wp_kses(__('you can set <mark>overlay color</mark> for page breadcrumb background image', 'bizmaster'), $allowed_html),
												'dependency' => array('set_custom_breadcrumb_bg', '==', 'true')
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
                        'desc' => wp_kses(__('you can set <mark>navbar type</mark> transparent type or solid background.', 'bizmaster'), $allowed_html),
                    ),
                    array(
                        'id' => 'footer_type',
                        'title' => esc_html__('Footer Type', 'bizmaster'),
                        'type' => 'image_select',
                        'options' => array(
                            'default' => BIZMASTER_THEME_SETTINGS_IMAGES . '/footer/01.png',
                            'style-01' => BIZMASTER_THEME_SETTINGS_IMAGES . '/footer/02.png',
                            'style-02' => BIZMASTER_THEME_SETTINGS_IMAGES . '/footer/03.png',
                        ),
                        'default' => 'default',
                        'desc' => wp_kses(__('you can set <mark>footer type</mark> transparent type or solid background.', 'bizmaster'), $allowed_html),
                    ),

                );
            } elseif ('container_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Width & Padding Options', 'bizmaster'),
                    ),
                    array(
                        'id' => 'page_container',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Full Width', 'bizmaster'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page container full width.', 'bizmaster'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'bizmaster'),
                        'text_off' => esc_html__('No', 'bizmaster'),
                        'default' => false
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Spacing Options', 'bizmaster'),
                    ),
                    array(
                        'id' => 'page_spacing_top',
                        'title' => esc_html__('Page Spacing Top', 'bizmaster'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page container.', 'bizmaster'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'id' => 'page_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'bizmaster'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page container.', 'bizmaster'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Content Spacing Options', 'bizmaster'),
                    ),
                    array(
                        'id' => 'page_content_spacing',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Content Spacing', 'bizmaster'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page content spacing.', 'bizmaster'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'bizmaster'),
                        'text_off' => esc_html__('No', 'bizmaster'),
                        'default' => false
                    ),
                    array(
                        'id' => 'page_content_spacing_top',
                        'title' => esc_html__('Page Spacing Top', 'bizmaster'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'bizmaster'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'bizmaster'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'bizmaster'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_left',
                        'title' => esc_html__('Page Spacing Left', 'bizmaster'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Left</mark> for page content area.', 'bizmaster'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_right',
                        'title' => esc_html__('Page Spacing Right', 'bizmaster'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Right</mark> for page content area.', 'bizmaster'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                );
            }

            return $fields;
        }


        /**
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout_options($title, $prefix)
        {
            $allowed_html = bizmaster()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Page Options', 'bizmaster') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'bizmaster'),
                    'options' => array(
                        'right-sidebar' => BIZMASTER_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'left-sidebar' => BIZMASTER_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'no-sidebar' => BIZMASTER_THEME_SETTINGS_IMAGES . '/page/no-sidebar.png',
                    ),
                    'default' => 'right-sidebar'
                ),
								array(
										'id' => $prefix . '_set_custom_breadcrumb_bg',
										'type' => 'switcher',
										'title' => esc_html__('Set Custom Breadcrumb Background', 'bizmaster'),
										'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page custom breadcrumb background options.', 'bizmaster'), $allowed_html),
										'text_on' => esc_html__('Yes', 'bizmaster'),
										'text_off' => esc_html__('No', 'bizmaster'),
										'default' => false
								),
								array(
										'id' => $prefix . '_breadcrumb_bg_color',
										'title' => esc_html__('Breadcrumb Background Color', 'bizmaster'),
										'type' => 'color',
										'default' => '#ebf3ee',
										'desc' => wp_kses(__('you can set <mark>overlay color</mark> for breadcrumb background image', 'bizmaster'), $allowed_html),
										'dependency' => array($prefix . '_set_custom_breadcrumb_bg', '==', 'true')
								),
								array(
										'id' => $prefix . '_breadcrumb_bg',
										'title' => esc_html__('Breadcrumb Background Image', 'bizmaster'),
										'type' => 'background',
										'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'bizmaster'), $allowed_html),
										'default' => array(
												'background-size' => 'cover',
												'background-position' => 'center bottom',
												'background-repeat' => 'no-repeat',
										),
										'background_color' => false,
										'dependency' => array($prefix . '_set_custom_breadcrumb_bg', '==', 'true')
								),
								array(
                    'id' => $prefix . '_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'bizmaster'),
                    'default' => '#fff'
                ),
                array(
                    'id' => $prefix . '_spacing_top',
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
                    'id' => $prefix . '_spacing_bottom',
                    'title' => esc_html__('Page Spacing Bottom', 'bizmaster'),
                    'type' => 'slider',
                    'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'bizmaster'), $allowed_html),
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'unit' => 'px',
                    'default' => 120,
                ),
            );
						
						
						
						
						
						
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
						
						
						
						
						
						
						

            return $fields;
        }

        /**
         * Post meta
         * @since 1.0.0
         */
        public static function post_meta($prefix, $title)
        {
            $allowed_html = bizmaster()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Post Options', 'bizmaster') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_posted_by',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted By', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted by.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                ),
								array(
                    'id' => $prefix . '_posted_on',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted On', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted on.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                )
						);

            if ('blog_post' == $prefix) {

								$fields[] = array(
										'id' => $prefix . '_comments_count',
										'type' => 'switcher',
										'title' => esc_html__('Comments Count', 'bizmaster'),
										'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide comments count.', 'bizmaster'), $allowed_html),
										'text_on' => esc_html__('Yes', 'bizmaster'),
										'text_off' => esc_html__('No', 'bizmaster'),
										'default' => true
								);

								$fields[] = array(
										'id' => $prefix . '_posted_cat',
										'type' => 'switcher',
										'title' => esc_html__('Posted Category', 'bizmaster'),
										'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'bizmaster'), $allowed_html),
										'text_on' => esc_html__('Yes', 'bizmaster'),
										'text_off' => esc_html__('No', 'bizmaster'),
										'default' => true
								);

                $fields[] = array(
                    'id' => $prefix . '_readmore_btn',
                    'type' => 'switcher',
                    'title' => esc_html__('Read More Button', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide read more button.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                );

                $fields[] = array(
                    'id' => $prefix . '_readmore_btn_text',
                    'type' => 'text',
                    'title' => esc_html__('Read More Text', 'bizmaster'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'bizmaster'), $allowed_html),
                    'default' => esc_html__('Read More', 'bizmaster'),
                    'dependency' => array($prefix . '_readmore_btn', '==', 'true')
                );

                $fields[] = array(
                    'id' => $prefix . '_excerpt_more',
                    'type' => 'text',
                    'title' => esc_html__('Excerpt More', 'bizmaster'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'bizmaster'), $allowed_html),
                    'attributes' => array(
                        'placeholder' => esc_html__('....', 'bizmaster')
                    )
                );

                $fields[] = array(
                    'id' => $prefix . '_excerpt_length',
                    'type' => 'select',
                    'options' => array(
                        '25' => esc_html__('Short', 'bizmaster'),
                        '55' => esc_html__('Regular', 'bizmaster'),
                        '100' => esc_html__('Long', 'bizmaster'),
                    ),
                    'title' => esc_html__('Excerpt Length', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark> excerpt length</mark> for post.', 'bizmaster'), $allowed_html),
                );
            } elseif ('blog_single_post' == $prefix) {

                $fields[] = array(
                    'id' => $prefix . '_posted_category',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Category', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                );

                $fields[] = array(
                    'id' => $prefix . '_posted_tag',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Tags', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post tags.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                );

                $fields[] = array(
                    'id' => $prefix . '_posted_share',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Share', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post share.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                );

                $fields[] = array(
                    'id' => $prefix . '_post_navigation',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Navigation', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post navigation.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                );

								$fields[] = array(
                    'id' => $prefix . '_author_bio',
                    'type' => 'switcher',
                    'title' => esc_html__('Author Bio', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide author bio button.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                );

                $fields[] = array(
                    'id' => $prefix . '_get_related_post',
                    'type' => 'switcher',
                    'title' => esc_html__('Get Related Post', 'bizmaster'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide get related post button.', 'bizmaster'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'bizmaster'),
                    'text_off' => esc_html__('No', 'bizmaster'),
                    'default' => true
                );
						}

            return $fields;
        }

    } //end class

} //end if
