<?php

/**
 *
 * @package Foodup
 */
function foodup_customize_register($wp_customize) {

$newstype_default = newstype_get_default_theme_options();



//section title
$wp_customize->add_setting('tabbed_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new newses_Section_Title(
        $wp_customize,
        'tabbed_section_title',
        array(
            'label'             => esc_html__( 'Tabbed Section ', 'newses' ),
            'section'           => 'frontpage_main_banner_section_settings',
            'priority'          => 90,
        )
    )
);

// Setting - featured_news_section_title.
$wp_customize->add_setting('latest_tab_title',
    array(
        'default' => $newstype_default['latest_tab_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('latest_tab_title',
    array(
        'label' => esc_html__('Latest Tab Title', 'newstype'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 100,
    )
);

// Setting - featured_news_section_title.
$wp_customize->add_setting('popular_tab_title',
    array(
        'default' => $newstype_default['popular_tab_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('popular_tab_title',
    array(
        'label' => esc_html__('Popular Tab Title', 'newstype'),
        'section' => 'frontpage_main_banner_section_settings',
        'type' => 'text',
        'priority' => 110,
    )
);

}
add_action('customize_register', 'foodup_customize_register');