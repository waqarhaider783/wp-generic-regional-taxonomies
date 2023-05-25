<?php

/**
 *  Plugin Name: Regional Taxonomies
 *  Plugin URI: https://va8ivedigital.com/
 *  Description: This plugin adds regional metadata to posts, pages and taxonomies, along with GraphQL support
 *  Version: 0.0.1
 *  Author: Waqar Haider
 *  Author URI: https://va8ivedigital.com/
 *  Text Domain: regional-taxonomies
 */

/**
 * Import plugin files
 */
require plugin_dir_path(__FILE__) . "includes/settings-page.php";
require plugin_dir_path(__FILE__) . "includes/validation.php";
require plugin_dir_path(__FILE__) . "includes/regional-selections.php";
require plugin_dir_path(__FILE__) . "includes/where-clause.php";
require plugin_dir_path(__FILE__) . "includes/field-groups/meta-field-group.php";
require plugin_dir_path(__FILE__) . "includes/field-groups/tag-field-group.php";

/**
 * Initialize settings page
 */
add_action('acf/init', 'v8_region_meta_settings_init');

/**
 * Add region_meta field group to settings page
 */
add_action('acf/init', 'add_regional_meta_field_group');

/**
 * Add region_meta field group to post types and taxonomies
 */
add_action('acf/init', 'add_regional_tag_field_group');

/**
 * Autoload field choices
 */
add_filter('acf/load_field/name=region', 'load_regions', 10, 4);

/**
 * Autopopulate region selection
 */
add_filter('acf/load_value/name="region"', 'populate_region', 10, 4);

/**
 * Validation for region code
 */
add_filter('acf/validate_value/name=region_code', 'validate_region_code', 10, 4);

/**
 * Convert region code to lowercase
 */
add_filter('acf/update_value/name=region_code', 'lowercase_region_code', 10, 4);

add_action('graphql_register_types', 'add_where_clause_to_posts');

add_filter('graphql_post_object_connection_query_args', 'where_meta_query', 10, 5);
