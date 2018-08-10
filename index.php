<?php
	
	include_once('include/settings.php');
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ggg.png">
<title>Cencus Home</title>

<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script src="js/slide.js"></script>
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
                    	
                        <li><a href="../" class="first">Home</a></li>
                        
                    </ul>
            	</nav>
            
            </div>
            
          <div class="clr"></div> 
            
            <div id="slider_cont">
            	<div id="slider">
                	<p><img src="images/1.jpg" width="800px" height="250px"></p>
                	<p><img src="images/2.jpg" width="800px" height="250px"></p>
                  	
                    
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
        	 <a href="../"><li>Home</li></a>
             
             
        </ul>
    
    </div>
    
    
    <div id="mainbar">
    <h3>Login</h3>
    	
    
        
        <div class="clr"></div>
        
    <div id="feedback" style="background:transparent; color:black; font-family:'Trebuchet MS'; font-size:12px; padding:1px; margin:8px 0px 2px 140px; height:auto; width:350px; text-align:center; border:0px solid navy; border-radius:3px;"></div>

	<form method="post">
			
             <div class="all"><label>Username</label>
             <input type="email" name="em" id="mail" autofocus="autofocus" required="required">
             </div>
             
             <div class="all"><label>Pin</label>
             <input type="password" name="pin" id="pin" required="required">
             </div>
             
             
            <!-- <div class="all"><label>Text</label>
             	<textarea></textarea>
             </div>
             -->
             <div class="all"><label></label><button type="submit" id="login">Login</button></div>
    </form>




    </div>
    
	
   
    
    
 	</div>

<div class="clr"></div>
	</div>
<div class="clr"></div>

</div>   

<div id="footer"><p><?php echo F; ?></p></div>


</body>
</html>