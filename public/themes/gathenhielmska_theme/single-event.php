<?php get_header();
$categories = get_the_terms($post, 'category');

$categoryIds = "";
$categoryNames = "";
foreach ($categories as $category) {
    $categoryIds .= $category->term_taxonomy_id . ",";
    $categoryNames .= $category->name . ", ";
}
$categoryIds = trim($categoryIds, ',');
$categoryNames = trim($categoryNames, ', ');
?>

<input class="eventId" type="hidden" name="eventId" value="<?php the_ID(); ?>">
<input class="categoryIds" type="hidden" name="categoryIds" value="<?php echo $categoryIds; ?>">
<input class="categoryNames" type="hidden" name="categoryNames" value="<?php echo $categoryNames; ?>">

<div class="singleEvent"></div>
<div class="eventCarousel"></div>


<?php get_footer();
