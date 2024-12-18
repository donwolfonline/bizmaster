<?php
/**
 * Theme Metabox Options
 * @package bizmaster
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = bizmaster()->kses_allowed_html(array('mark'));

    $prefix = 'bizmaster';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'bizmaster'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));

    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
			array(
				'id' => 'video_type',
				'type' => 'radio',
				'title' => esc_html__('Select Video Type', 'bizmaster'),
				'options'    => array(
					'youtube' => 'YouTube',
					'vimeo' => 'Vimeo',
					'self_hosted_video' => 'Self Hosted Video (mp4)'
				),
				'default' => 'youtube',
				'desc' => wp_kses(__('select <mark>video type</mark> to show in frontend', 'bizmaster'), $allowed_html)
			),
			array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'bizmaster'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'bizmaster'), $allowed_html)
            )
        )
    ));

    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'bizmaster'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));

    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'bizmaster'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'bizmaster'), $allowed_html)
            )
        )
    ));

	CSF::createMetabox($prefix . '_post_quote_options', array(
        'title' => esc_html__('Quote Post Format Options', 'bizmaster'),
        'post_type' => 'post',
        'post_formats' => 'quote'
    ));

	CSF::createSection($prefix . '_post_quote_options', array(
        'fields' => array(
			array(
				'id' => 'quote_text',
				'type' => 'textarea',
				'title' => esc_html__('Enter Quote', 'bizmaster'),
				'desc' => wp_kses(__('enter <mark>quote</mark> to show in frontend', 'bizmaster'), $allowed_html)
			),
			array(
                'id' => 'quote_author',
                'type' => 'text',
                'title' => esc_html__('Enter Quote Author', 'bizmaster'),
                'desc' => wp_kses(__('enter <mark>quote author</mark> to show in frontend', 'bizmaster'), $allowed_html)
            ),
			array(
                'id' => 'quote_author_position',
                'type' => 'text',
                'title' => esc_html__('Enter Quote Author Position', 'bizmaster'),
                'desc' => wp_kses(__('enter <mark>quote author position</mark> to show in frontend', 'bizmaster'), $allowed_html)
            )
		)
    ));

	CSF::createMetabox($prefix . '_post_link_options', array(
        'title' => esc_html__('Link Post Format Options', 'bizmaster'),
        'post_type' => 'post',
        'post_formats' => 'link'
    ));

	CSF::createSection($prefix . '_post_link_options', array(
        'fields' => array(
			array(
                'id' => 'link_url',
                'type' => 'text',
                'title' => esc_html__('Enter Link URL', 'bizmaster'),
                'desc' => wp_kses(__('enter <mark>link url</mark> to show in frontend', 'bizmaster'), $allowed_html)
            ),
			array(
                'id' => 'link_target',
                'type' => 'select',
                'title' => esc_html__('Select Link Target', 'bizmaster'),
				'options' => array(
					'_blank' => 'Open New Window',
					'_self' => 'Open Same Window'
				),
				'default' => '_self',
				'desc' => wp_kses(__('select <mark>link target</mark> to show in frontend', 'bizmaster'), $allowed_html)
            )
		)
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
		$show_page_container_options = true;
		if( isset($_GET['post']) && (int) $_GET['post'] === (int) get_option( 'page_for_posts' ) ){
			$show_page_container_options = false;
		}

		if($show_page_container_options == true) {

			CSF::createMetabox($prefix . '_page_container_options', array(
					'title' => esc_html__('Front Display Options', 'bizmaster'),
					'post_type' => array('page', 'post', 'service', 'project', 'team'),
			));

			CSF::createSection($prefix . '_page_container_options', array(
					'title' => esc_html__('Layout & Colors', 'bizmaster'),
					'icon' => 'fa fa-columns',
					'fields' => Bizmaster_Group_Fields::page_layout()
			));

			CSF::createSection($prefix . '_page_container_options', array(
					'title' => esc_html__('Header Footer & Breadcrumb', 'bizmaster'),
					'icon' => 'fa fa-header',
					'fields' => Bizmaster_Group_Fields::Page_Container_Options('header_options')
			));

			CSF::createSection($prefix . '_page_container_options', array(
					'title' => esc_html__('Width & Padding', 'bizmaster'),
					'icon' => 'fa fa-file-o',
					'fields' => Bizmaster_Group_Fields::Page_Container_Options('container_options')
			));
		}

    //	Service Meta Box
    CSF::createMetabox($prefix . '_service_options', array(
        'title' => esc_html__('Service Options', 'bizmaster'),
        'post_type' => 'service',
    ));

    CSF::createSection($prefix . '_service_options', array(
        'fields' => array(
            array(
                'id' => 'service_icon',
                'type' => 'media',
                'title' => esc_html__('Icon', 'bizmaster'),
                'desc' => wp_kses(__('Select Your Icon', 'bizmaster'), $allowed_html)
            ),
            array(
                'id' => 'service_content',
                'type' => 'textarea',
                'title' => esc_html__('Service Content', 'bizmaster'),
                'desc' => wp_kses(__('Select Your service content', 'bizmaster'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
     Team Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'bizmaster'),
        'post_type' => array('team'),
        'priority' => 'high'
    ));

		CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Info', 'bizmaster'),
        'id' => 'bizmaster-info',
        'fields' => array(
            array(
                'id' => 'designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'bizmaster'),
            )
				)
    ));

    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Social Info', 'bizmaster'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'social-icons',
                'type' => 'repeater',
                'title' => esc_html__('Social Info', 'bizmaster'),
                'fields' => array(

                    array(
                        'id' => 'title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'bizmaster')
                    ),
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'bizmaster')
                    ),
                    array(
                        'id' => 'url',
                        'type' => 'text',
                        'title' => esc_html__('URL', 'bizmaster')
                    ),

                ),
            ),
        )
    ));

    //	Project Meta Box
    CSF::createMetabox($prefix . '_project_options', array(
        'title' => esc_html__('Project Options', 'bizmaster'),
        'post_type' => 'project',
    ));

    CSF::createSection($prefix . '_project_options', array(
        'fields' => array(
            array(
                'id' => 'project_subtitle',
                'type' => 'text',
                'title' => esc_html__('Project Subtitle', 'bizmaster'),
                'default' => esc_html__('Development Coaches', 'bizmaster'),
            ),
            array(
                'id' => 'project_icon',
                'type' => 'media',
                'title' => esc_html__('Icon', 'bizmaster'),
                'desc' => wp_kses(__('Select Your Icon', 'bizmaster'), $allowed_html)
            ),
        )
    ));

    //	Event Meta Box
    CSF::createMetabox($prefix . '_event_options', array(
        'title' => esc_html__('Event Options', 'bizmaster'),
        'post_type' => 'event',
    ));

    CSF::createSection($prefix . '_event_options', array(
        'fields' => array(
            array(
                'id' => 'event_icon',
                'default' => 'flaticon-protection',
                'type' => 'icon',
                'title' => esc_html__('Icon', 'bizmaster'),
                'desc' => wp_kses(__('Select Your Icon', 'bizmaster'), $allowed_html)
            ),
            array(
                'id' => 'event_date_option',
                'type' => 'text',
                'title' => esc_html__('Event Date', 'bizmaster'),
                'default' => esc_html__('21', 'bizmaster'),
            ),
            array(
                'id' => 'event_month_option',
                'type' => 'text',
                'title' => esc_html__('Event Month', 'bizmaster'),
                'default' => esc_html__('Feb', 'bizmaster'),
            ),
            array(
                'id' => 'event_year_option',
                'type' => 'text',
                'title' => esc_html__('Event Year', 'bizmaster'),
                'default' => esc_html__('2024', 'bizmaster'),
            ),
            array(
                'id' => 'event_time_option',
                'type' => 'text',
                'title' => esc_html__('Event Time', 'bizmaster'),
                'default' => esc_html__('10:00am', 'bizmaster'),
            ),
            array(
                'id' => 'event_location_option',
                'type' => 'text',
                'title' => esc_html__('Event Location', 'bizmaster'),
                'default' => esc_html__('684 Ann St. FL 34608', 'bizmaster'),
            )
        )
    ));

    //	Courses Meta Box
    CSF::createMetabox($prefix . '_courses_options', array(
        'title' => esc_html__('Courses Options', 'bizmaster'),
        'post_type' => 'courses',
    ));

    CSF::createSection($prefix . '_courses_options', array(
        'title' => esc_html__('Social Info', 'bizmaster'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'course_start_date_option',
                'type' => 'text',
                'title' => esc_html__('Start From', 'bizmaster'),
                'default' => esc_html__('Thursday, Nov 4, 2024', 'bizmaster'),
            ),
            array(
                'id' => 'study-option',
                'type' => 'repeater',
                'title' => esc_html__('Study Options', 'bizmaster'),
                'fields' => array(

                    array(
                        'id' => 'qualification',
                        'type' => 'text',
                        'title' => esc_html__('Qualification', 'bizmaster'),
                        'default' => esc_html__('Bachelor of Aviation (Hons)', 'bizmaster'),
                    ),
                    array(
                        'id' => 'length',
                        'type' => 'text',
                        'title' => esc_html__('Length', 'bizmaster'),
                        'default' => esc_html__('9 months full time', 'bizmaster'),
                    ),
                    array(
                        'id' => 'code',
                        'type' => 'text',
                        'title' => esc_html__('Code', 'bizmaster'),
                        'default' => esc_html__('ba1x', 'bizmaster'),
                    ),
                ),
            ),
            array(
                'id' => 'course_module_option',
                'type' => 'text',
                'title' => esc_html__('Course Module Title', 'bizmaster'),
                'default' => esc_html__('Download full course Module', 'bizmaster'),
            ),
            array(
                'id' => 'course_module_button_title',
                'type' => 'text',
                'title' => esc_html__('Course Module Button Title', 'bizmaster'),
                'default' => esc_html__('Download', 'bizmaster'),
            ),
            array(
                'id' => 'course_module_button_url',
                'type' => 'text',
                'title' => esc_html__('Course Module Button URL', 'bizmaster'),
                'default' => esc_html__('#', 'bizmaster'),
            ),
        )
    ));
}//endif
