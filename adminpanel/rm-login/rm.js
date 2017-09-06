// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add RM Login form validation
	////////////////////////////////////
	$("#insertRm").validate({
		rules: 
		{ 
			emp_code: 
			{ 
				required: true,
				rmCodeValid:true,
				rmAdded:true
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
	$("#editRm").validate({
		rules: 
		{ 
			emp_code: 
			{ 
				required: true,
				rmCodeValid:true,
				rmAddedEdit:true
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
	$.validator.addMethod('rmCodeValid', function(val, element)
	{		
		$.ajax({
			 url:"rm_curd.php",
			 type: "POST",
			 data: {type:"rmCodeValid", emp_code: $('#emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid RM Employee Code.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is Exis or not
	///////////////////////////////////////////////////
	$.validator.addMethod('rmAdded', function(val, element)
	{		
		$.ajax({
			 url:"rm_curd.php",
			 type: "POST",
			 data: {type:"rmAdded", emp_code: $('#emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'RM Employee Code Already Added.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is Exis or not
	///////////////////////////////////////////////////
	$.validator.addMethod('rmAddedEdit', function(val, element)
	{		
		$.ajax({
			 url:"rm_curd.php",
			 type: "POST",
			 data: {type:"rmAddedEdit", rid:$("#rid").val(), emp_code: $('#emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'RM Employee Code Already Added.');
	
	
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
			   url: "rm_curd.php",
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
			   url: "rm_curd.php",
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
	// on change of district drop down
	//////////////////////////////////////////
	$(document).on('keyup', '#emp_code', function() {
		var formdata = new FormData();
			formdata.append('type', "getEmpName");
			formdata.append('emp_code', $("#emp_code").val());

			$.ajax({
			   type: "POST",
			   url: "rm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   if(data!=""){
					   $("#empNameBlk").show();
					   $("#empName").html(data);
				   }
				   else{
					   $("#empNameBlk").hide();
					   $("#empName").html("");
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
		
		var rid = $(this).attr("id");
		
		var formdata = new FormData();
			formdata.append('type', "changeStatus");
			formdata.append('rid', rid);
			
			$.ajax({
			   type: "POST",
			   url: "rm_curd.php",
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
		
		flag=$("#insertRm").valid();
		
		if (flag==true)
		{		
		
			var formdata = new FormData();
			formdata.append('type', "addRmLogin");
			formdata.append('emp_code', $("#emp_code").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('password', $("#password").val());
			
			var x;
			$.ajax({
			   type: "POST",
			   url: "rm_curd.php",
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
		
		flag=$("#editRm").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			formdata.append('type', "editRmLogin");
			formdata.append('rid', $("#rid").val());
			formdata.append('emp_code', $("#emp_code").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('password', $("#password").val());
			
			
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "rm_curd.php",
			   data:formdata,
			   success: function(data){ alert(data);
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
			var rid=$(this).attr("id");
			
			$.ajax({
				url:"rm_curd.php",
				type: "POST",
				data: {type:"delete",rid:rid},
				async:false,
				success: function(data){ 
				}
			});
			location.reload();
	    }
	});
	
});//eof of ready function