<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');

//only allow access to logout page if someone is logged in
if(!is_user_logged_in()){
    redirect_to('/Learn-PHP-SQL/index.php');
};

logout();
?>