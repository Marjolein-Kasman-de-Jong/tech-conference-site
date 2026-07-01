<?php
$text = $args['text'] ?? '';
$url  = $args['url'] ?? '#';
$show_arrow = $args['show_arrow'] ?? true;
$icon = get_theme_file_uri("/assets/images/icon-arrow-right.svg");
?>

<a href="<?php echo $url; ?>" class="button">
    <?php echo $text; ?>
    <?php if ($show_arrow) : ?>
        <img src="<?php echo $icon; ?>" class="button-arrow" alt="" aria-hidden="true">
    <?php endif; ?>
</a>
