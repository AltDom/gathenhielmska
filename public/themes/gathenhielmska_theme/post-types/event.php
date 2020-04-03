<?php

declare(strict_types=1);


add_action('init', function () {
    register_post_type('event', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add New Event'),
            'edit_item' => __('Edit Events'),
            'name' => __('Events'),
            'search_items' => __('Search Events'),
            'singular_name' => __('Event'),
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-tickets',
        'menu_position' => 19,
        'public' => true,
        'show_in_rest' => true
    ]);
});
