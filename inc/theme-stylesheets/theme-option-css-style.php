<?php

/**
 * Theme Options Style
 * @package bizmaster
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
$bizmaster = bizmaster();
global $theme_customize_css;
$theme_customize_css = '';

ob_start();

/*--------------------------------
    Typography
--------------------------------*/

/* body font */
$body_font = cs_get_option('_body_font') ? cs_get_option('_body_font') : false;
$body_font_variant = cs_get_option('body_font_variant') ? cs_get_option('body_font_variant') : false;
$body_font['family'] = (isset($body_font['font-family']) && !empty($body_font['font-family'])) ? $body_font['font-family'] : 'Inter';
$body_font['weight'] = (isset($body_font['font-weight']) && !empty($body_font['font-weight'])) ? $body_font['font-weight'] : '500';
$body_font['size'] = (isset($body_font['font-size']) && !empty($body_font['font-size'])) ? $body_font['font-size'] : '16px';
$body_font['style'] = (isset($body_font['font-style']) && !empty($body_font['font-style'])) ? $body_font['font-style'] : 'normal';

$typography_css = $bizmaster->generate_css_code([
    'font-family' => $body_font['family'] . ', sans-serif'
], 'html,body');

$typography_css .= $bizmaster->generate_css_code([
    'font-size' => $bizmaster->sanitize_px($body_font['size']),
	'font-style' => $body_font['style'],
	'font-weight' => $body_font['weight']
], 'p,body');
$typography_css .= $bizmaster->generate_css_code([
    '--body-font' => $body_font['family'] . ', sans-serif'
], ':root');

echo <<<CSS
{$typography_css}
CSS;

/* heading font */
$heading_font_enable = false;
if (null == cs_get_option('heading_font_enable')) {
    $heading_font_enable = false;
} elseif ('0' == cs_get_option('heading_font_enable')) {
    $heading_font_enable = true;
} elseif ('1' == cs_get_option('heading_font_enable')) {
    $heading_font_enable = false;
}
$heading_font = cs_get_option('heading_font') ? cs_get_option('heading_font') : false;
$heading_font_variant = cs_get_option('heading_font_variant') ? cs_get_option('heading_font_variant') : false;
$heading_font['family'] = (isset($heading_font['font-family']) && !empty($heading_font['font-family'])) ? $heading_font['font-family'] : 'Inter';
$heading_font['weight'] = (isset($heading_font['font-weight']) && !empty($heading_font['font-weight'])) ? $heading_font['font-weight'] : '700';
$heading_font['style'] = (isset($heading_font['font-style']) && !empty($heading_font['font-style'])) ? $heading_font['font-style'] : 'normal';

$heading_font_css = $bizmaster->generate_css_code([
    'font-family' => $heading_font['family'] . ', sans-serif',
	'font-style' => $heading_font['style'],
    'font-weight' => $heading_font['weight']
], [
    'h1',
    'h2',
    'h3',
    'h4',
    'h5',
    'h6'
]);

$heading_font_css .= $bizmaster->generate_css_code([
    '--heading-font' => $heading_font['family'] . ', sans-serif'
], ':root');

$body_font_css = $bizmaster->generate_css_code([
    '--heading-font' => $body_font['family'] . ', sans-serif'
], ':root');

if (!$heading_font_enable) {
    echo <<<CSS
  {$heading_font_css}
CSS;
} else {
    echo <<<CSS
    {$body_font_css}
CSS;
}


/*---------------------------------
	Main Color
---------------------------------*/
$main_color = cs_get_customize_option('main_color');
$main_color_two = cs_get_customize_option('main_color_two');
$secondary_color = cs_get_customize_option('secondary_color');
$heading_color = cs_get_customize_option('heading_color');
$paragraph_color = cs_get_customize_option('paragraph_color');

$root_color_css = $bizmaster->generate_css_code([
    '--main-color-one' => $main_color,
    '--main-color-two' => $main_color_two,
    '--secondary-color' => $secondary_color,
    '--heading-color' => $heading_color,
    '--paragraph-color' => $paragraph_color
], ":root");

echo <<<CSS
{$root_color_css}
CSS;


/*---------------------------------
	Preloader
---------------------------------*/
$preloader_bg_color = cs_get_option('preloader_bg_color');
$preloader_css = $bizmaster->generate_css_code([
    'background-color' => $preloader_bg_color
], '.preloader');
echo <<<CSS
	{$preloader_css}
CSS;

/*---------------------------------
	Breadcrumb
---------------------------------*/
$breadcrumb_bg = cs_get_option('breadcrumb_bg');
$breadcrumb_bg_image = isset($breadcrumb_bg['background-image']['url']) && !empty($breadcrumb_bg['background-image']['url']) ? $breadcrumb_bg['background-image']['url'] : '';
$breadcrumb_bg_image_size = isset($breadcrumb_bg['background-size']) && !empty($breadcrumb_bg['background-size']) ? $breadcrumb_bg['background-size'] : 'cover';
$breadcrumb_bg_image_position = isset($breadcrumb_bg['background-position']) && !empty($breadcrumb_bg['background-position']) ? $breadcrumb_bg['background-position'] : 'center center';
$breadcrumb_bg_image_repeat = isset($breadcrumb_bg['background-repeat']) && !empty($breadcrumb_bg['background-repeat']) ? $breadcrumb_bg['background-repeat'] : 'no-repeat';
$breadcrumb_bg_image_attachment = isset($breadcrumb_bg['background-attachment']) && !empty($breadcrumb_bg['background-attachment']) ? $breadcrumb_bg['background-attachment'] : 'scroll';
$breadcrumb_bg_color = cs_get_option('breadcrumb_bg_color');

