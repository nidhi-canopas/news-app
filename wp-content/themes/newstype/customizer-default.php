<?php
/**
 * Default theme options.
 *
 * @package Newstype
 */

if (!function_exists('newstype_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function newstype_get_default_theme_options() {

    $defaults = array();

    $defaults['select_tab_section_mode'] = 'default';
    $defaults['latest_tab_title'] = __("Latest", 'newstype');
    $defaults['popular_tab_title'] = __("Popular", 'newstype');
    $defaults['number_of_slides'] = 5;

	return $defaults;

}
endif;