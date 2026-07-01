<?php

function add_custom_block_categories( $block_categories ) {
    // Add the custom category at the beginning.
    array_unshift( $block_categories, [
        'slug'  => 'tech-conference-site-blocks',
        'title' => __( 'Tech Conference Site Blocks', 'tech-conference-site' )
    ] );

    return $block_categories;
}

function register_blocks() {
    // Enqueue block script
    wp_register_script(
        'theme-block-editor',
        get_theme_file_uri('/assets/js/main.js'),
        ['wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components'],
        filemtime(get_theme_file_path('/assets/js/main.js')),
        false
    );

    // Register the block; block.json links the editor script handle.
    register_block_type(get_template_directory() . '/blocks/hero');
}

// Filter the block categories.
add_filter( 'block_categories_all', 'add_custom_block_categories', 10, 1 );

add_action('init', 'register_blocks', 9);
