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
        <nav role="navigation">
            <div class="logo">
                <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.9286 0H1.07143C0.478795 0 0 0.4875 0 1.09091V22.9091C0 23.5125 0.478795 24 1.07143 24H28.9286C29.5212 24 30 23.5125 30 22.9091V1.09091C30 0.4875 29.5212 0 28.9286 0ZM27.5893 3.77727V21.5455H2.41071V3.77727L1.48661 3.04432L2.80246 1.32273L4.23549 2.45795H25.7679L27.2009 1.32273L28.5167 3.04432L27.5893 3.77727ZM25.7679 2.45455L15 10.9773L4.23214 2.45455L2.79911 1.31932L1.48326 3.04091L2.40737 3.77386L13.8449 12.8284C14.1738 13.0886 14.5785 13.2298 14.995 13.2298C15.4115 13.2298 15.8162 13.0886 16.1451 12.8284L27.5893 3.77727L28.5134 3.04432L27.1975 1.32273L25.7679 2.45455Z" fill="white" /></svg></div>
            <?php the_title(); ?>
            <div class="languages">
                <h4 class="swedish active">SV</h4>
                <h4>/</h4>
                <h4 class="english">ENG</h4>
            </div>
            <?php wp_nav_menu(['theme_location' => 'navigation']); ?>
            <div class="close"><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L32.5 32.5" stroke="white" stroke-width="2" stroke-linecap="round" />
                    <path d="M32.5 1L0.999999 32.5" stroke="white" stroke-width="2" stroke-linecap="round" /></svg></div>
            <div class="hamburger">
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="6" y1="11.5" x2="38" y2="11.5" stroke="black" />
                    <line x1="6" y1="21.5" x2="38" y2="21.5" stroke="black" />
                    <line x1="6" y1="31.5" x2="38" y2="31.5" stroke="black" /></svg></div>

        </nav>
    </header>
