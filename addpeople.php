<?php
	include_once('include/settings.php');
	include_once(MYSQLI);
	include_once('class/class.php');
	
	$err=array();
	$reservepix=array();
	
	$cp=new process();
	$imgc=new compareImages();
	
	$cp->validatead();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
	
		$name=strtolower($_FILES['pfile']['name']);
		$type=$_FILES['pfile']['type'];
		$size=(int)($_FILES['pfile']['size']);
		$tmp=$_FILES['pfile']['tmp_name'];
	
	
		$arraytype=array('image/jpeg','image/jpg','image/png');
		
		if(!empty($name)){
			if(in_array($type,$arraytype)){
				if($size<=(900*1024) and !empty($size)){
					$filename=mktime().$name;
					
					if(move_uploaded_file($tmp,'uploads/pix/del/'.$filename)){
						
						$reservepix=array();
						$sql=mysqli_query($link,"SELECT pix FROM users WHERE role='People'");
						
						$f="uploads/pix/del/".$filename;
						
						while(list($pix)=mysqli_fetch_row($sql)){
							$nfile="uploads/pix/$pix";
							$hm=$imgc->compare($f,$nfile);
						
							if($hm<=10){
								array_unshift($reservepix,$nfile);
							}
						}
						
						if(sizeof($reservepix)>0){
							$s[0]=0;
						}else{
							$s[0]=1;
							$_SESSION['funame']=$filename;
						}	
						
						
						echo '';
						}else{
							$err[0]="<b><img src='images/cancel.png' width='auto' height='13px'>System Error: Couldn't Complete File Submission</b>";
							}
					
					
					}else{
						$err[0]="<b><img src='images/cancel.png' width='15px' height='15px'>&nbsp;File too large, upload below 800kb</b>";
						}
			}else{
				$err[0]="<b><img src='images/cancel.png' width='15px' height='15px'>&nbsp;Unsupported File format, Suggest Using jpeg,jpg or gif file</b>";
				}
		}else{
			$err[0]="<b><img src='images/cancel.png' width='15px' height='15px'>&nbsp;No File Selected</b>";
		}
	}

?>
	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/ggg.png">
<title>Cencus | Add</title>

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
                        <li><a href="welcome.php">Back</a></li>
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
             <a href="welcome.php"><li>Home</li></a>
             <a href="lgt.php"><li>Logout</li></a>
             
             
        </ul>
    
    </div>
    
    
    <div id="mainbar">
    <h3>Upload Photo</h3>
    <script>
    function l(){
		window.location='reg.php';
		}
    </script>
     <style>
        div.all{
			width:460px;
			margin-left:1px;
			}
		.all label{	
			width:120px;
			}
		.all input{
			word-spacing:4px;
			width:310px;
			}
		.all textarea{
			word-spacing:4px;
			width:312px;
			}
		#feedback{
			background:transparent;
			color:black; 
			font-family:'Browallia New'; 
			font-size:18px; 
			padding:1px; 
			margin:8px 0px 2px 140px; 
			height:auto; 
			width:350px; 
			text-align:center; 
			border-radius:3px;
		}
        </style>
        
        <div class="clr"></div>
        
         <div id="feedback" style="background:transparent; color:black; font-family:'Browallia New'; font-size:18px; padding:1px; margin:8px 0px 2px 140px; height:auto; width:350px; text-align:center; border-radius:3px;"><? echo $err[0]; ?></div>

 		        
	 <div id='details'>
 
       
        <form action="addpeople.php" method="post" enctype="multipart/form-data">
        
        	<div class="all"><label></label><input type="file" name="pfile" id="pfile"></div>
            <div class="all"><label></label><button type="submit">Validate</button></div>
        
        </form>
        	 
       
     </div>

        
			<div id='pix' style="overflow-style:marquee-line; overflow:auto; max-height:358px;">
       
        <?php 	
		$found=sizeof($reservepix);

		echo "<p class='reviews' style='color:white; font-family:Trebuchet MS;'>Found $found Matched Photo</p>";
		if(sizeof($reservepix)==0 and $s[0]==1){
			
			 echo "	<form><div style='width:100%;' class='all'><label></label><button type='button' onclick='l()'>Continue</button></div></form>
"; 
		
		}else{
		

		
			foreach($reservepix as $a){
					
				echo "<p class='list' style='text-align:center; height:50px; border-bottom:1px solid grey;'>
				
				<a></a>&nbsp;
						<span style='white-space:nowrap;'><a href='$a' target='_new'><img src='$a' height='50px'></a></span>
			
						</p>";
			
				}
				
				
			}
		?>
         
         	
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