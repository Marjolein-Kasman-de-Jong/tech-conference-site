<?php

function enqueue_styles() {
    // Load main.css
    wp_enqueue_style(
        'main-styles',
        get_theme_file_uri('/assets/css/main.css'),
        [],
        filemtime(get_theme_file_path('/assets/css/main.css'))
    );
}

add_action('wp_enqueue_scripts', 'enqueue_styles');