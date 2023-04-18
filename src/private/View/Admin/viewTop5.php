<?php
// displaying top 5 or all user
error_reporting(0);
include_once '../../directory.php';
include_once APP_PATH . '/db/config.php';
include_once '../../assets/bootstrap.php';
?>
<?php
if (!isset($_GET['msg']))
    echo "<h1>Top 5 User's</h1> ";
else
    echo "<h1>All User's</h1> ";
?>
<table class="table table-bordered table-stripped">
    <thead>
        <tr class='text-center'>
            <th>User Id</th>
            <th>Blog id</th>
            <th>Title</th>
            <th>Likes</th>
            <th>Action</th>
            <?php
            if (!isset($_GET['msg']))
                echo " <th class='text-end'><a href='viewTop5.php?msg=all'><button class='btn btn-info'>Show All</button></a></th> ";
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['msg'])) {
            $result = Blog::find_by_sql("select * from `blogs` order by `Likes` ");
        } else
            $result = Blog::find_by_sql("select * from `blogs` order by `Likes` desc limit 5");
        foreach ($result as $key => $value) {
            echo "<tr class='text-center'><td>" . $result[$key]->user_id . "</td><td>" . $result[$key]->blog_id . "</td><td>" . $result[$key]->title . "</td><td>" . $result[$key]->likes . "</td><td colspan=2><a href='../deleteBlog.php?bid=" . $result[$key]->blog_id . ",type=admin'><button type='button' class='btn btn-danger btn-md ms-2'>Delete</button></a></td></tr>";
        }
        ?>
    </tbody>
</table>