<?php /* Template Name: History */ ?>
<?php get_header(); ?>
<section class="historyPage">
    <img src="<?php bloginfo('template_directory') ?>/assets/images/gathenhielmska-huset.png" alt="gathenhielmska-huset">

    <p class="historyPage__text">Vid Stigbergstorget ligger det så kallade Gathenhielmska huset, som ofta förknippas med kaparkap-tenen Lars Gathenhielm, som för Karl XII:s räkning uppbringade danska skepp under det stora nor-diska kriget i början av 1700-talet.</p>

    <p class="historyPage__text">Nedan kan ni ta del av husets rafflande historia.</p>
    <img src="<?php bloginfo('template_directory') ?>/assets/images/floral-divider.png" alt="">

    <div class="historyContainer">
        <?php
        $the_query = new WP_Query([
            'post_type' => 'history',
            'posts_per_page' => 30,
            'order' => 'ASC'
        ]);
        ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <div class="historyContainer__item">
                    <img src="<?php the_field('image'); ?>" alt="">
                    <div class="historyContainer__item__yearContainer">
                        <h1><?php the_field('year') ?></h1>
                    </div>
                    <p><?php the_field('text'); ?></p>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php __('No News'); ?></p>
        <?php endif; ?>
    </div>

</section>
<?php get_footer(); ?>
