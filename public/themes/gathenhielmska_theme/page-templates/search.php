<?php /* Template Name: Search */ ?>

<?php
session_start();

if (!isset($_POST['categories']) && !isset($_POST['order'])) {
    if (isset($_POST['path'])) {
        redirect($_POST['path']);
    }
    redirect('/');
}

$categories = [];
if (isset($_POST['categories'])) {
    foreach ($_POST['categories'] as $category) {
        $categories[] = $category;
    }
}
if (count($categories) > 0) {
    $_SESSION['categories'] = $categories;
}

if ($_POST['path'] === '/events') {
    if (isset($_POST['order'])) {
        if ($_POST['order'] === "new") {
            $_SESSION['compare'] = ">";
            $_SESSION['order'] = "ASC";
        } else {
            $_SESSION['compare'] = "<";
            $_SESSION['order'] = "DESC";
        }
    }
}


redirect($_POST['path']);


?>


<?php
//temporary here to remember the code
$the_query = new WP_Query([
    'posts_per_page' => 8,
    'post_type' => 'event',
    'meta_query' => [
        [
            'key' => 'date',
            'value' => date('Y-m-d'),
            'compare' => '>',
            'type' => 'DATE'
        ]
    ],
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC'
]);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <?php $categories = get_the_terms($post, 'category');  ?>

        <div class="event-card">
            <?php if ($categories) : ?>
                <?php foreach ($categories as $category) : ?>
                    <p><?php echo $category->name ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>

            <p><?php echo customFieldExcerpt(get_field("description")); ?></p>

            <p><?php the_field("date"); ?></p>
            <p><?php the_field("start_time"); ?></p>

        </div>


    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <!-- dont know what the __() is about -->
    <p><?php __('No News'); ?></p>
<?php endif; ?>
