<?php
$text = $args['text'] ?? '';
$url  = $args['url'] ?? '#';
?>

<a href="<?php echo $url; ?>" class="button">
    <?php echo $text; ?>
</a>