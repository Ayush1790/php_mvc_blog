<?php
include_once 'header.php';
include_once '../assets/bootstrap.php';
include_once '../db/config.php';

?>
<div class="card-group p-3 Text-wrap">
  <?php
  $i = 1;
  if (isset($_GET['msg']) && $_GET['msg'] == 'myBlog') {
    $result = Blog::find_by_sql("select * from `blogs` where `user_id`='$_COOKIE[isLogin]' ");
  } elseif(isset($_GET['msg']) && $_GET['msg'] == 'trendingBlog') {
    $result = Blog::find_by_sql("select * from `blogs` order by `Likes` desc ");
  }else{
    $result = Blog::find('all');
  }
  echo "<div class='row'>";
  foreach ($result as $key => $value) {
    if ($i % 3 == 0)
      echo "<div class='row'>";
    echo "<div class='card mb-4 p-2 m-2 col-4' >
    <!-- Card image -->
    <div class='view overlay' >
    <img class='card-img-top' src='../assets/img/" . $result[$key]->img . "  '
    alt='Card image cap'>
    <a href='#!'>
    <div class='mask rgba-white-slight'></div>
    </a>
    </div>
    <div class='card-body'>
    <h4 class='card-title'>" . $result[$key]->title . "</h4>
    <p class='card-text'>" . substr(($result[$key]->description), 0, 50) . ".</p>
    <button type='button' class='btn btn-primary btn-md'>Read more</button>";
    if (isset($_GET['msg']) && ($_GET['msg'] == 'myBlog')) {
      echo "<a href='editBlog.php?bid=" . $result[$key]->blog_id . "'><button type='button' class='btn btn-info btn-md ms-2'>Edit</button></a>
      <a href='deleteBlog.php?bid=" . $result[$key]->blog_id . "'><button type='button' class='btn btn-danger btn-md ms-2'>Delete</button></a>";
    }
    echo "<div class='text-end ms-4'><i class='fa-solid fa-heart fa-sm' style='color:red'></i></div></div>   
     </div>
    ";
    $i++;
    if ($i % 3 == 0)
      echo "</div>";
  }
  ?>
</div>
<!-- Card group -->