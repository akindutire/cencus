<?php
	
	
	include_once('../include/settings.php');
	include_once('../'.MYSQLI);
	include_once('../class/class.php');
	

	$cp=new process();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$fm=ucwords(stripslashes(strip_tags($_POST['fullname'])));
		$father=ucwords(stripslashes(strip_tags($_POST['father'])));
		$mother=ucwords(stripslashes(strip_tags($_POST['mother'])));
		$nextofkin=ucwords(stripslashes(strip_tags($_POST['nextofkin'])));
		$oc=strip_tags($_POST['occupation']);
		$tel=stripslashes(strip_tags($_POST['tel']));
		$mail=stripslashes(strip_tags($_POST['mail']));
		$sto=$_POST['sto'];
		$lga=$_POST['lga'];
		$sex=$_POST['gender'];
		
		$age=strip_tags($_POST['age']);
		
		
		
		if(!empty($fm) && !empty($father) && !empty($mother) && !empty($nextofkin) && !empty($tel)){ 
		
		
				
			$sql_tel=mysqli_query($link,"SELECT * FROM users WHERE email='$tel'");
				
			if(mysqli_num_rows($sql_tel)==0){
				
				if(is_numeric($tel) and is_string($fm)){
				
					$cp->reg($fm,$father,$mother,$nextofkin,$oc,$tel,$tel,$sto,$lga,$sex,$age);
				
				}else{
					echo "<b><img src='images/cancel.png' width='auto' height='13px'>&nbsp;Incorrect Field Format</b>";
					}
			}else{
				echo "<b><img src='images/cancel.png' width='auto' height='13px'>&nbsp;Telephone Already Existing</b>";
				}
			}
		}
	exit();
?>