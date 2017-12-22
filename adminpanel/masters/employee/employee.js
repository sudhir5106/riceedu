// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Employee form validation
	////////////////////////////////////
	$("#insertEmployee").validate({
		rules: 
		{ 
			fileupload:
			{
				required: true,
				extension: "jpg|png|jpeg|gif",
			},


			fileupload_sign:
			{
				required: true,
				extension: "jpg|png|jpeg|gif",
			},
			emp_name: 
			{ 
				required: true,
				//CenterNameExist:true
			},
			designation: 
			{ 
				required: true,
			},
			salary:
			{
				required:true,
				number:true,
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
			posting_place:
			{
				required: true,
			},
			duty_time:
			{
				required: true,
			},
			Visiting_Date_Place:
			{
				required: true,
			},
			contact_no:
			{
				required: true,
				minlength: 10,
				maxlength: 11,
				number:true
			},			
			email:
			{
				required: true,
				email:true
			},
			payment_record:
			{
				required: true,
			},
			perfromance:
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
	// Add Employee form validation
	////////////////////////////////////
	$("#editEmployee").validate({
		rules: 
		{ 
			fileupload:
			{
				//required: true,
				extension: "jpg|png|jpeg|gif",
			},
			emp_name: 
			{ 
				required: true,
				//CenterNameExist:true
			},
			designation: 
			{ 
				required: true,
			},
			salary:
			{
				required:true,
				number:true,
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
			posting_place:
			{
				required: true,
			},
			duty_time:
			{
				required: true,
			},
			Visiting_Date_Place:
			{
				required: true,
			},
			contact_no:
			{
				required: true,
				minlength: 10,
				maxlength: 11,
				number:true
			},			
			email:
			{
				required: true,
				email:true
			},
			password:
			{
				required: true,
			},
			payment_record:
			{
				required: true,
			},
			perfromance:
			{
				required: true,
			},
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	/////////////////////////////////////////////
	// we unchange the textbox value 
	// when checkbox clicked
	/////////////////////////////////////////////
	$(document).on('click', '#rmChkBx', function() {
		
		if($(this).prop('checked') == true)
		{							
			$('#dmChkBx').each(function() {
				this.checked = false;
			})
			$('#cmChkBx').each(function() {
				this.checked = false;
			})
			$('#otherChkBx').each(function() {
				this.checked = false;
			})
			
			$("#designation").attr('readonly', 'true');
			$('#designation').val("Regional Manager");
		}
		
	});
	
	
	$(document).on('click', '#dmChkBx', function() {
		
		if($(this).prop('checked') == true)
		{							
			$('#rmChkBx').each(function() {
				this.checked = false;
			})
			$('#cmChkBx').each(function() {
				this.checked = false;
			})
			$('#otherChkBx').each(function() {
				this.checked = false;
			})
			
			$("#designation").attr('readonly', 'true');
			$('#designation').val("District Manager");			
		}
		
	});
	
	
	$(document).on('click', '#cmChkBx', function() {
		
		if($(this).prop('checked') == true)
		{							
			$('#rmChkBx').each(function() {
				this.checked = false;
			})
			$('#dmChkBx').each(function() {
				this.checked = false;
			})
			$('#otherChkBx').each(function() {
				this.checked = false;
			})
			
			$("#designation").attr('readonly', 'true');
			$('#designation').val("Center Manager");
			
		}
		
	});
	
	
	$(document).on('click', '#otherChkBx', function() {
		
		if($(this).prop('checked') == true)
		{							
			$('#rmChkBx').each(function() {
				this.checked = false;
			})
			$('#dmChkBx').each(function() {
				this.checked = false;
			})
			$('#cmChkBx').each(function() {
				this.checked = false;
			})
			
			$('#designation').val("");
			$("#designation").removeAttr('readonly');
			$("#designation").focus()
		}
		
	});
	
	//////////////////////////////////////////
	// on change of state drop down
	//////////////////////////////////////////
	$('#state').change(function(){
					
			var formdata = new FormData();
			formdata.append('type', "getDistrict");
			formdata.append('stateId', $("#state").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "employee_curd.php",
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
	$('#district').change(function(){
					
			var formdata = new FormData();
			formdata.append('type', "getBlocks");
			formdata.append('districtId', $("#district").val());
	   
			var x;
			$.ajax({
			   type: "POST",
			   url: "employee_curd.php",
			   data:formdata,
			   success: function(data){ alert(data);
				   $('#block').html(data);
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
	});
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
		
		flag=$("#insertEmployee").valid();
		
		if (flag==true)
		{		
		
			var formdata = new FormData();
			formdata.append('type', "addEmployee");
			formdata.append('file', $('input[id=fileupload]')[0].files[0]);
			formdata.append('file_sign', $('input[id=fileupload_sign]')[0].files[0]);
			formdata.append('emp_code', $("#emp_code").val());
			formdata.append('emp_name', $("#emp_name").val());
			formdata.append('designation', $("#designation").val());
			formdata.append('salary', $("#salary").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('posting_place', $("#posting_place").val());
			formdata.append('duty_time', $("#duty_time").val());
			formdata.append('Visiting_Date_Place', $("#Visiting_Date_Place").val());
			formdata.append('contact_no', $("#contact_no").val());
			formdata.append('email', $("#email").val());
			formdata.append('payment_record', $("#payment_record").val());
			formdata.append('perfromance', $("#perfromance").val());
			
			var x;
			$.ajax({
			   type: "POST",
			   url: "employee_curd.php",
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
	// on click of update button
	//////////////////////////////////
	$("#edit").click(function(){
		
		
		flag=$("#editEmployee").valid();
		
		if (flag==true)
		{
			//Check Here Profile Image Uploaded or not
			var image='';
			var imageval='';			
			if($("#fileupload").val().length>0)
				{
					image=$("#fileupload").prop('files')[0];
					imageval=1;
				}
				//Check Here Sign Image Uploaded or not
			var image_sign='';
			var image_signval='';			
			if($("#emp_sign_image").val().length>0)
				{
					image_sign=$("#emp_sign_image").prop('files')[0];
					image_signval=1;
				}
			var formdata = new FormData();
			formdata.append('type', "editEmployee");
			formdata.append('emp_image', image);
			formdata.append('imageval', imageval);
			formdata.append('emp-img', $('#emp-img').val());
			formdata.append('emp_sign_image',image_sign);
			formdata.append('image_signval',image_signval);
			formdata.append('emp-sign', $('#emp-sign').val());
			formdata.append('emp_id', $("#emp_id").val());
			formdata.append('emp_code', $("#emp_code").val());
			formdata.append('emp_name', $("#emp_name").val());
			formdata.append('designation', $("#designation").val());
			formdata.append('salary', $("#salary").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('posting_place', $("#posting_place").val());
			formdata.append('duty_time', $("#duty_time").val());
			formdata.append('Visiting_Date_Place', $("#Visiting_Date_Place").val());
			formdata.append('contact_no', $("#contact_no").val());
			formdata.append('email', $("#email").val());
			formdata.append('payment_record', $("#payment_record").val());
			formdata.append('perfromance', $("#perfromance").val());
			
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "employee_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});
			
			if(x==1)
			{
			  window.location.replace("index.php");				
			}
		}//eof if condition
	});
	
	//////////////////////////////////
	// on click of delete button
	//////////////////////////////////
	$(".delete").click(function(){
		
		var didConfirm = confirm("Are you sure?");
	    if (didConfirm == true) {
			var emp_id=$(this).attr("id");
			
			$.ajax({
				url:"employee_curd.php",
				type: "POST",
				data: {type:"delete",emp_id:emp_id},
				async:false,
				success: function(data){ //alert(data);
				}
			});
			location.reload();
	    }
	});
	
});//eof of ready function