// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add RM Login form validation
	////////////////////////////////////
	$("#insertDm").validate({
		rules: 
		{ 
			r_emp_code: 
			{ 
				required:true,
				rempCodeValid:true,
				rmloginCheck:true
			},
			d_emp_code: 
			{ 
				required: true,
				dempCodeValid:true,
				dmAdded:true
			},
			state: 
			{ 
				required: true,
			},
			district: 
			{ 
				required: true,
			},
			block: 
			{ 
				required: true,
			},
			address: 
			{ 
				required: true,
			},
			password:
			{
				required: true,
			},
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////
	// Edit RM Login form validation
	////////////////////////////////////
	$("#editDm").validate({
		rules: 
		{ 
			r_emp_code: 
			{ 
				required: true,
				rempCodeValid:true,
				rmloginCheck:true
			},
			d_emp_code: 
			{ 
				required: true,
				dempCodeValid:true,
				dmAddedEdit:true
			},
			state: 
			{ 
				required: true,
			},
			district: 
			{ 
				required: true,
			},
			block: 
			{ 
				required: true,
			},
			address: 
			{ 
				required: true,
			},
			password:
			{
				required: true,
			},
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('rempCodeValid', function(val, element)
	{		
		$.ajax({
			 url:"dm_curd.php",
			 type: "POST",
			 data: {type:"rempCodeValid", emp_code: $('#r_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid RM Employee Code.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('rmloginCheck', function(val, element)
	{		
		$.ajax({
			 url:"dm_curd.php",
			 type: "POST",
			 data: {type:"rmloginCheck", emp_code: $('#r_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'RM Lgoin Not Created.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('dempCodeValid', function(val, element)
	{		
		$.ajax({
			 url:"dm_curd.php",
			 type: "POST",
			 data: {type:"dempCodeValid", emp_code: $('#d_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid DM Employee Code.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is Exis or not
	///////////////////////////////////////////////////
	$.validator.addMethod('dmAdded', function(val, element)
	{		
		$.ajax({
			 url:"dm_curd.php",
			 type: "POST",
			 data: {type:"dmAdded", emp_code: $('#d_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'DM Employee Code Already Added.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is Exis or not
	///////////////////////////////////////////////////
	$.validator.addMethod('dmAddedEdit', function(val, element)
	{		
		$.ajax({
			 url:"dm_curd.php",
			 type: "POST",
			 data: {type:"dmAddedEdit", dmid:$("#dmid").val(), emp_code: $('#d_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'DM Employee Code Already Added.');
	
	
	//////////////////////////////////////////
	// on change of state drop down
	//////////////////////////////////////////
	$(document).on('change', '#state', function() {
					
			var formdata = new FormData();
			formdata.append('type', "getDistrict");
			formdata.append('stateId', $("#state").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "dm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   $('#district').html(data);
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
	});
	
	
	//////////////////////////////////////////
	// on change of district drop down
	//////////////////////////////////////////
	$(document).on('change', '#district', function() {
					
			var formdata = new FormData();
			formdata.append('type', "getBlocks");
			formdata.append('districtId', $("#district").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "dm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   $('#block').html(data);
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
	});
	
	//////////////////////////////////////////
	// on keyup of r_emp_code text field
	//////////////////////////////////////////
	$(document).on('keyup', '#r_emp_code', function() {
		var formdata = new FormData();
			formdata.append('type', "getEmpName");
			formdata.append('emp_code', $("#r_emp_code").val());

			$.ajax({
			   type: "POST",
			   url: "dm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   if(data!=""){
					   $("#rempNameBlk").show();
					   $("#rEmpName").html(data);
				   }
				   else{
					   $("#rempNameBlk").hide();
					   $("#rEmpName").html("");
				   }
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
	});
	
	
	//////////////////////////////////////////
	// on keyup of d_emp_code text field
	//////////////////////////////////////////
	$(document).on('keyup', '#d_emp_code', function() {
		var formdata = new FormData();
			formdata.append('type', "getEmpName");
			formdata.append('emp_code', $("#d_emp_code").val());

			$.ajax({
			   type: "POST",
			   url: "dm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   if(data!=""){
					   $("#dempNameBlk").show();
					   $("#dEmpName").html(data);
				   }
				   else{
					   $("#dempNameBlk").hide();
					   $("#dEmpName").html("");
				   }
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
	});
	
	
	//////////////////////////////////////////
	// on click of Block or Unblock button
	//////////////////////////////////////////
	$(document).on('click', '.status', function() {
		
		var dmid = $(this).attr("id");
		
		var formdata = new FormData();
			formdata.append('type', "changeStatus");
			formdata.append('dmid', dmid);
			
			$.ajax({
			   type: "POST",
			   url: "dm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   window.location.replace("index.php");
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
	});
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$(document).on('click', '#submit', function() {
		
		flag=$("#insertDm").valid();
		
		if (flag==true)
		{		
		
			var formdata = new FormData();
			formdata.append('type', "addDmLogin");
			formdata.append('r_emp_code', $("#r_emp_code").val());
			formdata.append('d_emp_code', $("#d_emp_code").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('password', $("#password").val());
			
			var x;
			$.ajax({
			   type: "POST",
			   url: "dm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   if(x==1)
					{
						window.location.replace("index.php");
					}
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			
		}// eof if condition
		
	});
	
	
	//////////////////////////////////
	// on click of Update button
	//////////////////////////////////
	$(document).on('click', '#edit', function() {
		
		flag=$("#editDm").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			formdata.append('type', "editDmLogin");
			formdata.append('dmid', $("#dmid").val());
			formdata.append('r_emp_code', $("#r_emp_code").val());
			formdata.append('d_emp_code', $("#d_emp_code").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('password', $("#password").val());
			
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "dm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   if(x==1)
					{
						window.location.replace("index.php");				
					}
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});
			
			
		}//eof if condition
	});
	
	//////////////////////////////////
	// on click of delete button
	//////////////////////////////////
	$(".delete").click(function(){
		
		var didConfirm = confirm("Are you sure?");
	    if (didConfirm == true) {
			var dmid=$(this).attr("id");
			
			$.ajax({
				url:"dm_curd.php",
				type: "POST",
				data: {type:"delete",dmid:dmid},
				async:false,
				success: function(data){ 
				}
			});
			location.reload();
	    }
	});
	
});//eof of ready function