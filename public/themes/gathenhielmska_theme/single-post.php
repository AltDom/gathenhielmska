<?php get_header();
$categories = get_the_terms($post, 'category'); ?>

<main role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <img class="single-news-img" src="<?php echo customFieldExcerpt(get_field("image"), 1, ""); ?>" alt="">
    <!-- <article> -->
        <div class="news-container">
            <div class="news-post-box">
                <div class="news-category-date-box">
                    <p class="news-category">
                        <?php foreach ($categories as $category) : ?>
                            <?php echo strtoupper($category->name); ?>
                        <?php endforeach; ?>
                    </p>
                    <p class="news-date"><?php echo get_the_date('d/m-y'); ?></p>
                </div>
                <h1 class="single-news-title"><?php the_title(); ?></h1>
                <p class="single-news-tagline"><?php echo customFieldExcerpt(get_field("tagline"), 20, ""); ?></p>
                <p class="single-news-text"><?php echo customFieldExcerpt(get_field("description"), 1000, ""); ?></p>
            </div>
        </div>
    <!-- </article> -->
        <?php endwhile;
    else : ?>
        <article>
            <p>Nothing to see.</p>
        </article>
    <?php endif; ?>
</main>

<?php get_footer();
