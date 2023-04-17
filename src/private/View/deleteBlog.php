<?php
include_once '../db/config.php';
print_r($_GET);
if(isset($_GET['bid'])){
 $result=Blog::find_by_blog_id($_GET['bid']);
 $result->Delete();
 if($result){
    header('location:myBlog.php>msg=myBlog');
 }

}