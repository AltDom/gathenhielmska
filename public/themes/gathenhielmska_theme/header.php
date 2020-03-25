<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#6d9aea">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <img src="/assets/images/logo.svg" alt="gathenhielmska-logo">
        <nav role="navigation">
            <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
        </nav>
    </header>
