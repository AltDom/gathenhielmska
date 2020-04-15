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
                'name' => $term_single->name,
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
            <div class="searchForm__options__orderBtn">Sortera efter</div>
            <div class="searchForm__options__categoryBtn">Visa filter</div>
        </div>
        <div class="searchForm__listWrapper">
            <div class="searchForm__categoryList hidden">
                <?php foreach ($categories as $category) : ?>

                    <div class="searchForm__categoryList__item">
                        <div>
                            <label for="<?php echo $category['slug'] ?>">
                                <p><?php echo $category['name'] ?></p>
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" id="<?php echo $category['slug'] ?>" name="category" value="<?php echo $category['id'] ?>">
                        </div>
                    </div>

                <?php endforeach; ?>
                <div class="searchForm__categoryList__item searchForm__categoryList__okBtn">
                    <p>OK</p>
                </div>
            </div>

            <div class="searchForm__orderList hidden">
                <div class="searchForm__orderList__item">
                    <div>
                        <label for="new">
                            <p>Pågående</p>
                        </label>
                    </div>
                    <div>
                        <input type="radio" name="order" value="new" checked>
                    </div>
                </div>
                <div class="searchForm__orderList__item">
                    <div>
                        <label for="old">
                            <p>Avslutade</p>
                        </label>
                    </div>
                    <div>
                        <input type="radio" name="order" value="old">
                    </div>
                </div>
                <div class="searchForm__orderList__item searchForm__orderList__okBtn">
                    <p>OK</p>
                </div>
            </div>
        </div>
        <input type="hidden" name="type" value="event">
        <button class="submitBtn" type="submit"><svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.9098 22.5308L18.0262 15.6832C19.0944 14.3095 19.6722 12.6299 19.6722 10.8633C19.6722 8.74863 18.8426 6.76582 17.3424 5.2708C15.8421 3.77578 13.8436 2.95312 11.7205 2.95312C9.59733 2.95312 7.59877 3.77842 6.09854 5.2708C4.59565 6.76318 3.76866 8.74863 3.76866 10.8633C3.76866 12.9753 4.5983 14.9634 6.09854 16.4558C7.59877 17.9508 9.59468 18.7734 11.7205 18.7734C13.4964 18.7734 15.1821 18.1986 16.5631 17.1387L23.4467 23.9836C23.4669 24.0037 23.4908 24.0196 23.5172 24.0305C23.5436 24.0414 23.5719 24.047 23.6004 24.047C23.629 24.047 23.6573 24.0414 23.6836 24.0305C23.71 24.0196 23.734 24.0037 23.7542 23.9836L24.9098 22.8366C24.93 22.8165 24.946 22.7927 24.957 22.7665C24.9679 22.7402 24.9735 22.7121 24.9735 22.6837C24.9735 22.6553 24.9679 22.6272 24.957 22.6009C24.946 22.5747 24.93 22.5508 24.9098 22.5308V22.5308ZM15.919 15.0398C14.7951 16.1552 13.3055 16.7695 11.7205 16.7695C10.1354 16.7695 8.64576 16.1552 7.52191 15.0398C6.40071 13.9219 5.78312 12.44 5.78312 10.8633C5.78312 9.28652 6.40071 7.80205 7.52191 6.68672C8.64576 5.57139 10.1354 4.95703 11.7205 4.95703C13.3055 4.95703 14.7978 5.56875 15.919 6.68672C17.0402 7.80469 17.6578 9.28652 17.6578 10.8633C17.6578 12.44 17.0402 13.9245 15.919 15.0398Z" fill="#1F3634" />
            </svg>
        </button>
    </form>

    <div class="eventContainer"></div>

    <p class="noMoreMessage hidden">No more events</p>
    <button class="loadMoreBtn hidden">
        <h2>SE FLER</h2><svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L11 11L21 1" stroke="black" />
        </svg>
    </button>

</section>


<?php get_footer(); ?>
