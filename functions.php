<?php

// Theme setup
require_once get_theme_file_path('/inc/add-title-tag.php');

// Assets
require_once get_theme_file_path('/inc/load-assets.php');

// Navigation
require_once get_theme_file_path('/inc/register-menus.php');

// Custom post types
require_once get_theme_file_path('/inc/register-post-types.php');

// Admin customizations
require_once get_theme_file_path('/inc/hide-editor-for-settings-page.php');

// Blocks
require_once get_theme_file_path('/inc/register-blocks.php');