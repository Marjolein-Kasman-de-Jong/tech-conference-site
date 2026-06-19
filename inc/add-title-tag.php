<?php

function add_title_tag() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'add_title_tag');


function get_document_title($title) {
    if (is_front_page()) {
        return get_bloginfo('name');
    }

    if (is_post_type_archive()) {
        $post_type = get_query_var('post_type');

        if (is_array($post_type)) {
            $post_type = reset($post_type);
        }

        $archive_titles = [
            'event' => 'Schedule',
            'speaker' => 'Speakers',
        ];

        return $archive_titles[$post_type] ?? ucfirst($post_type);
    }

    return $title;
}

add_filter('pre_get_document_title', 'get_document_title');