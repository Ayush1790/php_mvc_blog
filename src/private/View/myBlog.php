<?php
include_once '../db/config.php';
if(!isset($_COOKIE['isLogin'])){
    header('location:./login.php');
  }else{
    header('location:./frontPage.php?msg=myBlog');
  }

