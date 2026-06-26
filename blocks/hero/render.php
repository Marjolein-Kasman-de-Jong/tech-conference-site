<?php
$theme_uri = get_template_directory_uri();
$settings_page_id = 138;
$event_date = get_field("event_date", $settings_page_id);
$event_address = get_field("address", $settings_page_id);
$abbreviation = get_field("abbreviation", $settings_page_id);
?>

<section class="hero">
    <div class="content-wrapper">
        <div class="slogan">
            <h1>
                <?php bloginfo("description"); ?>
            </h1>
            <div class="event-details">
                <p class="date">
                    <?php echo $event_date; ?>
                </p>
                <p class="address">
                    <?php echo $event_address; ?>, <?php echo $abbreviation; ?>
                </p>
            </div>
        </div>
        <div class="featured-keynote">
            Featured keynote
        </div>
    </div>

</section>