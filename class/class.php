<?php
//ADMINISTRATORS

	class process
{
	protected $file;
	private $left;
	private $sx=101;

	//Constructor
	public function __construct(){
		$file='conn/update.txt';
		if(file_exists($file)==false){
						$file='../conn/update.txt';
						file_exists($file)?'':die('App Shutdown Unexpectedly, Please Contact App Provider');

				}
			file_exists($file)?'':die('App Shutdown Unexpectedly, Please Contact App Provider');
			file_exists(SKIT)?'':die('App Shutdown Unexpectedly, Contact App Provider');
		}
		
	//Input Validator		
	public function check($item){
		trim(stripslashes(strip_tags($item)));
		}
	
	//Check Admin and Page Authentication
	public function validatead(){
		
		global $link;
		
		$a=$_SESSION['em'];
		$b=$_SESSION['ps'];
		
		$sql_ch=mysqli_query($link,"SELECT role FROM users WHERE email='$a' and password='$b' and bk='0'");
			
			if(mysqli_num_rows($sql_ch)==0){
				header('location:lgt.php');
			}	
		}
		
		
	//min. Updater	
	public function lastminupdater(){
		
		}
		
	//login Admin	
	public function adlogin($mail,$pass){
		global $link;
		
		@(int)$_SESSION['trial']+=1;
		
		$this->left=5-($_SESSION['trial']);
			
			$sql=mysqli_query($link,"SELECT role,bk FROM users WHERE email='".mysqli_real_escape_string($link,$mail)."' and password='".mysqli_real_escape_string($link,$pass)."' and (role='Super User' OR role='Registration Officer' OR role='Registrar')");
				
				//echo "good";

				if(mysqli_num_rows($sql)==1 && $_SESSION['trial']<5){
					list($role,$bk)=mysqli_fetch_row($sql);
					
					if($bk==1){
						echo "<b><img src='images/cancel.png' width='auto' height='13px'>&nbsp;You have been <span style='color:red;'>BLOCKED</span></b>";
						}else{
							$_SESSION['em']=$mail;
							$_SESSION['ps']=$pass;
							$_SESSION['role']=$role;
							unset($_SESSION['trial']);
							echo $this->sx;
						}
				}else{
					
					if((int)$this->left<=-1){
						
						echo "<b><img src='images/cancel.png' width='auto' height='13px'>&nbsp;Trials Exhausted: <a href='lgt.php'>Refresh</a></b>";
						
					}else{
						echo "<b><img src='images/cancel.png' width='auto' height='13px'>&nbsp;Email, Password Combination Incorrect. $this->left trials left</b>";
					}
				}
	}
	
	//Ad Profile
	public function adprof($a,$b){
		global $link;
		
		$sql=mysqli_query($link,"SELECT id,role,name,pix,sex,reg_lga,reg_state FROM users WHERE email='$a' and password='$b'");
			if(mysqli_num_rows($sql)==1){
				list($id,$role,$name,$pix,$sex,$lga,$sto)=mysqli_fetch_row($sql);
				
				ucfirst($role);
				ucwords($name);
				ucwords($lga);
				ucwords($sto);
				strtoupper($sex);
				
				$sqli=mysqli_query($link,"SELECT state FROM state WHERE id='$sto'");
				list($sto)=mysqli_fetch_row($sqli);
					
			echo "<div id='details'>
       		 
			 <p class='webdata'>
        		<span id='left' style='float:left;'>Name</span>
        		<span id='right' style='float:right; color:green;'>$name</span>
        	</p>

        	<p class='webdata'>
        		<span id='left' style='float:left;'>Assigned L.G.A</span>
        		<span id='right' style='float:right;'>$lga</span>
       	 	</p>


       		 <p class='webdata'>
        		<span id='left' style='float:left;'>Registration State</span>
        		<span id='right' style='float:right;'>$sto</span>
        	</p>
       
        	<p class='webdata'>
        		<span id='left' style='float:left;'>Role</span>
        		<span id='right' style='float:right;'>$role</span>
       	 	</p>


       
        	<p class='webdata'>
        		<span id='left' style='float:left;'>Gender</span>
        		<span id='right' style='float:right;'>$sex</span>
       	 	</p>
       
        	</div>";
			
			if($pix=='favater.jpg' || $pix=='mavater.jpg'){
					echo "<div id='pix'>
							<img src='uploads/pix/$pix' width='auto' height='160px'>
								<br>
							<span style='margin-left:98px;'>
								<a id='changepix' title='Change Picture'><img src='images/edit.png' width='auto' height='10px'></a>
							</span>
						</div>";
					}else{
						
						echo "<div id='pix'>
									<img src='uploads/pix/$pix' width='auto' height='160px'>
								</div>";
						
						}
		
	
				}else{
					echo "<center><p><b>No Profile</b></p><center>";
					}
			
			
		}
	
