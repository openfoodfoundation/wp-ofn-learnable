<?php

function ofn_learnable_enqueue_assets() {
    $plugin_url = plugin_dir_url(__FILE__).'../';

    wp_register_script('ofn-learnable', $plugin_url.'js/script.js', array('jquery', 'isotope'), '0.0.1', true);

    wp_enqueue_style('style', $plugin_url.'css/style.css');
    wp_enqueue_script('isotope');
    wp_enqueue_script('ofn-learnable', 'js/script.js', 'isotope');
}
add_action('wp_enqueue_scripts', 'ofn_learnable_enqueue_assets');
