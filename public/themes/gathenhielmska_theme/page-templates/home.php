<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<!-- Hero -->
<?php while (have_posts()) : the_post(); ?>

    <!-- temporary hero-image classname -->
    <img class="hero-image" src="<?php the_field('hero_image'); ?>" />
    <h1><?php the_field('hero_text'); ?></h1>

<?php endwhile; ?>

<!-- Nyheter -->
<h2>Nyheter</h2>

<?php
$the_query = new WP_Query([
    'posts_per_page' => 1,
]);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

        <?php the_title(); ?>
        <?php the_excerpt(); ?>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <!-- dont know what the __() is about -->
    <p><?php __('No News'); ?></p>
<?php endif; ?>




<?php get_footer(); ?>
