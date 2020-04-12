<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('venues', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add New Venue'),
            'edit_item' => __('Edit Venue'),
            'name' => __('Venues'),
            'search_items' => __('Search Venues'),
            'singular_name' => __('Venue'),
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-admin-multisite',
        'menu_position' => 22,
        'public' => true,
        'show_in_rest' => true
    ]);
});
