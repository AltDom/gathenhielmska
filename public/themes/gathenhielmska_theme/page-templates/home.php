<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<!-- Nyheter -->

<?php
$the_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3
]);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <!-- dont know what the __() is about -->
    <p><?php __('No News'); ?></p>
<?php endif; ?>

<!-- Hero -->
<?php while (have_posts()) : the_post(); ?>

    <!-- temporary hero-image classname -->


<?php endwhile; ?>

<!-- Events -->
<h2>kommande evenemang</h2>

<div class="eventCarousel"></div>








<?php get_footer(); ?>
