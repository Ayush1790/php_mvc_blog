<?php
// adding or updating the blog in database
error_reporting(0);
include_once '../directory.php';
include_once APP_PATH . '/db/config.php';
if (isset($_POST)) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $img = $_FILES['img'];
    if ($title == "" || $desc == "" || $img == "") {
        header('location:../View/addBlog.php');
    } else {
        if ($_POST['submit'] == 'Submit') {
            $attributes = array("user_id" => $_COOKIE['isLogin'], "title" => $title, "description" => $desc, "date" => date('y-m-d'), "img" => $img['name']);
            $result = Blog::create($attributes);
        } else {
            $result = Blog::find_by_blog_id($_SESSION['bid']);
            $result->title = $title;
            $result->description = $desc;
            $result->img = $img['name'];
            $result->save();
        }
        if ($img['size'] > 0) {
            $target_dir = APP_PATH . "/assets/img/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            print_r($target_file);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file); //moving temp location to a specified folder
            header('location:../View/myBlog.php');
        }
    }
}
