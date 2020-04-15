<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<section class="homePage">


    <!-- Hero -->
    <?php while (have_posts()) : the_post(); ?>
        <div class="homePage__heroContainer">
            <img src="<?php the_field('hero_image') ?>" alt="hero image" class="homePage__heroContainer__heroImage">
            <div class="homePage__heroContainer__textContainer">
                <h1><?php the_field('hero_headline'); ?></h1>
            </div>
        </div>
    <?php endwhile; ?>

    <!-- Links -->
    <div class="homePage__linksContainer">

        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink1.png" alt="">
            <a href="#">
                <h2>historia</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink2.png" alt="">
            <a href="/events">
                <h2>evenemang</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink3.png" alt="">
            <a href="#">
                <h2>arkiv</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink4.png" alt="">
            <a href="#">
                <h2>hyr lokal</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink5.png" alt="">
            <a href="/news">
                <h2>artiklar</h2>
            </a>
        </div>
        <div>
            <img src="<?php bloginfo('template_directory') ?>/assets/images/homePageLink6.png" alt="">
            <a href="#">
                <h2>guidad tur</h2>
            </a>
        </div>

    </div>


    <!-- Events -->
    <h1 class="homePage__h1">PÅ GÅNG</h1>

    <div class="eventCarousel"></div>


    <a href="/events">
        <p class="homePage__eventsLink"><u>se alla event</u></p>
    </a>

    <!-- Nyheter -->

    <?php
    $the_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 3
    ]);
    $isFirstItem = true;
    ?>

    <?php if ($the_query->have_posts()) : ?>
        <div class="homePage__newsContainer">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <?php if ($isFirstItem) : ?>

                    <div>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_field("image"); ?>" alt="">
                            <div class="homePage__newsContainer__textContainer">
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_field('tagline') ?></p>
                            </div>
                        </a>
                    </div>

                <?php else : ?>

                    <div class="homePage__newsContainer__lastTwoItems">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_field("image"); ?>" alt="">
                            <div class="homePage__newsContainer__textContainer">
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>

                <?php endif; ?>

                <?php $isFirstItem = false; ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php __('No News'); ?></p>
    <?php endif; ?>



</section>





<?php get_footer(); ?>
