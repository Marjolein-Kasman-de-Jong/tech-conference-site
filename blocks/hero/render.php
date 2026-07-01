<?php

// Retrieve general hero data from the settings page and block attributes.
$theme_uri = get_template_directory_uri();
$settings_page_id = 138;

$event_date = get_field('event_date', $settings_page_id);
$event_address = get_field('address', $settings_page_id);
$abbreviation = get_field('abbreviation', $settings_page_id);

$featured_keynote_title = $attributes['featuredKeynoteTitle'] ?? '';
$button_text = $attributes['buttonText'] ?? 'View talk';

// Default values prevent notices when no keynote or speaker is found.
$keynote_event_title = '';
$keynote_event_url = '';
$keynote_event_details = [];
$keynote_speaker_name = '';
$keynote_speaker_role = '';
$keynote_speaker_company = '';
$keynote_speaker_avatar_url = '';

// Retrieve only the first published event from the keynote track.
$keynote_query = [
    'post_type' => 'event',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'tax_query' => [
        [
            'taxonomy' => 'track',
            'field' => 'slug',
            'terms' => 'keynote',
        ],
    ],
];

$keynote_events = get_posts($keynote_query);

if (!empty($keynote_events)) {
    $keynote_event = $keynote_events[0];
    $keynote_event_title = get_the_title($keynote_event);
    $keynote_event_url = get_permalink($keynote_event);

    // Convert the keynote day to a specific date based on the conference start date.
    $keynote_day = max(1, (int) get_field('day', $keynote_event->ID));
    $conference_start_date = get_post_meta($settings_page_id, 'start_date', true);
    $date = DateTimeImmutable::createFromFormat('!Ymd', $conference_start_date);

    if ($date !== false) {
        $date = $date->modify('+' . ($keynote_day - 1) . ' days');
        $keynote_event_details[] = strtoupper($date->format('M d'));
    }

    // Normalize the start time and display it without seconds when valid.
    $keynote_time = preg_replace(
        '/\s+/',
        '',
        (string) get_field('start_time', $keynote_event->ID)
    );

    if ($keynote_time !== '') {
        $time = DateTimeImmutable::createFromFormat('!H:i:s', $keynote_time)
            ?: DateTimeImmutable::createFromFormat('!H:i', $keynote_time);

        $keynote_event_details[] = $time ? $time->format('G:i') : $keynote_time;
    }

    // Add the room as the final part of the event details.
    $keynote_room = trim((string) get_field('room', $keynote_event->ID));

    if ($keynote_room !== '') {
        $keynote_event_details[] = 'ROOM ' . strtoupper($keynote_room);
    }

    // ACF can return the related speaker as an array, post object, or ID.
    $speaker = get_field('related_speaker', $keynote_event->ID);

    if (is_array($speaker)) {
        $speaker = reset($speaker);
    }

    if ($speaker instanceof WP_Post || is_numeric($speaker)) {
        $speaker_id = $speaker instanceof WP_Post ? $speaker->ID : (int) $speaker;
        $keynote_speaker_name = get_the_title($speaker_id);
        $keynote_speaker_role = get_field('role', $speaker_id) ?: '';
        $keynote_speaker_company = get_field('company', $speaker_id) ?: '';
        $keynote_speaker_avatar = get_field('avatar', $speaker_id);

        // Determine the avatar URL for all supported ACF return formats.
        if (is_array($keynote_speaker_avatar)) {
            $keynote_speaker_avatar_url = $keynote_speaker_avatar['url'] ?? '';

            if ($keynote_speaker_avatar_url === '' && !empty($keynote_speaker_avatar['ID'])) {
                $keynote_speaker_avatar_url = wp_get_attachment_image_url(
                    (int) $keynote_speaker_avatar['ID'],
                    'full'
                ) ?: '';
            }
        } elseif (is_numeric($keynote_speaker_avatar)) {
            $keynote_speaker_avatar_url = wp_get_attachment_image_url(
                (int) $keynote_speaker_avatar,
                'full'
            ) ?: '';
        } elseif (is_string($keynote_speaker_avatar)) {
            $keynote_speaker_avatar_url = $keynote_speaker_avatar;
        }
    }
}

?>

<section class="hero">
    <div class="content-wrapper">
        <div class="slogan">
            <h1>
                <?php bloginfo("description"); ?>_
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
            <div class="wrapper-left">
            <h2 class="featured-keynote-title">
                // <?php echo $featured_keynote_title; ?>
            </h2>
            <div class="featured-keynote-speaker">
                <p class="name">
                    <?php echo $keynote_speaker_name; ?>
                </p>
                <p class="role">
                    <?php echo $keynote_speaker_role; ?>
                </p>
                <p class="company">
                    @<?php echo $keynote_speaker_company; ?>
                </p>
            </div>
            <div class="featured-keynote-details">
                <h3 class="title">
                    <?php echo $keynote_event_title; ?>
                </h3>
                <div class="details">
                    <?php echo implode(' / ', $keynote_event_details); ?>
                </div>
            </div>
            <?php
            get_template_part('components/button', null, [
                'text' => $button_text,
                'url' => $keynote_event_url,
            ]);
            ?>
            </div>
            <div class="wrapper-right">
                <img
                    src="<?php echo $keynote_speaker_avatar_url; ?>"
                    alt="<?php echo $keynote_speaker_name; ?>"
                >
            </div>
        </div>
    </div>

</section>