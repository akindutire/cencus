// JavaScript Document
$(function(){
		
		var sx=101;
		
		$('#swipe').click(function(){
			$('form').show('fast');
			
			});
		
	
		//Admin login
		$('#login').click(function(event){
				event.preventDefault();
				
				var em=$('#mail').val();
				var pin=$('#pin').val();
				
				$('#feedback').html('<center><img src="images/gld2.gif" width="20px"></center>');
				
				$.post('process/ilogin.php',{'mail':em,'pin':pin},function(data){
					
				
					
					if(data==sx){
						
						window.location='welcome.php';
					}else{
						
						$('div #feedback').html();
						$('div #feedback').html(data);
						}
					//alert(data);
					});
			});
		
		//Get Lga
		$('#sto').bind('change',function(){
			var st=$(this).val();
			
			$.post('process/lga.php',{'val':st},function(data){
				$('#lg').html(data);
				});
			
			});
				
		//Register
		$('#skreg').click(function(){
			event.preventDefault();
			
			var fullname=$('#fullname').val(),
			father=$('#father').val(),
			mother=$('#mother').val(),
			nextofkin=$('#nextofkin').val(),
			oc=$('#occupation').val(),
			tel=$('#tel').val(),
			mail=$('#mail').val(),
			sto=$('#sto').val(),
			lga=$('#lga').val(),
			age=$('#age').val(),
			sex=$('#gender').val();
			
			//alert('Working');
			
			$.post('process/reg.php',{'fullname':fullname,'father':father,'mother':mother,'nextofkin':nextofkin,'occupation':oc,'tel':tel,'mail':mail,'sto':sto,'lga':lga,'gender':sex,'age':age},function(data){
				
				if(data==sx){
					alert('Successfully Added An Individual');
					window.location='welcome.php';
				}else{
					$('#feedback').html(data);					
					}
				
				});
			
			});
		
		//Upload File
		$('#phfile').on('change',function() {
        	
			event.preventDefault();
			
			var fdta=new FormData($('form:file')[0]);
			$.each($('#phfile')[0].files,function(i,file){
				fdta.append('file',file);
				});
				//fdta.serialize();
			
				$.ajax({
					url: 'process/uaskl.php',
           			type: 'POST',
            		data: fdta,
					contentType:false,
					processData:false,
					cache:false,
					beforeSend:function(evt){
						
							
								$('#feedback1').html('<center><img src="images/gld2.gif" width="20px""></center>');
								
						},/*
					beforeSend:function(evt){
						
							if(evt.lengthComputable){
								var percentComplete=evt.loaded/evt.total;
								$('#feedback1').html('<b>'+percentComplete+'</b>');
								}
						}*/
					error:function(){
						alert('An Error Occured, Try Again');
						},
            		success: function (data) {
						if(data==sx){
							$('#feedback1').empty().html('<b><img src="images/gld2.gif" width="20px"">&nbsp;<span style="color:green;">Success</span>:File Uploaded</b>');
							
						}else{
							$('#feedback1').html(data);
							}
					}
        			});
        });	
		
		//Add an Admin
		$('#adminreg').click(function(){
			event.preventDefault();
			
			var fullname=$('#fullname').val(),
			role=$('#role').val(),
			oc=$('#occupation').val(),
			tel=$('#tel').val(),
			mail=$('#mail').val(),
			sto=$('#sto').val(),
			lga=$('#lga').val(),
			age=$('#age').val(),
			sex=$('#gender').val(),
			ps=$('#ps').val();
			
			
			
			$.post('process/adreg.php',{'role':role,'fullname':fullname,'occupation':oc,'tel':tel,'mail':mail,'sto':sto,'lga':lga,'gender':sex,'age':age,'ps':ps},function(data){
				
				if(data==sx){
					alert('Successfully Added An Administrator');
					
					window.location='welcome.php';
				}else{
					
					$('#feedback').html(data);					
					}
				
				});
			
			});
		
		$('#sort').click(function(event){
			
			event.preventDefault(); 
			
			var ageabove=$('#age').val(),
			agebelow=$('#bage').val(),
			occ=$('#occ').val(),
			sto=$('#sto').val(),
			lga=$('#lga').val(),
			sex=$('#gender').val();
			
			$('#feedback1').html('<center><img src="images/gld2.gif" width="20px""></center>');
			
			$.post('process/sortme.php',{'age':ageabove,'bage':agebelow,'occ':occ,'sto':sto,'lga':lga,'gender':sex},function(data){
				
				if(data!=sx){
					$('form').hide('fast');
					$('#swipe').show('fast');
					$('#tab_cont table').show('fast').html(data);
					
					}else{
						alert(data);
						}
				
				});
			
			});
			
	$('#sname').keyup(function(){
		
		
		var name=$(this).val();
		
		$.post('process/search.php',{'sname':name},function(data){
			
			if(data!=sx){
				
					$('#tab_cont table').show('fast').html(data);
					
					}else{
						alert(data);
						}
			
			});
		
		
		});	
			
});//End of Body
