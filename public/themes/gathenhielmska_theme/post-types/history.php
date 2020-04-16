<?php

declare(strict_types=1);


add_action('init', function () {
    register_post_type('history', [
        'has_archive' => true,
        'labels' => [
            'add_new_item' => __('Add New History'),
            'edit_item' => __('Edit Histories'),
            'name' => __('History'),
            'search_items' => __('Search Histories'),
            'singular_name' => __('History'),
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
        'menu_icon' => 'dashicons-backup',
        'menu_position' => 19,
        'public' => true,
        'show_in_rest' => true
    ]);
});
