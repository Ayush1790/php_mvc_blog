<?php
// login checker
include_once '../directory.php';
include_once APP_PATH . '/db/config.php';
if (isset($_GET)) {
    $result = User::find_by_email_and_pswd($_GET['email'], $_GET['pswd']);
    if ($result->email && $result->pswd) {
        setcookie("isLogin", $result->id, time() + 86400, "/");
        header('location:../View/frontPage.php?msg=all');
    } else {
        header('location:../View/login.php?msg=error,Try Again');
    }
}
