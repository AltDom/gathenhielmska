<?php

declare(strict_types=1);

add_action('init', function () {
    register_extended_taxonomy('category', 'event', [
        'show_in_rest' => true,
        'show_admin_column' => true,
    ]);
});
