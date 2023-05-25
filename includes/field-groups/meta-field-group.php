<?php

/**
 * Definition of field groups used by the plugin
 * 
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * @since 0.0.1
 */

function add_regional_meta_field_group()
{
  if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
      'key'     => 'group_61b32822c0483',
      'title'   => 'Regional Meta',
      'fields'  => array(
        array(
          'key'                 => 'field_61b32f1237ad4',
          'label'               => 'Region Codes',
          'name'                => 'region_codes',
          'type'                => 'repeater',
          'instructions'        => 'This is a list of regions that you would like to publish content for.',
          'show_in_graphql'     => 1,
          'layout'              => 'table',
          'button_label'        => 'Add Region',
          'sub_fields'          => array(
            array(
              'key'               => 'field_61b330b437ad5',
              'label'             => 'Region Code',
              'name'              => 'region_code',
              'type'              => 'text',
              'instructions'      => 'Two letter code for this region (for example: fr)',
              'required'          => 1,
              'show_in_graphql'   => 1,
            ),
            array(
              'key'               => 'field_61b331bba91b5',
              'label'             => 'Region Name',
              'name'              => 'region_name',
              'type'              => 'text',
              'instructions'      => 'Full region name for presentation purposes on the back-end and front-end.',
              'required'          => 1,
              'show_in_graphql'   => 1,
            ),
            array(
              'key'               => 'field_61b332afd6d30',
              'label'             => 'Region Flag',
              'name'              => 'region_flag',
              'type'              => 'image',
              'instructions'      => 'The region\'s flag for presentation purposes on the front-end.',
              'required'          => 1,
              'show_in_graphql'   => 1,
              'return_format'     => 'array',
            ),
            array(
              'key'               => 'field_61b333d2c1cb7',
              'label'             => 'Continent',
              'name'              => 'continent',
              'type'              => 'select',
              'instructions'      => 'The continent this region belongs to.',
              'required'          => 1,
              'show_in_graphql'   => 1,
              'return_format'     => 'label',
              'choices'           => array(
                'asia'          => 'Asia',
                'africa'        => 'Africa',
                'north_america' => 'North America',
                'south_america' => 'South America',
                'antarctica'    => 'Antarctica',
                'europe'        => 'Europe',
                'austrialia'    => 'Australia',
              ),
            ),
          ),
        ),
      ),
      'location'            => array(
        array(
          array(
            'param'     => 'options_page',
            'operator'  => '==',
            'value'     => 'v8-region-meta',
          ),
        ),
      ),
      'show_in_graphql'     => 1,
      'graphql_field_name'  => 'regionalMeta',
    ));

  endif;
}
