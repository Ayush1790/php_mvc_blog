<?php
include_once '../assets/bootstrap.php';
?>
<form action="../../private/Controllers/addBlogController.php" method="post" enctype="multipart/form-data">
    <div class="row mt-5">
        <div class="col-2 text-end">Enter Title</div>
        <div class="col-3"><input type="text" name="title" id="" class="form-control" required ></div>
        <div class="col-1 text-end" class="form-control">Image</div>
        <div class="col-3" class="form-control"><input type="file" name="img" id="img" required></div>
    </div>
    <div class="row mt-3">
        <div class="col-1 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="col-7 text-center"><textarea class="form-control" name="desc" id="desc" cols="60" rows="8" required placeholder="Write Your Blog here"></textarea></div>
    </div>
    <div class="row">
        <div class="col-3 btn text-center"><input type="submit" value="Submit" class="btn btn-primary"></div>
    </div>

</form>