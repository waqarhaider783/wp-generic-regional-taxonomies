<?php

/**
 * Definition of field groups used by the plugin
 * 
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * @since 0.0.1
 */

function add_regional_tag_field_group()
{
  if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
      'key'                 => 'group_61b6fbc558a07',
      'title'               => 'Regional Meta Tagging',
      'fields'              => array(
        array(
          'key'             => 'field_61b6fbfa34969',
          'label'           => 'Region',
          'name'            => 'region',
          'type'            => 'select',
          'instructions'    => 'This is to declare which region this content belongs to. Leave empty if applicable to all regions.',
          'show_in_graphql' => 1,
          'allow_null'      => 1,
          'multiple'  => 1,
          'return_format'   => 'value',
        ),
      ),
      'location'            => array(
        array(
          array(
            'param'     => 'post_type',
            'operator'  => '==',
            'value'     => 'post',
          ),
        ),
        array(
          array(
            'param'     => 'post_type',
            'operator'  => '==',
            'value'     => 'page',
          ),
        ),
        array(
          array(
            'param'     => 'taxonomy',
            'operator'  => '==',
            'value'     => 'all',
          ),
        ),
      ),
      'show_in_graphql'     => 1,
      'graphql_field_name'  => 'regionalMetaTag',
    ));

  endif;
}
