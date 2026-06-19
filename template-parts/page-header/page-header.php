<header class="page-header">
    <div class="page-header-wrapper-left">
        <?php bloginfo('name'); ?>
    </div>
    <div class="page-header-wrapper-right">
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
</header>