$check_is_page = (!is_home() && !is_front_page() && is_singular(array('page', 'post', 'service', 'project', 'team'))) ? true : false;
if($check_is_page) {
	$page_header_meta = Bizmaster_Group_Fields_Value::page_container('bizmaster', 'header_options');
	if(isset($page_header_meta['custom_breadcrumb_bg']) && $page_header_meta['custom_breadcrumb_bg'] == true) {

		$breadcrumb_bg_image = isset($page_header_meta['background-image']['url']) && !empty($page_header_meta['background-image']['url']) ? $page_header_meta['background-image']['url'] : '';
		$breadcrumb_bg_image_size = isset($page_header_meta['background-size']) && !empty($page_header_meta['background-size']) ? $page_header_meta['background-size'] : 'cover';
		$breadcrumb_bg_image_position = isset($page_header_meta['background-position']) && !empty($page_header_meta['background-position']) ? $page_header_meta['background-position'] : 'center center';
		$breadcrumb_bg_image_repeat = isset($page_header_meta['background-repeat']) && !empty($page_header_meta['background-repeat']) ? $page_header_meta['background-repeat'] : 'no-repeat';
		$breadcrumb_bg_image_attachment = isset($page_header_meta['background-attachment']) && !empty($page_header_meta['background-attachment']) ? $page_header_meta['background-attachment'] : 'scroll';
		$breadcrumb_bg_color = isset($page_header_meta['background-color']) && !empty($page_header_meta['background-color']) ? $page_header_meta['background-color'] : $breadcrumb_bg_color;
	}
} elseif (is_home()) {

	$page_header_meta = Bizmaster_Group_Fields_Value::page_layout_options('blog');
	if(isset($page_header_meta['custom_breadcrumb_bg']) && $page_header_meta['custom_breadcrumb_bg'] == true) {

		$breadcrumb_bg_image = isset($page_header_meta['background-image']['url']) && !empty($page_header_meta['background-image']['url']) ? $page_header_meta['background-image']['url'] : '';
		$breadcrumb_bg_image_size = isset($page_header_meta['background-size']) && !empty($page_header_meta['background-size']) ? $page_header_meta['background-size'] : 'cover';
		$breadcrumb_bg_image_position = isset($page_header_meta['background-position']) && !empty($page_header_meta['background-position']) ? $page_header_meta['background-position'] : 'center center';
		$breadcrumb_bg_image_repeat = isset($page_header_meta['background-repeat']) && !empty($page_header_meta['background-repeat']) ? $page_header_meta['background-repeat'] : 'no-repeat';
		$breadcrumb_bg_image_attachment = isset($page_header_meta['background-attachment']) && !empty($page_header_meta['background-attachment']) ? $page_header_meta['background-attachment'] : 'scroll';
		$breadcrumb_bg_color = isset($page_header_meta['background-color']) && !empty($page_header_meta['background-color']) ? $page_header_meta['background-color'] : $breadcrumb_bg_color;
	}
} elseif (is_search()) {

	$page_header_meta = Bizmaster_Group_Fields_Value::page_layout_options('search');
	if(isset($page_header_meta['custom_breadcrumb_bg']) && $page_header_meta['custom_breadcrumb_bg'] == true) {

		$breadcrumb_bg_image = isset($page_header_meta['background-image']['url']) && !empty($page_header_meta['background-image']['url']) ? $page_header_meta['background-image']['url'] : '';
		$breadcrumb_bg_image_size = isset($page_header_meta['background-size']) && !empty($page_header_meta['background-size']) ? $page_header_meta['background-size'] : 'cover';
		$breadcrumb_bg_image_position = isset($page_header_meta['background-position']) && !empty($page_header_meta['background-position']) ? $page_header_meta['background-position'] : 'center center';
		$breadcrumb_bg_image_repeat = isset($page_header_meta['background-repeat']) && !empty($page_header_meta['background-repeat']) ? $page_header_meta['background-repeat'] : 'no-repeat';
		$breadcrumb_bg_image_attachment = isset($page_header_meta['background-attachment']) && !empty($page_header_meta['background-attachment']) ? $page_header_meta['background-attachment'] : 'scroll';
		$breadcrumb_bg_color = isset($page_header_meta['background-color']) && !empty($page_header_meta['background-color']) ? $page_header_meta['background-color'] : $breadcrumb_bg_color;
	}
} elseif (is_archive()) {

	$page_header_meta = Bizmaster_Group_Fields_Value::page_layout_options('archive');
	if(isset($page_header_meta['custom_breadcrumb_bg']) && $page_header_meta['custom_breadcrumb_bg'] == true) {

		$breadcrumb_bg_image = isset($page_header_meta['background-image']['url']) && !empty($page_header_meta['background-image']['url']) ? $page_header_meta['background-image']['url'] : '';
		$breadcrumb_bg_image_size = isset($page_header_meta['background-size']) && !empty($page_header_meta['background-size']) ? $page_header_meta['background-size'] : 'cover';
		$breadcrumb_bg_image_position = isset($page_header_meta['background-position']) && !empty($page_header_meta['background-position']) ? $page_header_meta['background-position'] : 'center center';
		$breadcrumb_bg_image_repeat = isset($page_header_meta['background-repeat']) && !empty($page_header_meta['background-repeat']) ? $page_header_meta['background-repeat'] : 'no-repeat';
		$breadcrumb_bg_image_attachment = isset($page_header_meta['background-attachment']) && !empty($page_header_meta['background-attachment']) ? $page_header_meta['background-attachment'] : 'scroll';
		$breadcrumb_bg_color = isset($page_header_meta['background-color']) && !empty($page_header_meta['background-color']) ? $page_header_meta['background-color'] : $breadcrumb_bg_color;
	}
} elseif (is_404()) {

	$page_header_meta = Bizmaster_Group_Fields_Value::get_404_options_value();
	if(isset($page_header_meta['custom_breadcrumb_bg']) && $page_header_meta['custom_breadcrumb_bg'] == true) {
		$breadcrumb_bg_image = isset($page_header_meta['background-image']['url']) && !empty($page_header_meta['background-image']['url']) ? $page_header_meta['background-image']['url'] : '';
		$breadcrumb_bg_image_size = isset($page_header_meta['background-size']) && !empty($page_header_meta['background-size']) ? $page_header_meta['background-size'] : 'cover';
		$breadcrumb_bg_image_position = isset($page_header_meta['background-position']) && !empty($page_header_meta['background-position']) ? $page_header_meta['background-position'] : 'center center';
		$breadcrumb_bg_image_repeat = isset($page_header_meta['background-repeat']) && !empty($page_header_meta['background-repeat']) ? $page_header_meta['background-repeat'] : 'no-repeat';
		$breadcrumb_bg_image_attachment = isset($page_header_meta['background-attachment']) && !empty($page_header_meta['background-attachment']) ? $page_header_meta['background-attachment'] : 'scroll';
		$breadcrumb_bg_color = isset($page_header_meta['background-color']) && !empty($page_header_meta['background-color']) ? $page_header_meta['background-color'] : $breadcrumb_bg_color;
	}
}

