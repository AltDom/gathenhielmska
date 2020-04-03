<?php /* Template Name: Events */ ?>
<?php get_header();
session_start();

//get all available categories
$categories = [];
global $post;
$loop = new WP_Query(array('post_type' => 'event', 'posts_per_page' => -1));
while ($loop->have_posts()) : $loop->the_post();
    $terms = wp_get_post_terms($post->ID, 'category');
    foreach ($terms as $term_single) {
        $duplicate = false;
        foreach ($categories as $category) {
            if ($category === $term_single->slug) {
                $duplicate = true;
            }
        }
        if (!$duplicate) {
            $categories[] = $term_single->slug;
        }
    }
endwhile;
?>

<section class="event-page">


    <form class="searchForm" action="/search" method="post">
        <input class="searchForm__searchBar" type="text" name="title">
        <div class="searchForm__options">
            <div class="searchForm__options__orderBtn">Sortera Efter</div>
            <div class="searchForm__options__categoryBtn">Kategori</div>
        </div>
        <div class="searchForm__categoryList hidden">
            <?php foreach ($categories as $category) : ?>

                <?php $checked = false; ?>
                <?php if (isset($_SESSION['categories'])) {
                    foreach ($_SESSION['categories'] as $checkedCategory) {
                        if ($category === $checkedCategory) {
                            $checked = true;
                        }
                    }
                }
                ?>

                <div class="searchForm__categoryList__item">
                    <div>
                        <label for="<?php echo $category ?>"><?php echo $category ?></label>
                    </div>
                    <div>
                        <input type="checkbox" id="<?php echo $category ?>" name="categories[]" value="<?php echo $category ?>" <?php echo $checked ? "checked" : "" ?>>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

        <div class="searchForm_optionsList">
            <div class="searchForm_optionsList_item">
                <div>
                    <label for="new">Pågående</label>
                </div>
                <div>
                    <input type="radio" name="order" value="new">
                </div>
            </div>
            <div class="searchForm_optionsList_item">
                <div>
                    <label for="old">Avslutade</label>
                </div>
                <div>
                    <input type="radio" name="order" value="old">
                </div>
            </div>
        </div>
        <input type="hidden" name="path" value="/events">
        <button type="submit">Submit</button>
    </form>

    <?php
    $the_query = new WP_Query([
        'posts_per_page' => 8,
        'post_type' => 'event',
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => isset($_SESSION['categories']) ? $_SESSION['categories'] : $categories
            ]
        ],
        'meta_query' => [
            [
                'key' => 'date',
                'value' => date('Y-m-d'),
                'compare' => isset($_POST['compare']) ? $_POST['compare'] : '>',
                'type' => 'DATE'
            ]
        ],
        'meta_key' => 'date',
        'orderby' => 'meta_value',
        'order' => isset($_POST['order']) ? $_POST['order'] : 'ASC'
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





</section>

<?php session_destroy(); ?>

<?php get_footer(); ?>
