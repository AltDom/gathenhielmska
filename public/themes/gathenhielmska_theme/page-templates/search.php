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
