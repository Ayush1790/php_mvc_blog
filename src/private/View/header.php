<?php
include_once '../assets/bootstrap.php';
?>
<!-- navber -->

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand ms-4" href="#">Blog's</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
    <ul class="nav ">
      <li class="nav-item">
        <a class="nav-link active" href="./frontPage.php?msg=all">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./myBlog.php?msg=myBlog">My Blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./trendingBlog.php">Trending Blogs</a>
      </li>
      <?php
      if (!isset($_COOKIE['isLogin'])) {
        echo "  <li class='nav-item'></li>
        <a class='nav-link ' href='login.php' >Login</a>
      </li>";
      } else {
        echo "  <li class='nav-item'></li>
      <a class='nav-link ' href='logout.php' >LogOut</a>
    </li>";
      }
      ?>
    </ul>
  </div>
</nav>