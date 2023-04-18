<?php
// adding blog
include_once '../assets/bootstrap.php';
include_once '../directory.php';
include_once APP_PATH . '/db/config.php';
$title = "";
$desc = "";
if (isset($_GET['id'])) {
    $result = Blog::find_by_blog_id($_GET['id']);
    $GLOBALS['title'] = $result->title;
    $GLOBALS['desc'] = $result->description;
    $_SESSION['bid'] = isset($_GET['id']);
}
?>
<form action="../../private/Controllers/addBlogController.php" method="post" enctype="multipart/form-data">
    <div class="row mt-5">
        <div class="col-2 text-end">Enter Title</div>
        <div class="col-3"><input type="text" name="title" id="" class="form-control" required value=<?php echo $GLOBALS['title']; ?>></div>
        <div class="col-1 text-end" class="form-control">Image</div>
        <div class="col-3" required class="form-control"><input type="file" name="img" id="img"></div>
    </div>
    <div class="row mt-3">
        <div class="col-1 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="col-7 text-center"><textarea class="form-control" name="desc" id="desc" cols="60" rows="8" required placeholder="Write Your Blog here"><?php echo $GLOBALS['desc']; ?></textarea></div>
    </div>
    <div class="row">
        <?php
        if (!isset($_GET['id']))
            echo "<div class='col-3 btn text-center'><input type='submit' value='Submit' id='submit' name='submit' class='btn btn-primary'></div>";
        else
            echo "<div class='col-3 btn text-center'><input type='submit' value='Update' id='update' name='update' class='btn btn-primary'></div>";
        ?>
    </div>
</form>