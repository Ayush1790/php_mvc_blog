<!-- code for like event -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .fa {
        font-size: 50px;
        cursor: pointer;
        user-select: none;
    }

    .fa:hover {
        color: darkblue;
    }
</style>

<?php
include_once '../directory.php';
include_once APP_PATH . '/db/config.php';
if (isset($_POST['tagid'])) {
    if ($_POST['tagid'] == "like") {
        $attributes = array('user_id' => $_COOKIE['isLogin'], 'blog_id' => $_SESSION['blog_id']);
        $result = Like::create($attributes);
        $stmt = Blog::find_by_blog_id($_SESSION['blog_id']);
        $like = (int)$stmt->likes;
        $like++;
        $stmt->likes = $like;
        $stmt->save();
    } else {
        $res = Like::find_by_user_id_and_blog_id($_COOKIE['isLogin'], $_SESSION['blog_id']);
        $res->Delete();
        $stmt = Blog::find_by_blog_id($_SESSION['blog_id']);
        $like = (int)$stmt->likes;
        $like--;
        $stmt->likes = $like;
        $stmt->save();
    }
    unset($_POST);
}

if (isset($_SESSION['blog_id']) && isset($_COOKIE['isLogin'])) {
    $res = Like::find_by_user_id_and_blog_id($_COOKIE['isLogin'], $_SESSION['blog_id']);
    if (isset($res) && $res->user_id == $_COOKIE['isLogin']) {
        echo '  <i onclick="myFunction(this)" class="fa fa-thumbs-down" id="dislike"></i>';
    } else {
        echo '  <i onclick="myFunction(this)" class="fa fa-thumbs-up" id="like"></i>';
    }
} else {
}
?>
<script>
    function myFunction(x) {
        console.log(x.id);
        $.ajax({
            url: 'like.php',
            type: 'post',
            data: {
                'tagid': x.id
            },
            dataType: 'text'
        }).done(function() {
            if (x.id == 'like') {
                x.classList.toggle("fa-thumbs-down");
                document.getElementById("like").id = "dislike";

            } else {
                x.classList.toggle("fa-thumbs-up");
                document.getElementById("dislike").id = "like";

            }
            location.reload();
        })
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>