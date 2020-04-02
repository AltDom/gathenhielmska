<?php /* Template Name: Search */ ?>

<?php
session_start();

if (!isset($_POST['categories'])) {
    redirect("/");
}

$taxonomies = [];
foreach ($_POST['categories'] as $taxonomy) {
    $taxonomies[] = $taxonomy;
}

$_SESSION['categories'] = $taxonomies;



redirect($_POST['path']);


?>
