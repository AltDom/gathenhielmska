<?php /* Template Name: Search */ ?>

<?php
session_start();

if (!isset($_POST['categories'])) {
    if (isset($_POST['path'])) {
        redirect($_POST['path']);
    }
    redirect('/');
}

$categories = [];
foreach ($_POST['categories'] as $category) {
    $categories[] = $category;
}

$_SESSION['categories'] = $categories;

if ($_POST['path'] === '/events') {
}


redirect($_POST['path']);


?>