$breadcrumb_css = $bizmaster->generate_css_code([
    'background-image' => 'url(' . $breadcrumb_bg_image . ')',
    'background-position' => $breadcrumb_bg_image_position,
    'background-repeat' => $breadcrumb_bg_image_repeat,
    'background-size' => $breadcrumb_bg_image_size,
    'background-attachment' => $breadcrumb_bg_image_attachment,
], '.breadcrumb-wrap');

$breadcrumb_css .= $bizmaster->generate_css_code([
    'background-color' => $breadcrumb_bg_color,
], '.breadcrumb-wrap');

echo <<<CSS
{$breadcrumb_css}
CSS;

/*---------------------------------
	Footer Options
---------------------------------*/
$footer_spacing = cs_get_switcher_option('footer_spacing');
$footer_top_spacing = cs_get_option('footer_top_spacing');
$footer_bottom_spacing = cs_get_option('footer_bottom_spacing');
$footer_padding_top = !empty($footer_top_spacing) ? $bizmaster->sanitize_px($footer_top_spacing) : '';
$footer_padding_bottom = !empty($footer_bottom_spacing) ? $bizmaster->sanitize_px($footer_bottom_spacing) : '';


$footer_css = $bizmaster->generate_css_code([
    'padding-top' => $footer_padding_top,
    'padding-bottom' => $footer_padding_bottom
], '.footer-style .footer-wrap .footer-top');

if ($footer_spacing) {
    echo <<<CSS
    {$footer_css}
CSS;
}

/*---------------------------------
	Footer two Options
---------------------------------*/
$footer_bg = cs_get_option('footer_two_bg_image');
$footer_bg_image = isset($footer_bg['background-image']['url']) && !empty($footer_bg['background-image']['url']) ? $footer_bg['background-image']['url'] : '';
$footer_bg_image_size = isset($footer_bg['background-size']) && !empty($footer_bg['background-size']) ? $footer_bg['background-size'] : 'cover';
$footer_bg_image_position = isset($footer_bg['background-position']) && !empty($footer_bg['background-position']) ? $footer_bg['background-position'] : 'center center';
$footer_bg_image_repeat = isset($footer_bg['background-repeat']) && !empty($footer_bg['background-repeat']) ? $footer_bg['background-repeat'] : 'no-repeat';
$footer_bg_image_attachment = isset($footer_bg['background-attachment']) && !empty($footer_bg['background-attachment']) ? $footer_bg['background-attachment'] : 'scroll';
$footer_two_spacing = cs_get_switcher_option('footer_two_spacing');
$footer_two_top_spacing = cs_get_option('footer_two_top_spacing');
$footer_two_bottom_spacing = cs_get_option('footer_two_bottom_spacing');
$footer_two_padding_top = !empty($footer_two_top_spacing) ? $bizmaster->sanitize_px($footer_two_top_spacing) : '';
$footer_two_padding_bottom = !empty($footer_two_bottom_spacing) ? $bizmaster->sanitize_px($footer_two_bottom_spacing) : '';

$footer_css_two = $bizmaster->generate_css_code([
    'background-image' => 'url(' . $footer_bg_image . ')',
    'background-position' => $footer_bg_image_position,
    'background-repeat' => $footer_bg_image_repeat,
    'background-size' => $footer_bg_image_size,
    'background-attachment' => $footer_bg_image_attachment,
], '.footer-style-01 .footer-wrap.bg-image');

$footer_css_two .= $bizmaster->generate_css_code([
    'padding-top' => $footer_two_padding_top
], '.footer-style-01 .footer-wrap');


$footer_css_two .= $bizmaster->generate_css_code([
    'padding-bottom' => $footer_two_padding_bottom
], '.footer-style-01 .footer-wrap .footer-top');

if ($footer_spacing) {
    echo <<<CSS
    {$footer_css_two}
CSS;
}
/*---------------------------------
	Footer three Options
---------------------------------*/
$footer_two_bg = cs_get_option('footer_three_bg_image');
$footer_two_bg_image = isset($footer_two_bg['background-image']['url']) && !empty($footer_two_bg['background-image']['url']) ? $footer_two_bg['background-image']['url'] : '';
$footer_two_bg_image_size = isset($footer_two_bg['background-size']) && !empty($footer_two_bg['background-size']) ? $footer_two_bg['background-size'] : 'cover';
$footer_two_bg_image_position = isset($footer_two_bg['background-position']) && !empty($footer_two_bg['background-position']) ? $footer_two_bg['background-position'] : 'center center';
$footer_two_bg_image_repeat = isset($footer_two_bg['background-repeat']) && !empty($footer_two_bg['background-repeat']) ? $footer_two_bg['background-repeat'] : 'no-repeat';
$footer_two_bg_image_attachment = isset($footer_two_bg['background-attachment']) && !empty($footer_two_bg['background-attachment']) ? $footer_two_bg['background-attachment'] : 'scroll';
$footer_three_spacing = cs_get_switcher_option('footer_three_spacing');
$footer_three_top_spacing = cs_get_option('footer_three_top_spacing');
$footer_three_bottom_spacing = cs_get_option('footer_three_bottom_spacing');
$footer_three_padding_top = !empty($footer_three_top_spacing) ? $bizmaster->sanitize_px($footer_three_top_spacing) : '';
$footer_three_padding_bottom = !empty($footer_three_bottom_spacing) ? $bizmaster->sanitize_px($footer_three_bottom_spacing) : '';


