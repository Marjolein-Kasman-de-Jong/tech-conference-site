<?php

function hide_editor_for_settings_page() {
    $settings_page_id = 138;

    if (!is_admin()) {
        return;
    }

    if (!isset($_GET['post'])) {
        return;
    }

    if ((int) $_GET['post'] !== $settings_page_id) {
        return;
    }

    remove_post_type_support('page', 'editor');
}

add_action('admin_init', 'hide_editor_for_settings_page');