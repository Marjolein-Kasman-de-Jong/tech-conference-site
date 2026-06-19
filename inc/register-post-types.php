<?php

function register_post_types() {
    register_post_type('event', [
        'public' => true,
        'label' => 'Events',
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'schedule',
        ],
        'menu_icon' => 'dashicons-calendar',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);

    register_post_type('speaker', [
        'public' => true,
        'label' => 'Speakers',
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'speakers',
        ],
        'menu_icon' => 'dashicons-microphone',
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}

add_action('init', 'register_post_types');