$footer_three_css = $bizmaster->generate_css_code([
    'background-image' => 'url(' . $footer_two_bg_image . ')',
    'background-position' => $footer_two_bg_image_position,
    'background-repeat' => $footer_bg_image_repeat,
    'background-size' => $footer_two_bg_image_size,
    'background-attachment' => $footer_two_bg_image_attachment,
], '.footer-style-02 .footer-wrap');

$footer_three_css .= $bizmaster->generate_css_code([
    'padding-top' => $footer_three_padding_top
], '.footer-style-02 .footer-wrap');


$footer_three_css .= $bizmaster->generate_css_code([
    'padding-bottom' => $footer_three_padding_bottom
], '.footer-style-02 .footer-wrap .footer-widget-content');


echo <<<CSS
    {$footer_three_css}
CSS;


/*---------------------------------
	Copyright Area Options
---------------------------------*/
$copyright_area_spacing = cs_get_switcher_option('copyright_area_spacing');
$copyright_area_top_spacing = cs_get_option('copyright_area_top_spacing');
$copyright_area_bottom_spacing = cs_get_option('copyright_area_bottom_spacing');
$copyright_padding_top = !empty($copyright_area_top_spacing) ? $bizmaster->sanitize_px($copyright_area_top_spacing) : '';
$copyright_padding_bottom = !empty($copyright_area_bottom_spacing) ? $bizmaster->sanitize_px($copyright_area_bottom_spacing) : '';

$copyright_css = $bizmaster->generate_css_code([
    'padding-top' => $copyright_padding_top,
    'padding-bottom' => $copyright_padding_bottom
], '.footer-wrap .copyright-wrap .copyright-text');

if ($copyright_area_spacing) {
    echo <<<CSS
	{$copyright_css}
CSS;
}

/*---------------------------------
	Copyright Area Options Two
---------------------------------*/
$copyright_two_area_spacing = cs_get_switcher_option('copyright_two_area_spacing');
$copyright_two_area_top_spacing = cs_get_option('copyright_two_area_top_spacing');
$copyright_two_area_bottom_spacing = cs_get_option('copyright_two_area_bottom_spacing');
$copyright_two_padding_top = !empty($copyright_two_area_top_spacing) ? $bizmaster->sanitize_px($copyright_two_area_top_spacing) : '';
$copyright_two_padding_bottom = !empty($copyright_two_area_bottom_spacing) ? $bizmaster->sanitize_px($copyright_two_area_bottom_spacing) : '';

$copyright_css_two = $bizmaster->generate_css_code([
    'padding-top' => $copyright_two_padding_top,
    'padding-bottom' => $copyright_two_padding_bottom
], '.footer-style-01 .footer-wrap .copyright-wrap');

if ($copyright_two_area_spacing) {
    echo <<<CSS
	{$copyright_css_two}
CSS;
}


/*---------------------------------
	Copyright Area Options Two
---------------------------------*/
$copyright_three_area_spacing = cs_get_switcher_option('copyright_three_area_spacing');
$copyright_three_area_top_spacing = cs_get_option('copyright_three_area_top_spacing');
$copyright_three_area_bottom_spacing = cs_get_option('copyright_three_area_bottom_spacing');
$copyright_three_padding_top = !empty($copyright_three_area_top_spacing) ? $bizmaster->sanitize_px($copyright_three_area_top_spacing) : '';
$copyright_three_padding_bottom = !empty($copyright_three_area_bottom_spacing) ? $bizmaster->sanitize_px($copyright_three_area_bottom_spacing) : '';

$copyright_css_three = $bizmaster->generate_css_code([
    'padding-top' => $copyright_three_padding_top,
    'padding-bottom' => $copyright_three_padding_bottom
], '.footer-style-02 .footer-wrap .copyright-wrap');

if ($copyright_three_area_spacing) {
    echo <<<CSS
	{$copyright_css_three}
CSS;
}
/*---------------------------------
	Header One
---------------------------------*/
$header_01_nav_bar_bg_color = cs_get_customize_option('header_01_nav_bar_bg_color');
$header_01_nav_bar_color = cs_get_customize_option('header_01_nav_bar_color');
$header_01_dropdown_bg_color = cs_get_customize_option('header_01_dropdown_bg_color');
$header_01_dropdown_color = cs_get_customize_option('header_01_dropdown_color');
$header_01_nav_bar_hover_color = cs_get_customize_option('header_01_nav_bar_hover_color');
$header_01_dropdown_border_color = cs_get_customize_option('header_01_dropdown_border_color');
$header_01_dropdown_hover_bg_color = cs_get_customize_option('header_01_dropdown_hover_bg_color');
$header_01_dropdown_hover_color = cs_get_customize_option('header_01_dropdown_hover_color');

$header_one_css = $bizmaster->generate_css_code([
    'color' => $header_01_nav_bar_color
], [
    '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li a'
]);

$header_one_css .= $bizmaster->generate_css_code([
    'background' => $header_01_nav_bar_color
], [
    '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children:after',
    '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children:before'
]);

$header_one_css .= $bizmaster->generate_css_code([
    'color' => $header_01_nav_bar_hover_color
], [
    '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li a:hover',
    '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li:hover a'
]);

$header_one_css .= $bizmaster->generate_css_code([
    'background' => $header_01_nav_bar_hover_color
], [
    '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li:hover.menu-item-has-children:after',
    '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li:hover.menu-item-has-children:before'
]);

$header_one_css .= $bizmaster->generate_css_code([
    'background-color' => $header_01_nav_bar_bg_color . ' !important'
], '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default, .navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container');

$header_one_css .= $bizmaster->generate_css_code([
    'background-color' => $header_01_dropdown_bg_color,
    'color' => $header_01_dropdown_color,
], '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a');

