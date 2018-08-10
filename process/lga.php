<?php
	
	
	include_once('../include/settings.php');
	include_once('../'.MYSQLI);
	include_once('../class/class.php');
	

	$login=new process();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$val=$_POST['val'];
		
		echo "<label>L.G.A.</label><select name='lga' id='lga'>";
		$sql=mysqli_query($link,"SELECT * FROM lga WHERE state='$val'");
		while(list($id,$st,$lg)=mysqli_fetch_row($sql)){
			echo "<option value='$lg'>$lg</option>";
			}
		echo "</select>";
	}
	exit();
?>