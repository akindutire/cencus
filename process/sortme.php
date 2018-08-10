<?php
	
	
	include_once('../include/settings.php');
	include_once('../'.MYSQLI);
	include_once('../class/class.php');
	

	$sort=new process();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$oc=strip_tags($_POST['occ']);
		
		$sto=$_POST['sto'];
		$lga=$_POST['lga'];
		$sex=$_POST['gender'];
		
		$aboveage=strip_tags($_POST['age']);
		$belowage=strip_tags($_POST['bage']);
		
	if(empty($sto)){
		$lga='';
		}
			
			$sort->getdata($oc,$sto,$lga,$sex,$aboveage,$belowage);
		
	}
	exit();
?>