<?php
print_r($_POST);
print_r($_FILES);
include_once '../directory.php';
include_once APP_PATH . '/db/config.php';
if (isset($_POST)) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $img = $_FILES['img'];
    if ($title == "" || $desc == "" || $img == "") {
        header('location:../View/addBlog.php');
    } else {
        $attributes = array("user_id" => $_COOKIE['isLogin'], "title" => $title, "description" => $desc, "date" => date('y-m-d'), "img" => $img['name']);
        $result = Blog::create($attributes);
        if ($img['size'] > 0) {
            $target_dir = APP_PATH . "/assets/img/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            print_r($target_file);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file); //moving temp location to a specified folder
            header('location:../View/myBlog.php');
        }
    }
}
