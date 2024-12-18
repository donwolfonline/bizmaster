<?php

/**
 * Theme Init Functions
 * @package bizmaster
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('Bizmaster_Init')) {

    class Bizmaster_Init
    {
        /**
         * $instance
         * @since 1.0.0
         */
        protected static $instance;

        public function __construct()
        {
            /*
             * theme setup
             */
            add_action('after_setup_theme', array($this, 'theme_setup'));
            /**
             * Widget Init
             */
            add_action('widgets_init', array($this, 'theme_widgets_init'));
            /**
             * Theme Assets
             */
            add_action('wp_enqueue_scripts', array($this, 'theme_assets'));
            /**
             * Registers an editor stylesheet for the theme.
             */
            add_action('admin_init', array($this, 'add_editor_styles'));
        }

        /**
         * getInstance()
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Theme Setup
         * @since 1.0.0
         */
        public function theme_setup()
        {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             */
            load_theme_textdomain('bizmaster', get_template_directory() . '/languages');

            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            /*
             * Let WordPress manage the document title.
             */
            add_theme_support('title-tag');

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(array(
                'main-menu' => esc_html__('Primary Menu', 'bizmaster'),
                'footer-menu' => esc_html__('Footer Menu', 'bizmaster'),
            ));

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));

            // Add theme support for selective wp block styles
            add_theme_support("wp-block-styles");
            // Add theme support for selective align wide
            add_theme_support("align-wide");
            // Add theme support for selective responsive embeds
            add_theme_support("responsive-embeds");

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');

            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support('custom-logo', array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            ));

            //woocommerce support
            add_theme_support('woocommerce');
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');


            //add theme support for post format
            add_theme_support('post-formats', array('image', 'video', 'gallery', 'link', 'quote'));

            // This variable is intended to be overruled from themes.
            $GLOBALS['content_width'] = apply_filters('bizmaster_content_width', 740);

            //add image sizes
            add_image_size('bizmaster_classic', 750, 400, true);
            add_image_size('bizmaster_grid_service_1', 414, 228, true);
            add_image_size('project-image-2', 640, 560, true);


            self::load_theme_dependency_files();
        }

        /**
         * Theme Widget Init
         * @since 1.0.0
         * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
         */
        public function theme_widgets_init()
        {
            register_sidebar(array(
                'name' => esc_html__('Sidebar', 'bizmaster'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Add widgets here.', 'bizmaster'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-headline style-01">',
                'after_title' => '</h4>',
            ));
            if (bizmaster()->is_bizmaster_core_active()) {
                register_sidebar(array(
                    'name' => esc_html__('Service Sidebar', 'bizmaster'),
                    'id' => 'service-sidebar',
                    'description' => esc_html__('Add widgets here.', 'bizmaster'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-headline style-01">',
                    'after_title' => '</h4>',
                ));
            }
            if (bizmaster()->is_bizmaster_core_active()) {
                register_sidebar(array(
                    'name' => esc_html__('Product Sidebar', 'bizmaster'),
                    'id' => 'product-sidebar',
                    'description' => esc_html__('Add widgets here.', 'bizmaster'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-headline style-01">',
                    'after_title' => '</h4>',
                ));
            }
            register_sidebar(array(
                'name' => esc_html__('Footer Widget Area', 'bizmaster'),
                'id' => 'footer-widget',
                'description' => esc_html__('Add widgets here.', 'bizmaster'),
                'before_widget' => '<div class="col-lg-4 col-md-6"><div id="%1$s" class="widget footer-widget %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<h4 class="widget-headline">',
                'after_title' => '</h4>',
            ));
            register_sidebar(array(
                'name' => esc_html__('Footer Widget Area Two', 'bizmaster'),
                'id' => 'footer-widget-two',
                'description' => esc_html__('Add widgets here.', 'bizmaster'),
                'before_widget' => '<div class="col-lg-3 col-md-6"><div id="%1$s" class="widget footer-widget %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<h4 class="widget-headline">',
                'after_title' => '</h4>',
            ));
            register_sidebar(array(
                'name' => esc_html__('Footer Widget Area Three', 'bizmaster'),
                'id' => 'footer-widget-three',
                'description' => esc_html__('Add widgets here.', 'bizmaster'),
                'before_widget' => '<div class="col-lg-3 col-md-6"><div id="%1$s" class="widget footer-widget %2$s">',
                'after_widget' => '</div></div>',
                'before_title' => '<h4 class="widget-headline">',
                'after_title' => '</h4>',
            ));
        }

        /**
         * Theme Assets
         * @since 1.0.0
         */
        public function theme_assets()
        {
            self::load_theme_css();
            self::load_theme_js();
        }

        /*
       * Load theme options google fonts css
       * @since 1.0.0
       */
        public static function load_google_fonts()
        {

            $enqueue_fonts = [];
			//body font enqueue
			$body_font_array = [];
			$body_font = cs_get_option('_body_font') ? cs_get_option('_body_font') : false;
			if ($body_font) {
				$body_font_array['family'] = (isset($body_font['font-family']) && !empty($body_font['font-family'])) ? $body_font['font-family'] : 'Inter';
				$body_font_array['font'] = (isset($body_font['type']) && !empty($body_font['type'])) ? $body_font['type'] : 'google';
				$body_font_array['style'] = (isset($body_font['font-style']) && !empty($body_font['font-style'])) ? $body_font['font-style'] : '';
				$body_font_weight = (isset($body_font['font-weight']) && !empty($body_font['font-weight'])) ? $body_font['font-weight'] : 400;
				$body_font_array['weight'] = ($body_font_weight != 'normal') ? $body_font_weight : 400;
				$body_font_variant = cs_get_option('body_font_variant') ? cs_get_option('body_font_variant') : false;
				$body_font_variants = !empty($body_font_variant) ? $body_font_variant : [400, 500, 600, 700];
				$body_font_variants[] = $body_font_array['weight'];
				$body_font_variants = array_unique($body_font_variants);
			} else {
				$body_font_array['family'] = 'Inter';
				$body_font_array['font'] = 'google';
				$body_font_array['style'] = '';
				$body_font_variant = cs_get_option('body_font_variant') ? cs_get_option('body_font_variant') : false;
				$body_font_variants = !empty($body_font_variant) ? $body_font_variant : [400, 500, 600, 700];
			}

			$google_fonts = [];
			if (!empty($body_font_variants)) {
                foreach ($body_font_variants as $variant) {
					$google_fonts[] = array(
						'family' => $body_font_array['family'],
						'variant' => $variant,
						'style' => $body_font_array['style'],
						'font' => $body_font_array['font']
					);
				}
			}

			//heading font enqueue
			$heading_font_enable = false;
			if (null == cs_get_option('heading_font_enable')) {
                $heading_font_enable = true;
            } elseif ('0' == cs_get_option('heading_font_enable')) {
                $heading_font_enable = false;
            } elseif ('1' == cs_get_option('heading_font_enable')) {
                $heading_font_enable = true;
            }

			$heading_font_array = [];
			if ($heading_font_enable) {
				$heading_font = cs_get_option('heading_font') ? cs_get_option('heading_font') : false;
				$heading_font_array['family'] = (isset($heading_font['font-family']) && !empty($heading_font['font-family'])) ? $heading_font['font-family'] : 'Inter';
				$heading_font_array['font'] = (isset($heading_font['type']) && !empty($heading_font['type'])) ? $heading_font['type'] : 'google';
				$heading_font_array['style'] = (isset($heading_font['font-style']) && !empty($heading_font['font-style'])) ? $heading_font['font-style'] : '';
				$heading_font_weight = (isset($heading_font['font-weight']) && !empty($heading_font['font-weight'])) ? $heading_font['font-weight'] : 400;
				$heading_font_array['weight'] = ($heading_font_weight != 'normal') ? $heading_font_weight : 400;
				$heading_font_variant = cs_get_option('heading_font_variant') ? cs_get_option('heading_font_variant') : false;
				$heading_font_variants = !empty($heading_font_variant) ? $heading_font_variant : [400, 500, 600, 700];
				$heading_font_variants[] = $heading_font_array['weight'];
				$heading_font_variants = array_unique($heading_font_variants);
			} else {
				$heading_font_array['family'] = 'Inter';
				$heading_font_array['font'] = 'google';
				$heading_font_array['style'] = '';
				$heading_font_variant = cs_get_option('heading_font_variant') ? cs_get_option('heading_font_variant') : false;
				$heading_font_variants = !empty($heading_font_variant) ? $heading_font_variant : [400, 500, 600, 700];
			}

			if (!empty($heading_font_variants)) {
                foreach ($heading_font_variants as $variant) {
                    $google_fonts[] = array(
                        'family' => $heading_font_array['family'],
                        'variant' => $variant,
						'style' => $heading_font_array['style'],
						'font' => $heading_font_array['font']
                    );
                }
            }

			if (!empty($google_fonts)) {
                foreach ($google_fonts as $font) {
                    if (!empty($font['font']) && $font['font'] == 'google') {
                        $variant = (!empty($font['variant']) && $font['variant'] !== 'regular') ? ':' . $font['variant'] : 400;
						if (!empty($font['family'])) {
                            $enqueue_fonts[] = $font['family'] . $variant;
							if (!empty($font['style'])) {
								$enqueue_fonts[] = $font['family'] . $variant . $font['style'];
							}
						}
                    }
                }
            }

            $enqueue_fonts = array_unique($enqueue_fonts);
            return $enqueue_fonts;
        }

        /**
         * Load Theme Css
         * @since 1.0.0
         */
        public function load_theme_css()
        {
            $theme_version = BIZMASTER_DEV ? time() : bizmaster()->get_theme_info('version');
            $css_ext = '.css';
            //load google fonts
            $enqueue_google_fonts = self::load_google_fonts();

			if (!empty($enqueue_google_fonts)) {
                wp_enqueue_style('bizmaster-google-fonts', esc_url(add_query_arg('family', urlencode(implode('|', $enqueue_google_fonts)), '//fonts.googleapis.com/css?display=swap')), array(), null);
            }

            $all_css_files = array(
                array(
                    'handle' => 'animate',
                    'src' => BIZMASTER_CSS . '/animate.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'bootstrap',
                    'src' => BIZMASTER_CSS . '/bootstrap.min.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'font-awesome',
                    'src' => BIZMASTER_CSS . '/font-awesome.min.css',
                    'deps' => array(),
                    'ver' => '5.12.0',
                    'media' => 'all',
                ),
                array(
                    'handle' => 'magnific-popup',
                    'src' => BIZMASTER_CSS . '/magnific-popup.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'master-css',
                    'src' => BIZMASTER_CSS . '/master' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'bizmaster-main-style',
                    'src' => BIZMASTER_CSS . '/main-style' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'bizmaster-responsive',
                    'src' => BIZMASTER_CSS . '/responsive' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
            );
            if (class_exists('WooCommerce')) {
                $all_css_files[] = array(
                    'handle' => 'bizmaster-woocommerce-style',
                    'src' => BIZMASTER_CSS . '/woocommerce-style' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                );
            }
            $all_css_files = apply_filters('bizmaster_theme_enqueue_style', $all_css_files);

            if (is_array($all_css_files) && !empty($all_css_files)) {
                foreach ($all_css_files as $css) {
                    call_user_func_array('wp_enqueue_style', $css);
                }
            }
            wp_enqueue_style('bizmaster-style', get_stylesheet_uri());

            if (bizmaster()->is_bizmaster_core_active()) {
                if (file_exists(BIZMASTER_DYNAMIC_STYLESHEETS . '/theme-inline-css-style.php')) {
                    require_once BIZMASTER_DYNAMIC_STYLESHEETS . '/theme-inline-css-style.php';
                    require_once BIZMASTER_DYNAMIC_STYLESHEETS . '/theme-option-css-style.php';
                    wp_add_inline_style('bizmaster-style', bizmaster()->minify_css_lines($GLOBALS['bizmaster_inline_css']));
                    wp_add_inline_style('bizmaster-style', bizmaster()->minify_css_lines($GLOBALS['theme_customize_css']));
                }
            }
        }

        /**
         * Load Theme js
         * @since 1.0.0
         */
        public function load_theme_js()
        {

            // all js files
            wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.5.9', true);
            wp_enqueue_script('fontawesome', get_template_directory_uri() . '/assets/js/fontawesome.min.js', array('jquery'), '1.5.9', true);
            wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), '1.6.2', true);
            wp_enqueue_script('preloader', get_template_directory_uri() . '/assets/js/preloader.js', array('jquery'), '1.1.3', true);
            wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.1.3', true);
            wp_enqueue_script('marquee', get_template_directory_uri() . '/assets/js/jquery.marquee.min.js', array('jquery'), '1.1.3', true);
            wp_enqueue_script('Progressbar', get_template_directory_uri() . '/assets/js/jQuery.rProgressbar.min.js', array('jquery'), '4.0.1', true);
            wp_enqueue_script('bizmaster-main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), time(), true);

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        }

        /**
         * Load THeme Dependency Files
         * @since 1.0.0
         */
        public function load_theme_dependency_files()
        {
            $includes_files = array(
                array(
                    'file-name' => 'activation',
                    'file-path' => BIZMASTER_TGMA
                ),
                array(
                    'file-name' => 'theme-breadcrumb',
                    'file-path' => BIZMASTER_INC
                ),
                array(
                    'file-name' => 'theme-excerpt',
                    'file-path' => BIZMASTER_INC
                ),
                array(
                    'file-name' => 'theme-hook-customize',
                    'file-path' => BIZMASTER_INC
                ),
                array(
                    'file-name' => 'theme-comments-modifications',
                    'file-path' => BIZMASTER_INC
                ),
                array(
                    'file-name' => 'customizer',
                    'file-path' => BIZMASTER_INC
                ),
                array(
                    'file-name' => 'theme-group-fields-cs',
                    'file-path' => BIZMASTER_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-group-fields-value-cs',
                    'file-path' => BIZMASTER_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-metabox-cs',
                    'file-path' => BIZMASTER_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-userprofile-cs',
                    'file-path' => BIZMASTER_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-shortcode-option-cs',
                    'file-path' => BIZMASTER_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-customizer-cs',
                    'file-path' => BIZMASTER_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-option-cs',
                    'file-path' => BIZMASTER_THEME_SETTINGS
                ),
            );

            if (class_exists('WooCommerce')) {
                $includes_files[] = array(
                    'file-name' => 'theme-woocommerce-customize',
                    'file-path' => BIZMASTER_INC
                );
            }

            if (is_array($includes_files) && !empty($includes_files)) {
                foreach ($includes_files as $file) {
                    if (file_exists($file['file-path'] . '/' . $file['file-name'] . '.php')) {
                        require_once $file['file-path'] . '/' . $file['file-name'] . '.php';
                    }
                }
            }
        }

        /**
         * Add editor style
         * @since 1.0.0
         */
        public function add_editor_styles()
        {
            add_editor_style(get_template_directory_uri() . '/assets/css/editor-style.css');
        }
    } //end class
    if (class_exists('Bizmaster_Init')) {
        Bizmaster_Init::getInstance();
    }
}
