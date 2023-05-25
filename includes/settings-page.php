<?php

/**
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * Description: Add Menu in WP Admin Panel Sidebar
 */
function v8_region_meta_settings_init()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(
            array(
                'page_title'    => __('Regions', TEXT_DOMAIN),
                'menu_title'    => __('Regions'),
                'menu_slug'     => 'v8-region-meta',
                'position'      => 99,
                'capability'    => 'edit_posts',
                'redirect'          => false,
                'show_in_graphql' => true,
                'update_button' => 'Update Regions',
                'updated_message' => "Regions Updated Successfully"
            )
        );
    }
}
