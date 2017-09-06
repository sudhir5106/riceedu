// JavaScript Document
$(document).ready(function(){
	
	$("#msg").hide();
	$("#msg2").hide();
	
	///////////////////////////////////
	// Add Employee form validation
	////////////////////////////////////
	$("#empInfo").validate({
		rules: 
		{
			emp_code: 
			{ 
				required: true,
				validEmpCode : true,
			},
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////////////////////
	// Method to check is the data already exist or not
	///////////////////////////////////////////////////
	$.validator.addMethod('validEmpCode', function(val, element)
	{		
		$.ajax({
			 url:"login_curd.php",
			 type: "POST",
			 data: {type:"validEmpCode",emp_code:$("#emp_code").val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid Employee Code.');

	
	//////////////////////////////////
	// on click of FindEmpBtn button
	//////////////////////////////////
	$('#FindEmpBtn').click(function(){
		
		flag=$("#empInfo").valid();
		
		if (flag==true)
		{
			$('#myModal').modal({
				show: 'true',
				width: 800
			}); 			
			
			var formdata = new FormData();
			formdata.append('type', "getEmpDetails");
			formdata.append('emp_code', $("#emp_code").val());
	
			$.ajax({
			   type: "POST",
			   url: "login_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				  $("#empDetails").html(data);
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax

			
		}
		
	});
	
	
	///////////////////////////////////
	// RM Form Validation
	////////////////////////////////////
	$("#rmloginfrm").validate({
		rules: 
		{
			rmEmpCode: 
			{ 
				required: true,
			},
			rmpassword:
			{
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	//////////////////////////////////
	// on click of FindEmpBtn button
	//////////////////////////////////
	$("#rmloginBtn").click(function()
	{
		
		flag=$("#rmloginfrm").valid();
		
		if (flag==true)
		{
			$("#msg").text('');
			var user_name =$("#rmEmpCode").val();
			var password =$("#rmpassword").val();
			
			var x;
			$.ajax(
			{
				url:'login_curd.php',
				type:'POST',
				data:{type:"checkLogin", user:user_name, password:password},
				success:function(data){ //alert(data);
					x=data;
					
					if(x=="true")
					{
						document.location.href="rmpanel/index.php";
					}
					else if(x=="blocked")
					{
						$("#msg").append("<strong>Warning!</strong> Username/Password is blocked. Please contact your administrator.");
						$("#msg").show();
					}
					else
					{
						$("#msg").html("<strong>Warning!</strong> Incorrect Username/Password!");
						$("#msg").show();
					}
					
				}
			});
			
		}//eof if condition
		
	});//eof click event
		
	
	///////////////////////////////////
	// DM Form Validation
	////////////////////////////////////
	$("#dmloginfrm").validate({
		rules: 
		{
			dmEmpCode: 
			{ 
				required: true,
			},
			dmpassword:
			{
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	//////////////////////////////////
	// on click of dmloginBtn button
	//////////////////////////////////
	$("#dmloginBtn").click(function()
	{
		
		flag=$("#dmloginfrm").valid();
		
		if (flag==true)
		{
			$("#msg2").text('');
			var user_name =$("#dmEmpCode").val();
			var password =$("#dmpassword").val();
			
			var x;
			$.ajax(
			{
				url:'login_curd.php',
				type:'POST',
				data:{type:"checkdmLogin", user:user_name, password:password},
				success:function(data){ //alert(data);
					x=data;
					
					if(x=="true")
					{
						document.location.href="dmpanel/index.php";
					}
					else if(x=="blocked")
					{
						$("#msg2").append("<strong>Warning!</strong> Username/Password is blocked. Please contact your administrator.");
						$("#msg2").show();
					}
					else
					{
						$("#msg2").html("<strong>Warning!</strong> Incorrect Username/Password!");
						$("#msg2").show();
					}
					
				}
			});
			
		}//eof if condition
		
	});//eof click event
	
	///////////////////////////////////
	// CM Form Validation
	////////////////////////////////////
	$("#cmloginfrm").validate({
		rules: 
		{
			cmEmpCode: 
			{ 
				required: true,
			},
			cmpassword:
			{
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	//////////////////////////////////
	// on click of cmloginBtn button
	//////////////////////////////////
	$("#cmloginBtn").click(function()
	{
		
		flag=$("#cmloginfrm").valid();
		
		if (flag==true)
		{
			$("#msg3").text('');
			var user_name =$("#cmEmpCode").val();
			var password =$("#cmpassword").val();
			
			var x;
			$.ajax(
			{
				url:'login_curd.php',
				type:'POST',
				data:{type:"checkcmLogin", user:user_name, password:password},
				success:function(data){ //alert(data);
					x=data;
					
					if(x=="true")
					{
						document.location.href="cmpanel/index.php";
					}
					else if(x=="blocked")
					{
						$("#msg3").append("<strong>Warning!</strong> Username/Password is blocked. Please contact your administrator.");
						$("#msg3").show();
					}
					else
					{
						$("#msg3").html("<strong>Warning!</strong> Incorrect Username/Password!");
						$("#msg3").show();
					}
					
				}
			});
			
		}//eof if condition
		
	});//eof click event
	
	
	///////////////////////////////////
	// CM Form Validation
	////////////////////////////////////
	$("#studentloginfrm").validate({
		rules: 
		{
			studentCode: 
			{ 
				required: true,
			},
			spassword:
			{
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	//////////////////////////////////
	// on click of studentloginBtn button
	//////////////////////////////////
	$("#studentloginBtn").click(function()
	{
		
		flag=$("#studentloginfrm").valid();
		
		if (flag==true)
		{
			$("#msg4").text('');
			var user_name =$("#studentCode").val();
			var password =$("#spassword").val();
			
			var x;
			$.ajax(
			{
				url:'login_curd.php',
				type:'POST',
				data:{type:"checkStudentLogin", user:user_name, password:password},
				success:function(data){ //alert(data);
					x=data;
					
					if(x=="true")
					{
						document.location.href="studentpanel/index.php";
					}
					else if(x=="blocked")
					{
						$("#msg4").append("<strong>Warning!</strong> Username/Password is blocked. Please contact your administrator.");
						$("#msg4").show();
					}
					else
					{
						$("#msg4").html("<strong>Warning!</strong> Incorrect Username/Password!");
						$("#msg4").show();
					}
					
				}
			});
			
		}//eof if condition
		
	});//eof click event
	
	

});