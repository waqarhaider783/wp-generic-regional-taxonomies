<?php

/**
 * Autoloads regions from the settings page into the select field
 * for regional tagging
 * 
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * @since 0.0.1
 */
function load_regions($field)
{
  $regions = get_field('region_codes', 'option');

  foreach ($regions as $region) :

    $field['choices'][$region['region_code']] = $region['region_name'];

  endforeach;

  return $field;
}

function populate_region($value, $post_id, $field)
{
  if (get_field($field['name'], $post_id)) :

    $value = get_field($field['name'], $post_id);

  endif;

  return $value;
}
