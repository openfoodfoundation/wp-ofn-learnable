<?php

add_action('init', 'create_post_type');
function create_post_type() {
  register_post_type('ofn_learnable',
    array(
      'labels' => array(
        'name' => __( 'Learnables' ),
        'singular_name' => __( 'Learnable' ),
        'add_new_item' => __( 'Add New Learnable' ),
        'edit_item' => __( 'Edit Learnable' ),
        'new_item' => __( 'New Learnable' ),
        'view_item' => __( 'View Learnable' ),
        'all_items' => __( 'All Learnables' ),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'learnable'),
      'taxonomies' => array('category', 'post_tag'),
      'supports' => array('title', 'thumbnail', 'revisions'),
    )
  );
}
