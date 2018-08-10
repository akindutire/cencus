<?php
//include_once('include/settings.php');
session_name('cencus345');
session_save_path($_SERVER['DOCUMENT_ROOT'].'/cphp/cencus/include/sessions/data');
session_start();


$_SESSION[]=array();
session_unset();
//session_destroy();
header('location:index.php')
?>