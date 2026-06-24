<?php
// Image folder path
$images_uri = get_template_directory_uri() . '/assets/images';
?>

<header class="page-header">
    <div class="content-wrapper">
        <img class="logo" src="<?php echo $images_uri; ?>/logo.svg" alt="">
        <div class="menu-wrapper menu-closed">
            <button id="btn-menu-open" class="btn-menu" type="button">
                <img class="menu-icon" src="<?php echo $images_uri; ?>/icon-menu.svg" alt="">
            </button>
            <button id="btn-menu-close" class="btn-menu" type="button">
                <img class="close-icon" src="<?php echo $images_uri; ?>/icon-cross.svg" alt="">
            </button>

            <nav class="page-header-nav" aria-label="Hoofdmenu">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary_menu',
                    'container' => false,
                    'menu_class' => 'page-header-nav-menu',
                ]);
                ?>
            </nav>
        </div>
    </div>
</header>