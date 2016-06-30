<?php

function ofn_learnable_all($atts) {
    $html = '<div class="ofn-learnables">'."\n";

    $args = array('post_type' => 'ofn_learnable');
    $loop = new WP_Query($args);

    while($loop->have_posts()) {
        $loop->the_post();

        $title = get_the_title();

        $image = wp_get_attachment_url(get_post_thumbnail_id());
        $image_meta = wp_get_attachment_metadata(get_post_thumbnail_id());
        $tile_height = ofn_learnable_tile_height($image_meta);

        $category = ofn_learnable_category(get_the_category());
        $link = get_field('link');

        $html .= ofn_learnable_as_html($title, $image, $tile_height, $category, $link);
    }

    $html .= '</div>';

    return $html;
}
add_shortcode('learnable_all', 'ofn_learnable_all');


function ofn_learnable_as_html($title, $image, $tile_height, $category, $link) {
    $html = '';

    $html .= '<div class="ofn-learnable" style="background-image: url('.$image.'); height: '.$tile_height.'px;">'."\n";
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

function ofn_learnable_category($category) {
    return $category[0]->name;
}

// Calculate the desired height of the tile (which has a fixed width)
// to match the aspect ratio of the background image.
function ofn_learnable_tile_height($image_meta) {
    $tile_width = 364;
    $ratio = $image_meta['height'] / $image_meta['width'];

    return round($tile_width * $ratio);
}