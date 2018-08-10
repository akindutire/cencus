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
    <h3>Welcome, My Profile</h3>
    	
    
        
        <div class="clr"></div>
       
		<?php $cp->adprof($a,$b); ?>
		

    </div>
    
	
   
    
    
 	</div>

<div class="clr"></div>
	</div>
<div class="clr"></div>

</div>   

<div id="footer"><p><?php echo F; ?></p></div>


</body>
</html>