<?php

/*
 * Theme Customize Options
 * @package bizmaster
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {
    $prefix = 'bizmaster';

    CSF::createCustomizeOptions($prefix . '_customize_options');
    /*-------------------------------------
        ** Theme Main panel
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('Bizmaster Options', 'bizmaster'),
        'id' => 'bizmaster_main_panel',
        'priority' => 11,
    ));


    /*-------------------------------------
        ** Theme Main Color
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('01. Main Color', 'bizmaster'),
        'priority' => 10,
        'parent' => 'bizmaster_main_panel',
        'fields' => array(
            array(
                'id' => 'main_color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color One', 'bizmaster'),
                'default' => '#196164',
                'desc' => esc_html__('This is theme primary color one, means it will affect most of elements that have default color of our theme primary color', 'bizmaster')
            ),
            array(
                'id' => 'secondary_color',
                'type' => 'color',
                'title' => esc_html__('Theme Secondary Color', 'bizmaster'),
                'default' => '#155BAC',
                'desc' => esc_html__('This is theme secondary color, means it\'ll affect most of elements that have default color of our theme secondary color', 'bizmaster')
            ),
            array(
                'id' => 'heading_color',
                'type' => 'color',
                'title' => esc_html__('Theme Heading Color', 'bizmaster'),
                'default' => '',
                'desc' => esc_html__('This is theme heading color, means it\'ll affect all of heading tag like, h1,h2,h3,h4,h5,h6', 'bizmaster')
            ),
            array(
                'id' => 'paragraph_color',
                'type' => 'color',
                'title' => esc_html__('Theme Paragraph Color', 'bizmaster'),
                'default' => '#19352D',
                'desc' => esc_html__('This is theme paragraph color, means it\'ll affect all of body/paragraph tag like, p,li,a etc', 'bizmaster')
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Header Options
    -------------------------------------*/

    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('02. Header One Options', 'bizmaster'),
        'parent' => 'bizmaster_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Nav Bar Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_01_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dropdown Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_01_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Border Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'bizmaster'),
                'default' => ''
            ),
        )
    ));
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('03. Header Two Options', 'bizmaster'),
        'parent' => 'bizmaster_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Option', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_02_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Bar Button', 'bizmaster') . '</h3>'
            ),
						array(
                'id' => 'header_02_nav_bar_search_icon_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Search Icon Color', 'bizmaster'),
                'default' => ''
            ),
						array(
                'id' => 'header_02_nav_bar_search_icon_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Search Icon Hover Color', 'bizmaster'),
                'default' => ''
            ),
						array(
                'id' => 'header_02_nav_bar_btn_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Background Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_nav_bar_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Color', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_nav_bar_btn_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Background Color', 'bizmaster'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_02_nav_bar_hover_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Color', 'bizmaster'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Dropdown Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'header_02_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'bizmaster'),
                'default' => '#19352D'
            ),
            array(
                'id' => 'header_02_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'bizmaster'),
                'default' => '#fff'
            ),
						array(
                'id' => 'header_02_dropdown_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Border Color', 'bizmaster'),
                'default' => ''
            ),
						array(
                'id' => 'header_02_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'bizmaster'),
                'default' => '#196164'
            ),
            array(
                'id' => 'header_02_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'bizmaster'),
                'default' => '#fff'
            ),
						array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'bizmaster') . '</h3>'
            ),
						array(
                'id' => 'header_02_top_bar_bg_color_1',
                'type' => 'color',
                'title' => esc_html__('Top Bar Background Color 1', 'bizmaster'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_top_bar_bg_color_2',
                'type' => 'color',
                'title' => esc_html__('Top Bar Background Color 2', 'bizmaster'),
                'default' => ''
            ),
						array(
                'id' => 'header_02_top_bar_shape_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Shape Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_icon_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Icon Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_text_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Text Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_social_icon_bg_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Social Icon Background Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_social_icon_border_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Social Icon Border Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_social_icon_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Social Icon Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_social_icon_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Social Icon Hover Background Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_social_icon_hover_border_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Social Icon Hover Border Color', 'bizmaster'),
                'default' => ''
						),
						array(
                'id' => 'header_02_top_bar_social_icon_hover_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Social Icon Hover Color', 'bizmaster'),
                'default' => ''
						)
				)
    ));

    /*-------------------------------------
          ** Theme Sidebar Options
      -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('05. Sidebar', 'bizmaster'),
        'priority' => 13,
        'parent' => 'bizmaster_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'sidebar_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Title Color', 'bizmaster'),
                'default' => '#19352D'
            ),
            array(
                'id' => 'sidebar_widget_title_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Border Color', 'bizmaster'),
            ),
            array(
                'id' => 'sidebar_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Text Color', 'bizmaster'),
                'default' => '#19352D'
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Footer One Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer One', 'bizmaster'),
        'priority' => 14,
        'parent' => 'bizmaster_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'bizmaster'),
                'default' => '#19352D',
            ),
			array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Title Color', 'bizmaster'),
                'default' => '#FFFFFF'
            ),
            array(
                'id' => 'footer_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'bizmaster'),
                'default' => '#FFFFFF'
            ),
            array(
                'id' => 'footer_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'bizmaster'),
                'default' => '#C4F500'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Tag Cloud Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_tag_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Text Color', 'bizmaster'),
                'default' => '#FFFFFF'
            ),
            array(
                'id' => 'footer_widget_tag_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Background Color', 'bizmaster'),
                'default' => '#19352D'
            ),
            array(
                'id' => 'footer_widget_tag_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Border Color', 'bizmaster'),
                'default' => '#19352D'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Copyright Area Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'copyright_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Background Color', 'bizmaster'),
                'default' => '#FFFFFF00'
            ),
			array(
                'id' => 'copyright_area_top_border_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Top Border Color', 'bizmaster'),
                'default' => 'rgba(114, 108, 148, 0.2)',
            ),
			array(
                'id' => 'copyright_area_text_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Text Color', 'bizmaster'),
                'default' => '#FFFFFF'
            ),
			array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Social Icon Options', 'bizmaster') . '</h3>'
            ),
			array(
                'id' => 'social_icon_bg_color',
                'type' => 'color',
                'title' => esc_html__('Social Icon Background Color', 'bizmaster'),
                'default' => '#19352D'
            ),
			array(
                'id' => 'social_icon_bg_hover_color',
                'type' => 'color',
                'title' => esc_html__('Social Icon Background Hover Color', 'bizmaster'),
                'default' => '#196164'
            ),
			array(
                'id' => 'social_icon_color',
                'type' => 'color',
                'title' => esc_html__('Social Background Color', 'bizmaster'),
                'default' => '#FFFFFF'
            ),
			array(
                'id' => 'social_icon_hover_color',
                'type' => 'color',
                'title' => esc_html__('Social Background Hover Color', 'bizmaster'),
                'default' => '#FFFFFF'
            )
		)
    ));

    /*-------------------------------------
     ** Theme Footer Two Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer Two', 'bizmaster'),
        'priority' => 14,
        'parent' => 'bizmaster_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_area_two_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'bizmaster'),
                'default' => '#19352D',
            ),
            array(
                'id' => 'footer_area_two_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Border Color', 'bizmaster'),
                'default' => 'rgba(255, 255, 255, 0.2)',
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'footer_two_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'bizmaster'),
                'default' => 'rgba(255,255,255,0.8)'
            ),
            array(
                'id' => 'footer_two_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'bizmaster'),
                'default' => '#196164'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Copyright Area Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'copyright_two_area_text_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Text Color', 'bizmaster'),
                'default' => '#8A8A8A'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Social Options', 'bizmaster') . '</h3>'
            ),
            array(
                'id' => 'copyright_two_area_footer_social_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Color', 'bizmaster'),
                'default' => '#8A8A8A'
            ),
            array(
                'id' => 'copyright_two_area_footer_social_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Background Color', 'bizmaster'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'copyright_two_area_footer_hover_social_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Hover Color', 'bizmaster'),
                'default' => '#fff'
            ),
            array(
                'id' => 'copyright_two_area_footer_social_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Background Hover Color', 'bizmaster'),
                'default' => '#196164'
            ),
        )
    ));
}//endif