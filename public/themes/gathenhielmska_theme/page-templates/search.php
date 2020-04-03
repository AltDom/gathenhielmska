<?php /* Template Name: Search */ ?>

<?php
session_start();

if (!isset($_POST['categories'])) {
    redirect("/");
}

$categories = [];
foreach ($_POST['categories'] as $category) {
    $categories[] = $category;
}

$_SESSION['categories'] = $categories;



redirect($_POST['path']);


?>
