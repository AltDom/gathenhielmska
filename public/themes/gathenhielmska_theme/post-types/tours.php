<?php

declare(strict_types=1);

add_action('init', function () {
    register_post_type('tours', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add New Tour'),
            'edit_item' => __('Edit Tour'),
            'name' => __('Tours'),
            'search_items' => __('Search Tours'),
            'singular_name' => __('Tour'),
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-controls-volumeon',
        'menu_position' => 23,
        'public' => true,
        'show_in_rest' => true
    ]);
});
