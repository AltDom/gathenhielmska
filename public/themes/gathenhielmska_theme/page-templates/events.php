<?php /* Template Name: Events */ ?>
<?php get_header();

//get all available categories
$categories = [];
global $post;
$loop = new WP_Query(array('post_type' => 'event', 'posts_per_page' => -1));
while ($loop->have_posts()) : $loop->the_post();
    $terms = wp_get_post_terms($post->ID, 'category');
    foreach ($terms as $term_single) {
        $duplicate = false;
        foreach ($categories as $category) {
            if ($category['slug'] === $term_single->slug) {
                $duplicate = true;
            }
        }
        if (!$duplicate) {
            $categories[] = [
                'slug' => $term_single->slug,
                'id' => $term_single->term_id
            ];
        }
    }
endwhile;
?>

<section class="eventPage">

    <form class="searchForm" action="/search" method="post">
        <input class="searchForm__searchBar" type="text" name="search">
        <div class="searchForm__options">
            <div class="searchForm__options__orderBtn">Sortera Efter</div>
            <div class="searchForm__options__categoryBtn">Kategori</div>
        </div>
        <div class="searchForm__categoryList hidden">
            <?php foreach ($categories as $category) : ?>

                <div class="searchForm__categoryList__item">
                    <div>
                        <label for="<?php echo $category['slug'] ?>"><?php echo $category['slug'] ?></label>
                    </div>
                    <div>
                        <input type="checkbox" id="<?php echo $category['slug'] ?>" name="category" value="<?php echo $category['id'] ?>">
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

        <div class="searchForm__orderList hidden">
            <div class="searchForm__orderList__item">
                <div>
                    <label for="new">Pågående</label>
                </div>
                <div>
                    <input type="radio" name="order" value="new" checked>
                </div>
            </div>
            <div class="searchForm__orderList__item">
                <div>
                    <label for="old">Avslutade</label>
                </div>
                <div>
                    <input type="radio" name="order" value="old">
                </div>
            </div>
        </div>
        <input type="hidden" name="type" value="event">
        <button type="submit">Submit</button>
    </form>


    <div class="eventContainer"></div>

    <div class="eventCarousel"></div>

    <p class="noMoreMessage hidden">No more events</p>
    <button class="loadMoreBtn hidden">Load More</button>





</section>


<?php get_footer(); ?>
