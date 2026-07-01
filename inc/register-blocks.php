<?php

function add_custom_block_categories( $block_categories ) {
    // Voeg custom categorie toe aan het begin
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
        ['wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor'],
        filemtime(get_theme_file_path('/assets/js/main.js')),
        false
    );

    // Registreer block via block.json
    $block = register_block_type(get_template_directory() . '/blocks/hero', [
        'editor_script' => 'theme-block-editor',
    ]);
}

// Filter voor block categorieën
add_filter( 'block_categories_all', 'add_custom_block_categories', 10, 1 );

add_action('init', 'register_blocks', 9);
