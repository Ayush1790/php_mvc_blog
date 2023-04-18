<?php
// code for delete blog by admin as well as user
include_once '../db/config.php';
if (isset($_GET['id'])) {
  $data = explode(",", $_GET['id']);
  $result = Blog::find_by_blog_id($data[0]);
  $result->Delete();
  if ($data[1] == 'type=user') {
    header('location:myBlog.php?msg=myBlog');
  } else {
    header('location:./Admin/viewTop5.php');
  }
}
