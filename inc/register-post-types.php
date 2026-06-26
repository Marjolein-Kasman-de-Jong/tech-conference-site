<?php

function register_post_types() {
    register_post_type('event', [
        'public' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Events',
            'singular_name' => 'Event',
            'add_new' => 'Nieuw event',
            'add_new_item' => 'Nieuw event toevoegen',
            'edit_item' => 'Event bewerken',
            'new_item' => 'Nieuw event',
            'view_item' => 'Event bekijken',
            'search_items' => 'Events zoeken',
            'not_found' => 'Geen events gevonden',
            'all_items' => 'Alle events',
        ],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'schedule',
        ],
        'menu_icon' => 'dashicons-calendar',
        'supports' => ['title'],
    ]);

    register_post_type('speaker', [
        'public' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => 'Speakers',
            'singular_name' => 'Speaker',
            'add_new' => 'Nieuwe speaker',
            'add_new_item' => 'Nieuwe speaker toevoegen',
            'edit_item' => 'Speaker bewerken',
            'new_item' => 'Nieuwe speaker',
            'view_item' => 'Speaker bekijken',
            'search_items' => 'Speakers zoeken',
            'not_found' => 'Geen speakers gevonden',
            'all_items' => 'Alle speakers',
        ],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'speakers',
        ],
        'menu_icon' => 'dashicons-microphone',
        'supports' => ['title'],
    ]);
}

add_action('init', 'register_post_types');