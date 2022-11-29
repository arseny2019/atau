<?php
/**
 * atau functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package atau
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


// off auto PARAGRAPHS from contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    load_template(get_template_directory() . '/inc/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'kirp_register_custom_fields');

function kirp_register_custom_fields()
{
    require get_template_directory() . '/inc/custom-fields-options/metabox.php';
    require get_template_directory() . '/inc/custom-fields-options/theme-options.php';
}


require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/enqueue-scripts.php';
require get_template_directory() . '/inc/navigation.php';
require get_template_directory() . '/inc/data-functions.php';
require get_template_directory() . '/inc/meta-tags.php';
require get_template_directory() . '/inc/redirect-functions.php';
require get_template_directory() . '/inc/ajax.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

