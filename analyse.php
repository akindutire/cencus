<?php
	
	include_once('include/settings.php');
	include_once(MYSQLI);
	include_once('class/class.php');
	
	$cp=new process();
	$cp->validatead();
		
?>
	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ggg.png">
<title>Cencus | Analyse</title>

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
    <h3>Sort Records</h3>
    	
     	<form method="post" style="width:90%; margin-left:3%">
              
             <div class="all" style="width:100%;"><label></label>
             <input type="number" name="bage" id="bage" placeholder="Age below" style="width:90%;">
             </div>

             <div class="all" style="width:100%;"><label></label>
             <input type="number" name="age" id="age" placeholder="Age Above" style="width:90%;">
             </div>

             
             <div class="all" style="width:100%;"><label></label>
             <select name="occ" id="occ" style="width:90.5%;">

				<?php 	
				$sql21=mysqli_query($link,"SELECT * FROM occupation");
						while(list($id,$oc)=mysqli_fetch_row($sql21)){
							echo "<option value='$oc'>$oc</option>";
							}
				echo "<option value=''>Null</option>";
				
					?>
             </select>
             </div>


             <div class="all"><label>Registration State</label>
             <select name="sto" id="sto">
             	<?php 	$sql2=mysqli_query($link,"SELECT * FROM state");
						while(list($id,$state)=mysqli_fetch_row($sql2)){
							echo "<option value='$id'>$state</option>";
							}
				
				echo "<option value=''>Null</option>";
					?>
             </select>
             </div>
             
             <div class="all" id="lg"><center><img src='images/gld2.gif' height='25px'><center></div>
             
          
             <div class="all"><label>Sex</label>
             <select name="gender" id="gender">
             	<option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="">Null</option>
             </select>
             </div>




             <div class="all"><label></label>
             <button type="submit" id="sort">Sort</button>
             </div>


             
    </form>

        
        <div class="clr"></div>
        
         <div id="feedback" style="background:transparent; color:black; font-family:'Browallia New'; font-size:18px; padding:1px; margin:8px 0px 2px 140px; height:auto; width:350px; text-align:center; border-radius:3px;"></div>

		<div id="tab_cont">
        	<table id='result' cellspacing="0" cellpadding="8px" style="padding:2px; background:transparent; border:0px; width:100%;">
              
            <?php	//@$cp->getdata($var2,$var,$sbj_id_val);	?>
                
        	</table>
           <center><a id="swipe" style="font-style:bold; font-family:Arial, Helvetica, sans-serif; font-size:28px; ">^</a></center> 
			  
        </div>

 		        
	
                
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