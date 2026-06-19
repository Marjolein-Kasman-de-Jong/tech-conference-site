<?php

function register_menus() {
    register_nav_menus([
        'primary_menu' => 'Hoofdmenu',
    ]);
}

add_action('after_setup_theme', 'register_menus');