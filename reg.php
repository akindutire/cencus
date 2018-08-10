<?php
	
	include_once('include/settings.php');
	include_once(MYSQLI);
	include_once('class/class.php');
	
?>
	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ggg.png">
<title>Cencus | Registration</title>

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
                   
                        <li><a href="lgt.php">Logout</a></li>
                        
                        
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
        	 
             <?php //$cp->loadmenu($_SESSION['em'],$_SESSION['ps']); ?>
             <a href="welcome.php"><li>Main Menu</li></a>
             <a href="lgt.php"><li>Logout</li></a>
             
             
        </ul>
    
    </div>
    
    
    <div id="mainbar">
    <h3>Registration</h3>
    	
     
        
        <div class="clr"></div>
        
         <div id="feedback" style="background:transparent; color:black; font-family:'Browallia New'; font-size:18px; padding:1px; margin:8px 0px 2px 140px; height:auto; width:350px; text-align:center; border-radius:3px;"></div>

 		        
	
 
       
        <form method="post" enctype="multipart/form-data" id="ask">
			
           
             <input type="hidden" name="mail" id="mail" value="h">
             
             <div class="all"><label>Full Name</label>
             <input type="text" name="fullname" id="fullname"  required="required">
             </div>
             
             <div class="all"><label>Father Name</label>
             <input type="text" name="father" id="father" required="required">
             </div>
             
             <div class="all"><label>Mother Name</label>
             <input type="text" name="mother" id="mother" required="required">
             </div>
             
             <div class="all"><label>Next Of Kin</label>
             <input type="text" name="nextofkin" id="nextofkin" required="required">
             </div>

			 <div class="all"><label>Age</label>
             <input type="number" name="age" id="age" required="required">
             </div>


             
           	 <div class="all"><label>Occupation</label>
             <select name="occupation" id="occupation">
             	<?php 	$sql21=mysqli_query($link,"SELECT * FROM occupation");
						while(list($id,$oc)=mysqli_fetch_row($sql21)){
							echo "<option value='$oc'>$oc</option>";
							}
				
				
					?>
             </select>
             </div>
			
             <div class="all"><label>Telephone.</label>
             <input type="text" name="tel" id="tel" required="required">
             </div>
            
           
           
             <div class="all"><label>State Of Origin</label>
             <select name="sto" id="sto">
             	<?php 	$sql2=mysqli_query($link,"SELECT * FROM state");
						while(list($id,$state)=mysqli_fetch_row($sql2)){
							echo "<option value='$id'>$state</option>";
							}
				
				
					?>
             </select>
             </div>
             
             <div class="all" id="lg"><center><img src='images/gld2.gif' height='25px'><center></div>
             
          
             <div class="all"><label>Sex</label>
             <select name="gender" id="gender">
             	<option value="Male">Male</option>
                <option value="Female">Female</option>
             </select>
             </div>
             
             
             <div class="all"><label></label><button type="submit" id="skreg">Register</button></div>
    </form>

    

        
        
                
        <div class="clr"></div><br>
     <img src="images/cencusline.png" width="100%" height="2px;"> 
    


    </div>
    
	
   
    
    
 	</div>

<div class="clr"></div>
	</div>
<div class="clr"></div>

</div>   

<div id="footer"><p><?php echo F; ?></p></div>


</body>
</html>