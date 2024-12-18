<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bizmaster
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package bizmaster
 * @since 1.0.0
 */

define('BIZMASTER_THEME_ROOT', get_template_directory());
define('BIZMASTER_THEME_ROOT_URL', get_template_directory_uri());
define('BIZMASTER_INC', BIZMASTER_THEME_ROOT . '/inc');
define('BIZMASTER_THEME_SETTINGS', BIZMASTER_INC . '/theme-settings');
define('BIZMASTER_THEME_SETTINGS_IMAGES', BIZMASTER_THEME_ROOT_URL . '/inc/theme-settings/images');
define('BIZMASTER_TGMA', BIZMASTER_INC . '/plugins/tgma');
define('BIZMASTER_DYNAMIC_STYLESHEETS', BIZMASTER_INC . '/theme-stylesheets');
define('BIZMASTER_CSS', BIZMASTER_THEME_ROOT_URL . '/assets/css');
define('BIZMASTER_JS', BIZMASTER_THEME_ROOT_URL . '/assets/js');
define('BIZMASTER_ASSETS', BIZMASTER_THEME_ROOT_URL . '/assets');
define('BIZMASTER_DEV', true);


/**
 * Theme Initial File
 * @package bizmaster
 * @since 1.0.0
 */
if (file_exists(BIZMASTER_INC . '/theme-init.php')) {
    require_once BIZMASTER_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package bizmaster
 * @since 1.0.0
 */
if (file_exists(BIZMASTER_INC . '/theme-cs-function.php')) {
    require_once BIZMASTER_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package bizmaster
 * @since 1.0.0
 */
if (file_exists(BIZMASTER_INC . '/theme-helper-functions.php')) {

    require_once BIZMASTER_INC . '/theme-helper-functions.php';
    if (!function_exists('bizmaster')) {
        function bizmaster()
        {
            return class_exists('Bizmaster_Helper_Functions') ? new Bizmaster_Helper_Functions() : false;
        }
    }
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
    function bizmaster_theme_fallback_menu()
    {
        get_template_part('template-parts/default', 'menu');
    }
}

