<?php

function ofn_learnable_all($atts) {
    $html = '<div class="ofn-learnables">'."\n";

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

    $html .= '</div>';

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
