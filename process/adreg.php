<?php
	
	
	include_once('../include/settings.php');
	include_once('../'.MYSQLI);
	include_once('../class/class.php');
	

	$cp=new process();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$fm=ucwords(stripslashes(strip_tags($_POST['fullname'])));
		$oc=strip_tags($_POST['occupation']);
		$tel=stripslashes(strip_tags($_POST['tel']));
		$mail=stripslashes(strip_tags($_POST['mail']));
		$sto=$_POST['sto'];
		$lga=$_POST['lga'];
		$sex=$_POST['gender'];
		$role=$_POST['role'];
		$age=strip_tags($_POST['age']);
		$ps=sha1($_POST['ps']);
		$e='';
		
		
		
		if(!empty($fm) && !empty($tel) && !empty($mail) && !empty($age)){ 
		
		
		$sql_tel=mysqli_query($link,"SELECT * FROM users WHERE email='$mail'");
		
		if(mysqli_num_rows($sql_tel)==0){
			
				if(filter_var($mail,FILTER_VALIDATE_EMAIL)==true and is_numeric($tel) and is_string($fm)){
					
					$cp->adreg($fm,$role,$e,$e,$oc,$tel,$mail,$sto,$lga,$sex,$age,$ps);	
				
				}else{
					echo "<b><img src='images/cancel.png' width='auto' height='13px'>&nbsp;Incorrect Field Format</b>";
				}
			}else{
				echo "<b><img src='images/cancel.png' width='auto' height='13px'>&nbsp;Email Already Existing</b>";
				}
		}
	}
	exit();
?>