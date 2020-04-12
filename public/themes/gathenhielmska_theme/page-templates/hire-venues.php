<?php /* Template Name: Hire Venues */ ?>
<?php get_header(); ?>

<div class="news-container">
    <p>intresserad av att hyra våra lokaler för ett event eller er nästa konferens. Nedan listar vi våra våra olika alternativ. Välkommen att kontakta oss vid intresse</p>

    <div class = "venues-box">
        <?php
        $the_query = new WP_Query([
            'posts_per_page' => 4,
            'post_type' => 'venues'
        ]);
        ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class = "individual-venue-box">
                <img class = "venue-img" src="<?php echo customFieldExcerpt(get_field("photo"), 1, ""); ?>" alt="">
                <h2 class = "venue-name"><?php echo strtoupper(customFieldExcerpt(get_field("venue_name"), 4, "")); ?></h2>
                <p class = "venue-capacity">Kapacitet: <?php echo customFieldExcerpt(get_field("capacity"), 1, ""); ?> personer</p>
                <p class = "venue-availability"><?php echo customFieldExcerpt(get_field("availability_status"), 5, ""); ?></p>
            </div>
            <div class = "book-button"><h2>BOKNINGSFÖRFRÅGAN</h2></div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <!-- dont know what the __() is about -->
            <p><?php __('No Venues'); ?></p>
        <?php endif; ?>
    </div>






</div>

<?php get_footer(); ?>
