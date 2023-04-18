<?php
// dispalying blog in single page
include_once '../assets/bootstrap.php';
include_once '../db/config.php';
include_once './header.php';
if(isset($_GET['id'])){
    $result=Blog::find_by_blog_id($_GET['id']);
    $author=User::find_by_id($result->user_id);
}else{
    header('location:./frontPage.php');
}
?>
<div class="container">
<div class="row">
    <div class="col-6 mt-4"><img src='../assets/img/<?php echo $result->img ?>' alt="img not found" height="400" width="500"></div>
    <div class="col-6 mt-4">
        <div class="row">
            <div class="col text-center"><h1><?php echo $result->title ?></h1></div>
        </div>
        <p class="overflow-auto" style="height:320px"><?php echo $result->description ?></p>
        <div class="row">
            <div class="col-3 text-start"><?php $_SESSION['blog_id']=$result->blog_id; include 'like.php';?></div>
            <div class="col-9 text-end text-primary mt-3">Author:<?php echo $author->name ?></div>
        </div>
    </div>
</div>
</div>
