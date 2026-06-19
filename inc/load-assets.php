<?php

function enqueue_assets() {

    // CSS
    wp_enqueue_style(
        'main-styles',
        get_theme_file_uri('/assets/css/main.css'),
        [],
        filemtime(get_theme_file_path('/assets/css/main.css'))
    );

    // JavaScript
    wp_enqueue_script(
        'main-script',
        get_theme_file_uri('/assets/js/main.js'),
        [],
        filemtime(get_theme_file_path('/assets/js/main.js')),
        true
    );
}

add_action('wp_enqueue_scripts', 'enqueue_assets');