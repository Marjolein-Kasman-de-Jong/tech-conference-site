<?php
$theme_uri = get_template_directory_uri();
$settings_page_id = 138;
$event_date = get_field("event_date", $settings_page_id);
$event_address = get_field("address", $settings_page_id);
$abbreviation = get_field("abbreviation", $settings_page_id);
$featured_keynote_title = $attributes['featuredKeynoteTitle'] ?? '';

// Get keynote event details

$keynote_events = get_posts([
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
]);

$keynote_speaker_name = '';
$keynote_speaker_role = '';
$keynote_speaker_company = '';
$keynote_speaker_avatar_url = '';
$keynote_event_title = '';
$keynote_event_url = '';
$keynote_event_details = [];

if ($keynote_events) {
    $keynote_event = $keynote_events[0];
    $keynote_event_title = get_the_title($keynote_event);
    $keynote_event_url = get_permalink($keynote_event);
    $speaker = get_field('related_speaker', $keynote_event->ID);

    $keynote_day = max(1, (int) get_field('day', $keynote_event->ID));
    $conference_start_date = get_post_meta($settings_page_id, 'start_date', true);
    $keynote_time = preg_replace('/\s+/', '', (string) get_field('start_time', $keynote_event->ID));
    $keynote_room = trim((string) get_field('room', $keynote_event->ID));
    $date = DateTimeImmutable::createFromFormat('!Ymd', $conference_start_date);

    if ($date !== false) {
        $date = $date->modify('+' . ($keynote_day - 1) . ' days');
        $keynote_event_details[] = strtoupper($date->format('M d'));
    }

    if ($keynote_time !== '') {
        $time = DateTimeImmutable::createFromFormat('!H:i:s', $keynote_time)
            ?: DateTimeImmutable::createFromFormat('!H:i', $keynote_time);
        $keynote_event_details[] = $time ? $time->format('G:i') : $keynote_time;
    }

    if ($keynote_room !== '') {
        $keynote_event_details[] = 'ROOM ' . strtoupper($keynote_room);
    }

    if (is_array($speaker)) {
        $speaker = reset($speaker);
    }

    if ($speaker instanceof WP_Post || is_numeric($speaker)) {
        $speaker_id = $speaker instanceof WP_Post ? $speaker->ID : (int) $speaker;
        $keynote_speaker_name = get_the_title($speaker_id);
        $keynote_speaker_role = get_field('role', $speaker_id) ?: '';
        $keynote_speaker_company = get_field('company', $speaker_id) ?: '';
        $keynote_speaker_avatar = get_field('avatar', $speaker_id);

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

$button_text = $attributes['buttonText'] ?? 'View talk';

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
                <div class="details"><?php echo implode(' / ', $keynote_event_details); ?></div>
            </div>
            <?php if ($keynote_event_url): ?>
                <?php
                get_template_part('components/button', null, [
                    'text' => $button_text,
                    'url' => $keynote_event_url,
                ]);
                ?>
            <?php endif; ?>
            </div>
            <div class="wrapper-right">
                <?php if ($keynote_speaker_avatar_url !== ''): ?>
                    <img
                        src="<?php echo $keynote_speaker_avatar_url; ?>"
                        alt="<?php echo $keynote_speaker_name; ?>"
                    >
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>
