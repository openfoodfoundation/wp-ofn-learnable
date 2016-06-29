<?php

function ofn_learnable_enqueue_assets() {
    $plugin_url = plugin_dir_url(__FILE__).'../';

    wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );

    wp_register_script('ofn-learnable', $plugin_url.'js/script.js', array('jquery', 'masonry'), '0.0.1', true);

    wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'ofn-learnable', 'js/script.js', 'masonry' );
}
add_action('wp_enqueue_scripts', 'ofn_learnable_enqueue_assets');
