<?php
// logout
setcookie("isLogin",1,time()-86400,"/");
header('location:frontPage.php');