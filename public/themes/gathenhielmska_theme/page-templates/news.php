<?php /* Template Name: News */ ?>

<!-- This is for posts/nyheter/articles -->

<?php get_header(); ?>

<div class="news-container">
    <?php
    $the_query = new WP_Query([
        'posts_per_page' => 8,
        'post_type' => 'post'
    ]);
    ?>

    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="news-post-box">
                <img class="news-img" src="<?php echo customFieldExcerpt(get_field("image"), 1, ""); ?>" alt="">
                <div class="news-title-date">
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="news-title"><?php the_title(); ?></h2>
                    </a>
                    <p class="news-date"><?php echo get_the_date('d/m-y'); ?></p>
                </div>
                <p class="news-tagline"><?php echo customFieldExcerpt(get_field("tagline"), 20, ""); ?></p>
                <p class="news-text"><?php echo customFieldExcerpt(get_field("description"), 100); ?></p>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <!-- dont know what the __() is about -->
        <p><?php __('No News'); ?></p>
    <?php endif; ?>
</div>




<?php get_footer(); ?>
