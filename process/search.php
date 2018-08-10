<?php
	
	
	include_once('../include/settings.php');
	include_once('../'.MYSQLI);
	include_once('../class/class.php');
	

	$sort=new process();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$name=$_POST['sname'];
		
			$sort->getsearchdata($name);
		
	}
	exit();
?>