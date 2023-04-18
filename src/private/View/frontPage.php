<?php
// including required files
include_once 'header.php';
include_once '../assets/bootstrap.php';
include_once '../db/config.php';
?>
<!-- displaying the blog's according to condition -->
<div class="container">
  <img src="../assets/img/headerimg.jpg.jpg" alt="" srcset="" width=100% height=400>
</div>
<h1 class="text-center m-5 text-primary">Latests Blog's</h1>
<div class="card-group p-3 Text-wrap container ">
  <?php
  $i = 1;
  if (isset($_GET['msg']) && $_GET['msg'] == 'myBlog') {
    $result = Blog::find_by_sql("select * from `blogs` where `user_id`='$_COOKIE[isLogin]' ");
  } elseif (isset($_GET['msg']) && $_GET['msg'] == 'trendingBlog') {
    $result = Blog::find_by_sql("select * from `blogs` order by `Likes` desc limit 10");
  } else {
    $result = Blog::find('all');
  }
  echo "<div class='row'>";
  foreach ($result as $key => $value) {
    if ($i % 4 == 0)
      echo "<div class='row'>";
    echo "<div class='card mb-4 p-2 col'>
    <!-- Card image -->
    <div class='view overlay' >
    <img class='card-img-top' src='../assets/img/" . $result[$key]->img . "  '
    alt='Card image cap' height=300>
    <a href='#!'>
    <div class='mask rgba-white-slight'></div>
    </a>
    </div>
    <div class='card-body'>
    <h4 class='card-title'>" . $result[$key]->title . "</h4>
    <p class='card-text'>" . substr(($result[$key]->description), 0, 50) . ".</p>
    <a href='fullBlog.php?id=" . $result[$key]->blog_id . "'<button type='button' class='btn btn-primary btn-md'>Read more</button></a>";
    if (isset($_GET['msg']) && ($_GET['msg'] == 'myBlog')) {
      echo "<a href='addBlog.php?id=" . $result[$key]->blog_id . "'><button type='button' class='btn btn-info btn-md ms-2'>Edit</button></a>
      <a href='deleteBlog.php?id=" . $result[$key]->blog_id . ",type=user'><button type='button' class='btn btn-danger btn-md ms-2'>Delete</button></a>";
    }
    echo "</div>   
     </div>
    ";
    $i++;
    if ($i % 4 == 0)
      echo "</div>";
  }
  ?>
</div>
<!-- Card group end-->