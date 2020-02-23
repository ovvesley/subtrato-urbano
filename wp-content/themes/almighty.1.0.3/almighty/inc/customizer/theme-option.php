<?php
/**
 * Theme Options Panel.
 *
 * @package Almighty
 */

$default = almighty_get_default_theme_options();

/*slider and its property section*/
require get_template_directory().'/inc/customizer/featured-blog.php';

// Setting header_bg_scheme.
$wp_customize->add_setting('header_bg_scheme',
	array(
		'default'           => $default['header_bg_scheme'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'almighty_sanitize_select',
	)
);
$wp_customize->add_control('header_bg_scheme',
	array(
		'label'    => esc_html__('Select Header Color Scheme', 'almighty'),
		'section'  => 'header_image',
		'type'     => 'select',
		'choices'  => array(
			'dark-scheme' => esc_html__('Dark Scheme', 'almighty'),
			'light-scheme' => esc_html__('Light-scheme', 'almighty'),
		),
		'priority' => 100,
	)
);
// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
	array(
		'title'      => esc_html__('Theme Options', 'almighty'),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

/*layout management section start */
$wp_customize->add_section('theme_option_section_settings',
	array(
		'title'      => esc_html__('Layout Management', 'almighty'),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);


/*Global Layout*/
$wp_customize->add_setting('global_layout',
	array(
		'default'           => $default['global_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'almighty_sanitize_select',
	)
);
$wp_customize->add_control('global_layout',
	array(
		'label'          => esc_html__('Sidebar Options', 'almighty'),
		'section'        => 'theme_option_section_settings',
		'choices'        => array(
			'left-sidebar'  => esc_html__('Left Sidebar', 'almighty'),
			'right-sidebar' => esc_html__('Right Sidebar', 'almighty'),
			'no-sidebar'    => esc_html__('No Sidebar', 'almighty'),
		),
		'type'     => 'select',
		'priority' => 170,
	)
);

// Setting - read_more_button_text.
$wp_customize->add_setting('read_more_button_text',
	array(
		'default'           => $default['read_more_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('read_more_button_text',
	array(
		'label'    => esc_html__('Button Text for Read More', 'almighty'),
		'section'  => 'theme_option_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);

/*content excerpt in global*/
$wp_customize->add_setting('excerpt_length_global',
	array(
		'default'           => $default['excerpt_length_global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'almighty_sanitize_positive_integer',
	)
);
$wp_customize->add_control('excerpt_length_global',
	array(
		'label'       => esc_html__('Archive Excerpt Length', 'almighty'),
		'section'     => 'theme_option_section_settings',
		'type'        => 'number',
		'priority'    => 175,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);


// Pagination Section.
$wp_customize->add_section('pagination_section',
	array(
		'title'      => esc_html__('Pagination Options', 'almighty'),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting('pagination_type',
	array(
		'default'           => $default['pagination_type'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'almighty_sanitize_select',
	)
);
$wp_customize->add_control('pagination_type',
	array(
		'label'    => esc_html__('Pagination Type', 'almighty'),
		'section'  => 'pagination_section',
		'type'     => 'select',
		'choices'  => array(
			'numeric' => esc_html__('Numeric', 'almighty'),
			'default' => esc_html__('Default (Older / Newer Post)', 'almighty'),
		),
		'priority' => 100,
	)
);

// Footer Section.
$wp_customize->add_section('footer_section',
	array(
		'title'      => esc_html__('Footer Options', 'almighty'),
		'priority'   => 130,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting('copyright_text',
	array(
		'default'           => $default['copyright_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('copyright_text',
	array(
		'label'    => esc_html__('Footer Copyright Text', 'almighty'),
		'section'  => 'footer_section',
		'type'     => 'text',
		'priority' => 120,
	)
);


global $almighty_google_fonts;

$wp_customize->add_section( 'colors',
    array(
        'title'      => esc_html__( 'Color Options', 'almighty' ),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);
// Setting - primary_color.
$wp_customize->add_setting('primary_color',
    array(
        'default'           => $default['primary_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control('primary_color',
    array(
        'label'    => esc_html__('Primary Color', 'almighty'),
        'section'  => 'colors',
        'type'     => 'color',
        'priority' => 100,
    )
);


$wp_customize->add_section('font_typo_section',
    array(
        'title'      => esc_html__('Fonts & Typography', 'almighty'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);
// Setting - primary_font.
$wp_customize->add_setting('primary_font',
    array(
        'default'           => $default['primary_font'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almighty_sanitize_select',
    )
);
$wp_customize->add_control('primary_font',
    array(
        'label'    => esc_html__('Primary Font', 'almighty'),
        'section'  => 'font_typo_section',
        'type'     => 'select',
        'choices'  => $almighty_google_fonts,
        'priority' => 100,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('secondary_font',
    array(
        'default'           => $default['secondary_font'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'almighty_sanitize_select',
    )
);
$wp_customize->add_control('secondary_font',
    array(
        'label'    => esc_html__('Secondary Font', 'almighty'),
        'section'  => 'font_typo_section',
        'type'     => 'select',
        'choices'  => $almighty_google_fonts,
        'priority' => 110,
    )
);