	//Registration	
	public function reg($fm,$father,$mother,$nextofkin,$oc,$tel,$mail,$sto,$lga,$sex,$age){
			global $link;
			
			$a=$_SESSION['em'];
			$b=$_SESSION['ps'];
			
			$get_officer=mysqli_query($link,"SELECT name,reg_lga,reg_state FROM users WHERE email='$a' and password='$b'");
			list($officer,$rlga,$rstate)=mysqli_fetch_row($get_officer);
			
			$sql=mysqli_prepare($link,"INSERT INTO users(id,role,name,email,password,pix,sex,bk,dateofbirth,lga,occupation,sto,date,father,mother,officer,reg_state,reg_lga) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			
			$e='';
			$role='People';
			$pix=$_SESSION['funame'];
			$bk=0;
			$today=date('d M Y',mktime());
			
			mysqli_stmt_bind_param($sql,'issssssissssssssss',$e,$role,$fm,$mail,$e,$pix,$sex,$bk,$age,$lga,$oc,$sto,$today,$father,$mother,$officer,$rstate,$rlga);
			
			if(mysqli_stmt_execute($sql)){
				@rename("../uploads/pix/del/".$pix,"../uploads/pix/".$pix);
				echo $this->sx;
				
				}else{
					echo "<b style='color:red;'>System Busy, Try Again";
					}
			
			}
		
	public function adreg($fm,$role,$e,$oc,$tel,$mail,$sto,$lga,$sex,$age,$pass){
		global $link;
			
			$a=$_SESSION['em'];
			$b=$_SESSION['ps'];
			
			$get_officer=mysqli_query($link,"SELECT name FROM users WHERE email='$a' and password='$b'");
			list($officer)=mysqli_fetch_row($get_officer);
			
			$sql=mysqli_prepare($link,"INSERT INTO users(id,role,name,email,password,pix,sex,bk,dateofbirth,lga,occupation,sto,date,father,mother,officer,reg_state,reg_lga) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			
			$e='';
			
			$pix=$_SESSION['funame'];
			$bk=0;
			$today=date('d M Y',mktime());
			
			mysqli_stmt_bind_param($sql,'issssssissssssssss',$e,$role,$fm,$mail,$pass,$pix,$sex,$bk,$age,$e,$oc,$e,$today,$e,$e,$officer,$sto,$lga);
			
			if(mysqli_stmt_execute($sql)){
			@rename("../uploads/pix/del/".$pix,"../uploads/pix/".$pix);

				echo $this->sx;
				
				}else{
					echo "<b style='color:red;'>System Busy, Try Again";
					}
			
			}
		
	public function getdata($oc,$sto,$lga,$sex,$aboveage,$belowage){
		global $link;
		
		if(!empty($aboveage) && !empty($belowage) && empty($sto) && empty($oc) && empty($sex)){
			
		$sql=mysqli_query($link,"SELECT name,email,pix,sex,dateofbirth,lga,sto,date,father,mother FROM users WHERE  dateofbirth>'$belowage' AND dateofbirth<'$aboveage' AND role='People'") or die(mysqli_error($link));
		}else if(!empty($aboveage) && !empty($belowage) && !empty($sto) && empty($oc) && empty($sex)){

		$sql=mysqli_query($link,"SELECT name,email,pix,sex,dateofbirth,lga,sto,date,father,mother FROM users WHERE  dateofbirth>'$belowage' AND dateofbirth<'$aboveage' AND reg_state='$sto' and reg_lga='$lga' AND role='People'") or die(mysqli_error($link));
			
		}else if(!empty($aboveage) && !empty($belowage) && !empty($oc) && empty($sto) && empty($sex)){
			
		$sql=mysqli_query($link,"SELECT name,email,pix,sex,dateofbirth,lga,sto,date,father,mother FROM users WHERE  dateofbirth>'$belowage' AND dateofbirth<'$aboveage' AND occupation='$oc' AND role='People'") or die(mysqli_error($link));
	
		}else if(!empty($aboveage) && !empty($belowage) && !empty($sex) && empty($oc)  && empty($sto)){
			
		$sql=mysqli_query($link,"SELECT name,email,pix,sex,dateofbirth,lga,sto,date,father,mother FROM users WHERE  dateofbirth>'$belowage' AND dateofbirth<'$aboveage' AND sex='$sex' AND role='People'") or die(mysqli_error($link));

			
		}
		
		echo "
		<tr>
			<th>Name</th>
			<th>Sex</th>
			<th>Father</th>
			<th>Mother</th>
			
			<th>Age</th>
			<th>L.G.A</th>
			<th>State</th>
			<th>Reg. Date</th>
		
		</tr>";
		$stat=mysqli_num_rows($sql);
		while(list($name,$mail,$pix,$gender,$age,$lga,$state,$rgdate,$father,$mother)=mysqli_fetch_row($sql)){
		
			$sqli=mysqli_query($link,"SELECT state FROM state WHERE id='$state'");
			list($sto)=mysqli_fetch_row($sqli);
			
			echo "<tr>
			
				<td><a target='_new' href='uploads/pix/$pix'><img src='uploads/pix/$pix' width='30px' height='auto'></a>&nbsp;&nbsp;$name</td>
				<td>$gender</td>
				<td>$father</td>
				<td>$mother</td>
				
				<td>$age</td>
				<td>$lga</td>
				<td>$sto</td>
				<td>$rgdate</td>
			
			</tr>";
			
			}
			
			echo "<br><tr>
			
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				
				<td></td>
				<td></td>
				<td></td>
				<td>$stat People.</td>
			
			</tr>";
	
		}


	public function getsearchdata($name){
		global $link;
		
		
			$sql=mysqli_query($link,"SELECT name,email,pix,sex,dateofbirth,lga,sto,date,father,mother FROM users WHERE name LIKE ('%$name%') AND role='People'");
		
			
			
				echo "
		<tr>
			<th>Name</th>
			<th>Sex</th>
			<th>Father</th>
			<th>Mother</th>
			
			<th>Age</th>
			<th>L.G.A</th>
			<th>State</th>
			<th>Reg. Date</th>
		
		</tr>";
		
			
		
		while(list($name,$mail,$pix,$gender,$age,$lga,$state,$rgdate,$father,$mother)=mysqli_fetch_row($sql)){
			
				echo "<tr>
			
				<td><a target='_new' href='uploads/pix/$pix'><img src='uploads/pix/$pix' width='30px' height='auto'></a>&nbsp;&nbsp;$name</td>
				<td>$gender</td>
				<td>$father</td>
				<td>$mother</td>
				
				<td>$age</td>
				<td>$lga</td>
				<td>$sto</td>
				<td>$rgdate</td>
			
			</tr>";
			
			}
		
		}

		public function gainstats(){
			global $link;
			$sql=mysqli_query($link,"SELECT * FROM users WHERE role='People' and sex='Female'");
			$no_female=mysql_num_rows($sql);
			
			$sqli=mysqli_query($link,"SELECT * FROM users WHERE role='People' and sex='Male'");
			$no_male=mysql_num_rows($sqli);
			
			
			}

}




//Class Compare Images
class compareImages
	{
	
	private function mimeType($i)
	{
		/*returns array with mime type and if its jpg or png. Returns false if it isn't jpg or png*/
		$mime = getimagesize($i);
		$return = array($mime[0],$mime[1]);
      
		switch ($mime['mime'])
		{
			case 'image/jpeg':
				$return[] = 'jpg';
				return $return;
			case 'image/png':
				$return[] = 'png';
				return $return;
			default:
				return false;
		}
	}  
    
	private function createImage($i)
	{
		/*retuns image resource or false if its not jpg or png*/
		$mime = $this->mimeType($i);
      
		if($mime[2] == 'jpg')
		{
			return imagecreatefromjpeg ($i);
		}else if ($mime[2] == 'png') 
		{
			return imagecreatefrompng ($i);
		} 
		else 
		{
			return false; 
		} 
	}
    
	private function resizeImage($i,$source)
	{
		/*resizes the image to a 8x8 squere and returns as image resource*/
		$mime = $this->mimeType($source);
      
		$t = imagecreatetruecolor(8, 8);
		
		$source = $this->createImage($source);
		
		imagecopyresized($t, $source, 0, 0, 0, 0, 8, 8, $mime[0], $mime[1]);
		
		return $t;
	}
    
    	private function colorMeanValue($i)
	{
		/*returns the mean value of the colors and the list of all pixel's colors*/
		$colorList = array();
		$colorSum = 0;
		for($a = 0;$a<8;$a++)
		{
		
			for($b = 0;$b<8;$b++)
			{
			
				$rgb = imagecolorat($i, $a, $b);
				$colorList[] = $rgb & 0xFF;
				$colorSum += $rgb & 0xFF;
				
			}
			
		}
		
		return array($colorSum/64,$colorList);
	}
    
    	private function bits($colorMean)
	{
		/*returns an array with 1 and zeros. If a color is bigger than the mean value of colors it is 1*/
		$bits = array();
		 
		foreach($colorMean[1] as $color){$bits[]= ($color>=$colorMean[0])?1:0;}

		return $bits;

	}
	
    	public function compare($a,$b)
	{
		/*main function. returns the hammering distance of two images' bit value*/
		$i1 = $this->createImage($a);
		$i2 = $this->createImage($b);
		
		if(!$i1 || !$i2){return false;}
		
		$i1 = $this->resizeImage($i1,$a);
		$i2 = $this->resizeImage($i2,$b);
		
		imagefilter($i1, IMG_FILTER_GRAYSCALE);
		imagefilter($i2, IMG_FILTER_GRAYSCALE);
		
		$colorMean1 = $this->colorMeanValue($i1);
		$colorMean2 = $this->colorMeanValue($i2);
		
		$bits1 = $this->bits($colorMean1);
		$bits2 = $this->bits($colorMean2);
		
		$hammeringDistance = 0;
		
		for($a = 0;$a<64;$a++)
		{
		
			if($bits1[$a] != $bits2[$a])
			{
				$hammeringDistance++;
			}
			
		}
		  
		return $hammeringDistance;
	}

}

	
		

?>