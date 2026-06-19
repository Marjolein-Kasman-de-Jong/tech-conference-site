<?php

function add_title_tag() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'add_title_tag');