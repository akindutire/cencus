<?php
	
	include_once('include/settings.php');
	include_once('class/class.php');
	include_once(MYSQLI);
	
	$cp=new process();
	$cp->validatead();
	
	$a=$_SESSION['em'];
	$b=$_SESSION['ps'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ggg.png">
<title>Cencus Profile</title>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/check.js"></script>
<style>


@import "css/interim.css";
@import "css/forms.css";


</style>


</head>

<body>

<div id="container">
	
    <div id="header">
    	<div class="inheader">
        	<div id="left">
            
            	<img src=<?php echo L; ?> width=<?php echo W; ?> height=<?php echo H; ?> vspace="-2px" hspace="-2px">&nbsp;<span><?php  echo E; ?></span>
            
            </div>
            <div id="right">
            	<nav>
            		<ul>
                    	
                        <li><a href="index.php" class="first">Home</a></li>
                        
                    </ul>
            	</nav>
            
            </div>
                
                
                 <div class="clr"></div> 
            
            <div id="slider_cont" style="height:1px;">
            	<div id="slider">
                		
                    
                </div>
            </div>        
            
    	</div>
        
    </div>
       
       
       
       
	<div class="clr"></div>
    
    
    
<div class="mwrap">    
    <div class="middlebody">
    
    
    <div id="sidebar">
    	<h3>Menu</h3>
    	<ul>
        	 <a href="welcome.php"><li>Home</li></a>
             <a href="lgt.php"><li>Logout</li></a>
             
        </ul>
    
    </div>
    
    
    <div id="mainbar">
    <h3>Start</h3>
    	
    
        
        <div class="clr"></div>
        
        <ul class="ihover">
        
         <li>
		<div class="hover">
        
        	<span><img src="images/prof.png"></span>
            
            <div id="inhover">
            
            	<span><a href="cpanel.php"><img src="images/prof.png" height="100px" width="100px"><a><br><br><br>My Profile</span>
            
            </div>
        
        </div>
        </li>
        
        
        
        <li>
		<div class="hover">
        
        	<span><img src="images/edit.png"></span>
            
            <div id="inhover">
            
            	<span><a href="addpeople.php"><img src="images/edit.png" height="100px" width="100px"><a><br><br><br>Helps You Add Individual</span>
            
            </div>
        
        </div>
        </li>
        
         <li>
		<div class="hover">
        
        	<span><img src="images/approve_notes.png"></span>
            
            <div id="inhover">
            
            	<span><a href="analyse.php"><img src="images/approve_notes.png" height="100px" width="100px"><a><br><br><br>Helps You Analyse Records</span>
            
            </div>
        
        </div>
        </li>
        
         <li>
		<div class="hover">
        
        	<span><img src="images/zoom_in.png"></span>
            
            <div id="inhover">
            
            	<span><a href="search.php"><img src="images/zoom_in.png" height="100px" width="100px"><a><br><br><br>Helps You Search Records</span>
            
            </div>
        
        </div>
        </li>
        
        
		<?php 

		$sql=mysqli_query($link,"SELECT role FROM users WHERE email='$a' and password='$b'");
		list($role)=mysqli_fetch_row($sql);
		if($role=='Super User' || $role=='Registrar'){ 
		
		?>
		
        <li>
		<div class="hover">
        
        	<span><img src="images/add.png"></span>
            
            <div id="inhover">
            
            	<span><a href="adminreg.php"><img src="images/add.png" height="100px" width="100px"><a><br><br><br>Add An Administrator</span>
            
            </div>
        
        </div>
        </li>
    
		
		<?php } ?>




 <li>
		<div class="hover">
        
        	<span><img src="images/exit.png"></span>
            
            <div id="inhover">
            
            	<span><a href="lgt.php"><img src="images/exit.png" height="100px" width="100px"><a><br><br><br>Logout</span>
            
            </div>
        
        </div>
        </li>
        

	</ul>


    </div>
    
	
   
    
    
 	</div>

<div class="clr"></div>
	</div>
<div class="clr"></div>

</div>   

<div id="footer"><p><?php echo F; ?></p></div>


</body>
</html>