<?php
include_once '../directory.php';
require_once APP_PATH.'/library/php-activerecord/ActiveRecord.php';
ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory(APP_PATH.'/Models');
    $cfg->set_connections(array(
        'development' => 'mysql://root:secret@mysql-server/myBlog'
    ));
});