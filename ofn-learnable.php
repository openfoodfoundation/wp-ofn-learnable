<?php
/*
  Plugin Name: OFN Learnable
  Description: Manage a tile index of resources, stories and models
  Version: 0.0.1
  Author: Rohan Mitchell
  Author URI: https://github.com/RohanM
  Plugin URI: http://openfoodnetwork.org
*/
/*  Copyright 2016 Open Food Foundation

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/


add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'ofn_learnable',
    array(
      'labels' => array(
        'name' => __( 'Learnables' ),
        'singular_name' => __( 'Learnable' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'learnable'),
      'taxonomies' => array('category', 'post_tag'),
      'supports' => array('title', 'thumbnail', 'revisions'),
    )
  );
}


function ofn_learnable_all($atts) {
    $html = '';

    $args = array('post_type' => 'ofn_learnable');
    $loop = new WP_Query($args);

    while($loop->have_posts()) {
        $loop->the_post();

        $title = get_the_title();
        $image = wp_get_attachment_url(get_post_thumbnail_id());
        $category = get_the_category()[0]->name;
        $link = get_field('link');

        $html .= ofn_learnable_as_html($title, $image, $category, $link);
    }

    return $html;
}
add_shortcode('learnable_all', 'ofn_learnable_all');


function ofn_learnable_as_html($title, $image, $category, $link) {
    $html = '';

    $html .= '<div class="ofn-learnable" style="background-image: url('.$image.');">'."\n";
    $html .= '  <a href="'.$link.'">'."\n";
    $html .= '    <div class="title">'.$title.'</div>'."\n";
    $html .= "\n";
    $html .= '    <div class="category category-'.strtolower($category).'">'."\n";
    $html .= '      '.$category.''."\n";
    $html .= '    </div>'."\n";
    $html .= '  </a>'."\n";
    $html .= '</div>'."\n";

    return $html;
}