$header_one_css .= $bizmaster->generate_css_code([
    'background-color' => $header_01_dropdown_hover_bg_color,
    'color' => $header_01_dropdown_hover_color . ' !important',
], '.navbar.navbar-area.navbar-expand-lg.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:hover');

$header_one_css .= $bizmaster->generate_css_code(
    [
        'color' => $header_01_nav_bar_hover_color,
    ],
    [
        '.navbar-area.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li a:hover',
        '.navbar-area.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li:hover a',
        '.navbar-area.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li:hover.menu-item-has-children:before'
    ]
);

$header_one_css .= $bizmaster->generate_css_code([
    'border-top-color' => $header_01_dropdown_border_color,
], '.navbar-area.navbar-style-02.navbar-default .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li');

echo <<<CSS
{$header_one_css}
CSS;

/*---------------------------------
	Header Two
---------------------------------*/
$header_02_nav_bar_bg_color = cs_get_customize_option('header_02_nav_bar_bg_color');
$header_02_nav_bar_color = cs_get_customize_option('header_02_nav_bar_color');
$header_02_nav_bar_hover_color = cs_get_customize_option('header_02_nav_bar_hover_color');

$header_02_nav_bar_search_icon_color = cs_get_customize_option('header_02_nav_bar_search_icon_color');
$header_02_nav_bar_search_icon_hover_color = cs_get_customize_option('header_02_nav_bar_search_icon_hover_color');
$header_02_nav_bar_btn_bg_color = cs_get_customize_option('header_02_nav_bar_btn_bg_color');
$header_02_nav_bar_btn_color = cs_get_customize_option('header_02_nav_bar_btn_color');
$header_02_nav_bar_btn_hover_bg_color = cs_get_customize_option('header_02_nav_bar_btn_hover_bg_color');
$header_02_nav_bar_hover_btn_color = cs_get_customize_option('header_02_nav_bar_hover_btn_color');

$header_02_dropdown_bg_color = cs_get_customize_option('header_02_dropdown_bg_color');
$header_02_dropdown_color = cs_get_customize_option('header_02_dropdown_color');
$header_02_dropdown_border_color = cs_get_customize_option('header_02_dropdown_border_color');
$header_02_dropdown_hover_color = cs_get_customize_option('header_02_dropdown_hover_color');
$header_02_dropdown_hover_bg_color = cs_get_customize_option('header_02_dropdown_hover_bg_color');

$header_two_css = $bizmaster->generate_css_code([
		'background-color' => $header_02_nav_bar_bg_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03',
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container'
]);

$header_two_css .= $bizmaster->generate_css_code([
		'color' => $header_02_nav_bar_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav > li a'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'background' => $header_02_nav_bar_color
], [
    '.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav > li.menu-item-has-children:after',
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav > li.menu-item-has-children:before'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'color' => $header_02_nav_bar_hover_color
], [
    '.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav li a:hover',
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav li:hover a'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'background' => $header_02_nav_bar_hover_color
], [
    '.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav > li:hover.menu-item-has-children:after',
    '.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav > li:hover.menu-item-has-children:before'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'color' => $header_02_nav_bar_search_icon_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .simple-icon'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'color' => $header_02_nav_bar_search_icon_hover_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .simple-icon:hover'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'background-color' => $header_02_nav_bar_btn_bg_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .global-btn'
]);

$header_two_css .= $bizmaster->generate_css_code([
		'color' => $header_02_nav_bar_btn_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .global-btn'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'background' => $header_02_nav_bar_btn_hover_bg_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .global-btn:after',
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .global-btn:hover:after',
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .global-btn:before',
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .global-btn:hover:before'
]);

$header_two_css .= $bizmaster->generate_css_code([
		'color' => $header_02_nav_bar_hover_btn_color
], [
		'.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .nav-right-part .global-btn:hover'
]);

$header_two_css .= $bizmaster->generate_css_code([
		'background-color' => $header_02_dropdown_bg_color,
		'color' => $header_02_dropdown_color
], ['.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a']);

$header_two_css .= $bizmaster->generate_css_code([
		'background-color' => $header_02_dropdown_hover_bg_color,
		'color' => $header_02_dropdown_hover_color . ' !important'
], ['.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:hover']);

$header_two_css .= $bizmaster->generate_css_code([
    'border-top-color' => $header_02_dropdown_border_color,
], '.navbar.navbar-area.navbar-expand-lg.navigation-style-01.navbar-style-03 .custom-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li');

$header_02_top_bar_bg_color_1 = cs_get_customize_option('header_02_top_bar_bg_color_1');
$header_02_top_bar_bg_color_2 = cs_get_customize_option('header_02_top_bar_bg_color_2');
$header_02_top_bar_shape_color = cs_get_customize_option('header_02_top_bar_shape_color');
$header_02_top_bar_icon_color = cs_get_customize_option('header_02_top_bar_icon_color');
$header_02_top_bar_text_color = cs_get_customize_option('header_02_top_bar_text_color');

$header_two_css .= $bizmaster->generate_css_code([
    'background' => $header_02_top_bar_bg_color_1
], [
    '.header-layout3 .header-top'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'background' => $header_02_top_bar_bg_color_2
], [
    '.header-layout3 .header-top .header-top-bg-shape:after'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'background' => $header_02_top_bar_shape_color
], [
    '.header-layout3 .header-top .header-top-bg-shape'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'color' => $header_02_top_bar_text_color
], [
    '.header-layout3 .header-top .header-links.first ul li'
]);

$header_two_css .= $bizmaster->generate_css_code([
    'color' => $header_02_top_bar_icon_color,
		'fill' => $header_02_top_bar_icon_color
], [
    '.header-layout3 .header-top .header-links.first ul li svg'
]);

