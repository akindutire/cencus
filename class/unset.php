<?php
	include '../include/settings.php';
	include MYSQLI;
	include 'class.php';
	$err_code=$_GET['err'];
	if($err_code='403i'){
		$_SESSION['trial']=0;
		header('location:../admin.php');
	}
?>