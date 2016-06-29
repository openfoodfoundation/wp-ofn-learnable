<?php

function ofn_learnable_enqueue_styles() {
    $plugin_url = plugin_dir_url(__FILE__).'../';

    wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );
}
add_action('wp_enqueue_scripts', 'ofn_learnable_enqueue_styles');