$header_02_top_bar_social_icon_bg_color = cs_get_customize_option('header_02_top_bar_social_icon_bg_color');
$header_02_top_bar_social_icon_border_color = cs_get_customize_option('header_02_top_bar_social_icon_border_color');
$header_02_top_bar_social_icon_color = cs_get_customize_option('header_02_top_bar_social_icon_color');
$header_02_top_bar_social_icon_hover_bg_color = cs_get_customize_option('header_02_top_bar_social_icon_hover_bg_color');
$header_02_top_bar_social_icon_hover_border_color = cs_get_customize_option('header_02_top_bar_social_icon_hover_border_color');
$header_02_top_bar_social_icon_hover_color = cs_get_customize_option('header_02_top_bar_social_icon_hover_color');

$header_two_css .= $bizmaster->generate_css_code([
		'background' => $header_02_top_bar_social_icon_bg_color,
		'border-color' => $header_02_top_bar_social_icon_border_color,
		'color' => $header_02_top_bar_social_icon_color
], [
    '.header-layout3 .header-top .header-links.second ul li .social-links a'
]);

$header_two_css .= $bizmaster->generate_css_code([
		'background' => $header_02_top_bar_social_icon_hover_bg_color,
		'border-color' => $header_02_top_bar_social_icon_hover_border_color,
		'color' => $header_02_top_bar_social_icon_hover_color
], [
    '.header-layout3 .header-top .header-links.second ul li .social-links a:hover'
]);

echo <<<CSS

{$header_two_css}

CSS;

/*---------------------------------
	Sidebar
---------------------------------*/

$widget_border_color = cs_get_customize_option('sidebar_widget_border_color');
$widget_title_color = cs_get_customize_option('sidebar_widget_title_color');
$widget_text_color = cs_get_customize_option('sidebar_widget_text_color');
$sidebar_widget_title_bottom_border_color = cs_get_customize_option('sidebar_widget_title_bottom_border_color');

$sidebar_css = $bizmaster->generate_css_code([
    'color' => $widget_title_color,
], [
    '.widget .widget-headline.style-01',
    '.widget_rss ul li a.rsswidget'
]);

$sidebar_css .= $bizmaster->generate_css_code([
    'background-color' => $sidebar_widget_title_bottom_border_color
], [
    '.widget .widget-headline:after'
]);

$sidebar_css .= $bizmaster->generate_css_code([
    'color' => $widget_text_color
], [
    '.widget ul li a',
    '.widget ul li',
    '.widget p',
    '.widget .table td',
    '.widget .table th',
    '.widget caption',
    '.widget .wp-calendar-nav-prev a',
    '.widget_tag_cloud .tagcloud a',
    '.calendar_wrap table td,.calendar_wrap table tr',
    '.widget_categories ul li a:before'
]);

echo <<<CSS
{$sidebar_css}
CSS;
/*-----------------------------------
	Footer Options
-----------------------------------*/
$footer_area_bg_color = cs_get_customize_option('footer_area_bg_color');
$footer_widget_title_color = cs_get_customize_option('footer_widget_title_color');
$footer_widget_text_color = cs_get_customize_option('footer_widget_text_color');
$footer_widget_text_hover_color = cs_get_customize_option('footer_widget_text_hover_color');
$footer_widget_tag_color = cs_get_customize_option('footer_widget_tag_color');
$footer_widget_tag_bg_color = cs_get_customize_option('footer_widget_tag_bg_color');
$footer_widget_tag_border_color = cs_get_customize_option('footer_widget_tag_border_color');
$copyright_area_bg_color = cs_get_customize_option('copyright_area_bg_color');
$copyright_area_top_border_color = cs_get_customize_option('copyright_area_top_border_color');
$copyright_area_text_color = cs_get_customize_option('copyright_area_text_color');
$social_icon_bg_color = cs_get_customize_option('social_icon_bg_color');
$social_icon_bg_hover_color = cs_get_customize_option('social_icon_bg_hover_color');
$social_icon_color = cs_get_customize_option('social_icon_color');
$social_icon_hover_color = cs_get_customize_option('social_icon_hover_color');

$footer_css = $bizmaster->generate_css_code([
    'background-color' => $footer_area_bg_color
], ['.footer-style-1']);

$footer_css .= $bizmaster->generate_css_code([
    'color' => $footer_widget_text_color
], [
    '.widget.footer-widget p',
    '.widget.footer-widget.widget_calendar caption',
    '.widget.footer-widget.widget_calendar th',
    '.widget.footer-widget.widget_calendar td',
    '.footer-widget.widget p',
    '.footer-widget.widget a',
    '.footer-widget.widget',
    '.widget.footer-widget ul li a',
    '.widget.footer-widget ul li',
    '.widget_tag_cloud.footer-widget .tagcloud a'
]);

$footer_css .= $bizmaster->generate_css_code([
    'color' => $footer_widget_text_hover_color
], [
    '.footer-widget.widget a:hover',
    '.widget.footer-widget ul li a:hover',
    '.widget_tag_cloud.footer-widget .tagcloud a:hover'
]);

$footer_css .= $bizmaster->generate_css_code([
    'color' => $footer_widget_title_color
], [
    '.widget.footer-widget .widget-headline',
    '.widget.footer-widget .widget-headline a',
    'footer-widget.widget_rss ul li a.rsswidget',
    '.footer-widget.widget .theme-recent-post-wrap li.theme-recent-post-item .content .title > a'
]);

$footer_css .= $bizmaster->generate_css_code([
    'color' => $footer_widget_tag_color,
    'background-color' => $footer_widget_tag_bg_color,
    'border-color' => $footer_widget_tag_border_color
], ['.footer-widget.widget_tag_cloud .tagcloud a:hover']);

$copyright_css = $bizmaster->generate_css_code([
    'background-color' => $copyright_area_bg_color
], '.footer-style-1 .footer-wraps .copyright-wrap');

$footer_css .= $bizmaster->generate_css_code([
    'border-top-color' => $copyright_area_top_border_color
], ['.footer-style-1 .footer-wraps .copyright-wrap']);

$copyright_css .= $bizmaster->generate_css_code([
    'color' => $copyright_area_text_color
], '.footer-style-1 .copyright-wrap .copyright-content .copyright-text');

$social_css .= $bizmaster->generate_css_code([
    'background' => $social_icon_bg_color
], '.footer-style-1 .social-btn li a');

