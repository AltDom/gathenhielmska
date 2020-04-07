<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<!-- Hero -->
<?php while (have_posts()) : the_post(); ?>

    <!-- temporary hero-image classname -->
    <h2><?php the_field('hero_text'); ?></h2>
    <img class="hero-image" src="<?php the_field('hero_image'); ?>" />

<?php endwhile; ?>

<!-- Events -->
<h2>kommande evenemang</h2>

<div class="eventCarousel"></div>

<!-- Nyheter -->
<h2>På gång i huset</h2>

<?php
$the_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3
]);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <img class="single-news-img" src="<?php echo customFieldExcerpt(get_field("image"), 1, ""); ?>" alt="">
        <h3><?php the_title(); ?></h3>
        <p><?php echo get_field("tagline"); ?></p>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <!-- dont know what the __() is about -->
    <p><?php __('No News'); ?></p>
<?php endif; ?>






<?php get_footer(); ?>
