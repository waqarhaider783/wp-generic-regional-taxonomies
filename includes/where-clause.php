<?php

/**
 * Adds regions to where clauses for post types
 * 
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * @since 0.0.1
 */
function add_where_clause_to_posts()
{

  $post_types = [
    'Category',
    'Tag'
  ];

  $locations = acf_get_field_group('group_61b6fbc558a07')['location'];

  foreach ($locations as $location) :

    if ($location[0]['param'] === 'post_type') :

      array_push($post_types, str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $location[0]['value']))));

    endif;

  endforeach;

  foreach ($post_types as $post_type) :

    register_graphql_field("RootQueryTo{$post_type}ConnectionWhereArgs", 'region', [
      'type'        => 'String',
      'description' => __('The region to fetch content for. Also fetches all resources with an empty value for this field.', 'regional-taxonomies'),
    ]);

  endforeach;

}


/**
 * Meta query builder for filtering results by "where" clause
 * 
 * @author Waqar Haider <waqarhaider783@yahoo.com>
 * @since 0.0.1
 */
function where_meta_query($query_args, $_, $args)
{
  $post_object_id = $args['where']['region'];

  if (isset($post_object_id)) {
    $query_args['meta_query'] = [
      'relation'  => 'OR',
      [
        'key'     => 'region',
        'value'   => '',
        'compare' => 'NOT EXISTS'
      ],
      [
        'key'     => 'region',
        'value'   => $post_object_id,
        'compare' => 'LIKE'
      ],

    ];
  }

  return $query_args;
}