$social_css .= $bizmaster->generate_css_code([
    'background' => $social_icon_bg_hover_color
], '.footer-style-1 .social-btn li a:hover');

$social_css .= $bizmaster->generate_css_code([
    'color' => $social_icon_color,
	'fill' => $social_icon_color
], '.footer-style-1 .social-btn li a svg');

$social_css .= $bizmaster->generate_css_code([
    'color' => $social_icon_hover_color,
	'fill' => $social_icon_hover_color
], '.footer-style-1 .social-btn li a:hover svg');

echo <<<CSS
{$footer_css}
CSS;

/* Copyright Area
 * */
echo <<<CSS
{$copyright_css}
CSS;

/* Social Icons
 * */
echo <<<CSS
{$social_css}
CSS;

/*-----------------------------------
	Footer Options Two
-----------------------------------*/

$footer_area_two_bg_color = cs_get_customize_option('footer_area_two_bg_color');
$footer_area_two_bottom_border_color = cs_get_customize_option('footer_area_two_bottom_border_color');
$footer_two_widget_text_color = cs_get_customize_option('footer_two_widget_text_color');
$footer_two_widget_text_hover_color = cs_get_customize_option('footer_two_widget_text_hover_color');
$footer_widget_two_tag_color = cs_get_customize_option('footer_widget_two_tag_color');
$footer_widget_two_tag_bg_color = cs_get_customize_option('footer_widget_two_tag_bg_color');
$footer_widget_two_tag_border_color = cs_get_customize_option('footer_widget_two_tag_border_color');
$copyright_two_area_text_color = cs_get_customize_option('copyright_two_area_text_color');
$copyright_two_area_menu_color = cs_get_customize_option('copyright_two_area_menu_color');


$copyright_two_area_footer_social_color = cs_get_customize_option('copyright_two_area_footer_social_color');
$copyright_two_area_footer_social_bg_color = cs_get_customize_option('copyright_two_area_footer_social_bg_color');
$copyright_two_area_footer_hover_social_color = cs_get_customize_option('copyright_two_area_footer_hover_social_color');
$copyright_two_area_footer_social_hover_bg_color = cs_get_customize_option('copyright_two_area_footer_social_hover_bg_color');


$footer_two_css = $bizmaster->generate_css_code([
    'background-color' => $footer_area_two_bg_color
], ['.footer-section']);

$footer_two_css .= $bizmaster->generate_css_code([
    'border-top-color' => $footer_area_two_bottom_border_color
], ['.copyright-area']);

$footer_two_css .= $bizmaster->generate_css_code([
    'color' => $footer_two_widget_text_color
], [
    '.footer-list li'
]);
$footer_two_css .= $bizmaster->generate_css_code([
    'color' => $footer_two_widget_text_hover_color
], [
    '.footer-list li:hover'
]);

$footer_two_css .= $bizmaster->generate_css_code([
    'color' => $copyright_two_area_menu_color
], ['.footer-style-01 .copyright-menu li']);

$footer_two_css .= $bizmaster->generate_css_code([
    'color' => $copyright_two_area_footer_social_color,
    'background-color' => $copyright_two_area_footer_social_bg_color
], ['.footer-social li a']);

$footer_two_css .= $bizmaster->generate_css_code([
    'color' => $copyright_two_area_footer_hover_social_color,
    'background-color' => $copyright_two_area_footer_social_hover_bg_color
], ['.footer-social li a:hover']);


$copyright_two_css = $bizmaster->generate_css_code([
    'color' => $copyright_two_area_text_color
], '.copyright-area p');


echo <<<CSS
{$footer_two_css}
CSS;
/* Copyright Area
 * */
echo <<<CSS
{$copyright_two_css}
CSS;


/*-----------------------------------
	Footer Options Three
-----------------------------------*/
$footer_area_three_bg_color = cs_get_customize_option('footer_area_three_bg_color');
$footer_area_three_bottom_border_color = cs_get_customize_option('footer_area_three_bottom_border_color');
$footer_three_widget_title_color = cs_get_customize_option('footer_three_widget_title_color');
$footer_three_widget_text_color = cs_get_customize_option('footer_three_widget_text_color');
$footer_three_widget_text_hover_color = cs_get_customize_option('footer_three_widget_text_hover_color');
$footer_widget_three_tag_color = cs_get_customize_option('footer_widget_three_tag_color');
$footer_widget_three_tag_bg_color = cs_get_customize_option('footer_widget_three_tag_bg_color');
$footer_widget_three_tag_border_color = cs_get_customize_option('footer_widget_three_tag_border_color');
$copyright_three_area_bg_color = cs_get_customize_option('copyright_three_area_bg_color');
$copyright_three_area_text_color = cs_get_customize_option('copyright_three_area_text_color');

$footer_three_call_text_color = cs_get_customize_option('footer_three_call_text_color');
$footer_three_call_btn_bg_color = cs_get_customize_option('footer_three_call_btn_bg_color');
$footer_three_call_btn_color = cs_get_customize_option('footer_three_call_btn_color');
$footer_three_call_btn_hover_bg_color = cs_get_customize_option('footer_three_call_btn_hover_bg_color');
$footer_three_call_hover_btn_color = cs_get_customize_option('footer_three_call_hover_btn_color');


$footer_three_css = $bizmaster->generate_css_code([
    'background-color' => $footer_area_three_bg_color
], ['.footer-style-02']);

$footer_three_css .= $bizmaster->generate_css_code([
    'color' => $footer_three_call_text_color
], ['.footer-style-02 .call-to-action-inner .title']);

$footer_three_css .= $bizmaster->generate_css_code([
    'background-color' => $footer_three_call_btn_bg_color,
    'color' => $footer_three_call_btn_color
], ['.footer-style-02 .btn-wrap .boxed-btn']);

$footer_three_css .= $bizmaster->generate_css_code([
    'color' => $footer_three_call_hover_btn_color,
    'background-color' => $footer_three_call_btn_hover_bg_color
], ['footer-style-02 .btn-wrap .boxed-btn:hover']);

