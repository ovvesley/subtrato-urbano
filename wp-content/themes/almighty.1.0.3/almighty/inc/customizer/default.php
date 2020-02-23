<?php
/**
 * Default theme options.
 *
 * @package Almighty
 */

if (!function_exists('almighty_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function almighty_get_default_theme_options() {

	$defaults = array();

    $defaults['enable_featured_blog'] = 0;
    $defaults['select_category_for_featured_blog'] = 1;
	$defaults['featured_blog_title']    = esc_html__('You May Also Like', 'almighty');

    $defaults['show_slider_section']           = 1;
    $defaults['number_of_home_slider']         = 5;
    $defaults['show_slider_content_section']         = 0;
    $defaults['number_of_content_home_slider'] = 30;
    $defaults['slider_button_text']            =  __('Learn More','almighty');
    $defaults['select_slider_from']            = 'from-category';
    $defaults['select-page-for-slider']        = 0;
    $defaults['select_category_for_slider']    = 1;
	$defaults['slider_text_bg_color'] = '#000000';
	$defaults['slider_text_color'] = '#fff';


	$defaults['header_bg_scheme']            = 'dark-scheme';


	$defaults['enable_instagram']               = 0;
	$defaults['instagram_main_title_text']           = __('Check Our Instagram','almighty');
	$defaults['instagram_title_text']           = __('View more in Instagram','almighty');
	$defaults['instagram_user_name']            = '';
	$defaults['instagram_user_api']            = '';
	$defaults['number_of_instagram']            = 10;


    /*layout*/
	$defaults['read_more_button_text']    = esc_html__('Continue Reading', 'almighty');
	$defaults['global_layout']            = 'right-sidebar';
	$defaults['excerpt_length_global']    = 50;
	$defaults['pagination_type']          = 'numeric';
	$defaults['copyright_text']           = esc_html__('Copyright All rights reserved', 'almighty');


	$defaults['primary_color'] = '#F44336';
	$defaults['primary_font']      = 'Roboto:100,300,400,500,700';
	$defaults['secondary_font']    = 'Oswald:400,300,700';
	// Pass through filter.
	$defaults = apply_filters('almighty_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;