$footer_three_css .= $bizmaster->generate_css_code([
    'border-bottom-color' => $footer_area_three_bottom_border_color
], ['.footer-style-02 .footer-wrap']);

$footer_three_css .= $bizmaster->generate_css_code([
    'color' => $footer_three_widget_text_color
], [
    '.footer-style-02 .widget.footer-widget p',
    '.footer-style-02 .widget.footer-widget.widget_calendar caption',
    '.footer-style-02 .widget.footer-widget.widget_calendar th',
    '.footer-style-02 .widget.footer-widget.widget_calendar td',
    '.footer-style-02 .footer-widget.widget p',
    '.footer-style-02 .footer-widget.widget a',
    '.footer-style-02 .footer-widget.widget',
    '.footer-style-02 .widget.footer-widget ul li a',
    '.footer-style-02 .widget.footer-widget ul li',
    '.footer-style-02 .widget_tag_cloud.footer-widget .tagcloud a'
]);
$footer_three_css .= $bizmaster->generate_css_code([
    'color' => $footer_three_widget_text_hover_color
], [
    '.footer-style-02  .footer-widget.widget a:hover',
    '.footer-style-02  .widget.footer-widget ul li a:hover',
    '.footer-style-02  .widget_tag_cloud.footer-widget .tagcloud a:hover'
]);
$footer_three_css .= $bizmaster->generate_css_code([
    'color' => $footer_three_widget_title_color
], [
    '.footer-style-02 .widget.footer-widget .widget-headline',
    '.footer-style-02 .widget.footer-widget .widget-headline a',
    '.footer-style-02 .footer-widget.widget_rss ul li a.rsswidget',
    '.footer-style-02 .footer-widget.widget .theme-recent-post-wrap li.theme-recent-post-item .content .title>a'
]);

$footer_three_css .= $bizmaster->generate_css_code([
    'color' => $footer_widget_three_tag_color,
    'background-color' => $footer_widget_three_tag_bg_color,
    'border-color' => $footer_widget_three_tag_border_color
], ['.footer-style-02 .footer-widget.widget_tag_cloud .tagcloud a:hover']);

$copyright_three_css = $bizmaster->generate_css_code([
    'background-color' => $copyright_three_area_bg_color,
    'color' => $copyright_three_area_text_color
], '.footer-style-02 .copyright-wrap-inner');


echo <<<CSS
    {$footer_three_css}
CSS;
/* Copyright Area
 * */
echo <<<CSS
	{$copyright_three_css}
CSS;

/*---------------------------------
	404 Error Page Options
---------------------------------*/
$error_page_bg_color = cs_get_option('404_bg_color');
$err_404_spacing_top = cs_get_option('404_spacing_top');
$err_404_spacing_bottom = cs_get_option('404_spacing_bottom');
$err_padding_top = !empty($err_404_spacing_top) ? $bizmaster->sanitize_px($err_404_spacing_top) : '';
$err_padding_bottom = !empty($err_404_spacing_bottom) ? $bizmaster->sanitize_px($err_404_spacing_bottom) : '';

$error_css = $bizmaster->generate_css_code([
    'background-color' => $error_page_bg_color,
    'padding-top' => $err_padding_top,
    'padding-bottom' => $err_padding_bottom
], '.error_page_content_area');

echo <<<CSS
  {$error_css}
CSS;

/*---------------------------------
	Blog Page Options
---------------------------------*/
$blog_page_bg_color = cs_get_option('blog_bg_color');
$blog_page_spacing_top = cs_get_option('blog_spacing_top');
$blog_page_spacing_bottom = cs_get_option('blog_spacing_bottom');
$blog_padding_top = !empty($blog_page_spacing_top) ? $bizmaster->sanitize_px($blog_page_spacing_top) : '';
$blog_padding_bottom = !empty($blog_page_spacing_bottom) ? $bizmaster->sanitize_px($blog_page_spacing_bottom) : '';

$blog_css = $bizmaster->generate_css_code([
    'background-color' => $blog_page_bg_color,
    'padding-top' => $blog_padding_top,
    'padding-bottom' => $blog_padding_bottom
], '.blog-page-content-area');

echo <<<CSS
  {$blog_css}
CSS;

/*---------------------------------
	Archive Page Options
---------------------------------*/
$archive_page_bg_color = cs_get_option('archive_bg_color');
$archive_page_spacing_top = cs_get_option('archive_spacing_top');
$archive_page_spacing_bottom = cs_get_option('archive_spacing_bottom');
$archive_single_padding_top = !empty($archive_page_spacing_top) ? $bizmaster->sanitize_px($archive_page_spacing_top) : '';
$archive_single_padding_bottom = !empty($archive_page_spacing_bottom) ? $bizmaster->sanitize_px($archive_page_spacing_bottom) : '';

$archive_page_css = $bizmaster->generate_css_code([
    'background-color' => $archive_page_bg_color,
    'padding-top' => $archive_single_padding_top,
    'padding-bottom' => $archive_single_padding_bottom
], '.archive-page-content-area');

echo <<<CSS
  {$archive_page_css}
CSS;

/*---------------------------------
	Search Page Options
---------------------------------*/
$search_page_bg_color = cs_get_option('search_bg_color');
$search_page_spacing_top = cs_get_option('search_spacing_top');
$search_page_spacing_bottom = cs_get_option('search_spacing_bottom');
$search_single_padding_top = !empty($search_page_spacing_top) ? $bizmaster->sanitize_px($search_page_spacing_top) : '';
$search_single_padding_bottom = !empty($search_page_spacing_bottom) ? $bizmaster->sanitize_px($search_page_spacing_bottom) : '';

$search_page_css = $bizmaster->generate_css_code([
    'background-color' => $search_page_bg_color,
    'padding-top' => $search_single_padding_top,
    'padding-bottom' => $search_single_padding_bottom
], '.search-page-content-area');

echo <<<CSS
  {$search_page_css}
CSS;

$theme_customize_css = ob_get_clean();
