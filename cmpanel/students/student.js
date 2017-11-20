// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Student form validation
	////////////////////////////////////
	$("#insertStudent").validate({
		rules: 
		{ 
			fileupload:
			{
				required: true,
			},
			student_sign:
			{
				required: true,
			},
			guardian_sign:
			{
				required: true,
			},
			student_name: 
			{ 
				required: true,
			},
			dob: 
			{ 
				required: true,
			},
			father_name:
			{
				required:true,
			},
			mother_name: 
			{ 
				required: true,
			},
			religion: 
			{ 
				required: true,
			},
			caste: 
			{ 
				required: true,
			},
			aadhaar_no: 
			{ 
				required: true,
			},			
			education:
			{
				required: true,
			},
			course:
			{
				required: true,
			},
			mode:
			{
				required: true,
			},
			session:
			{
				required: true,
			},
			fee_deposit_detail:
			{
				required: true,
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
			pincode:
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
			bank_name:
			{
				required: true,
			},
			account_no:
			{
				required: true,
			},
			bank_address:
			{
				required: true,
			},
			ifsc_code:
			{
				required: true,
			},

            ac_holder_name:
			{
				required: true,
			},

		},
		messages:
		{
			
		}
	});// eof validation
	
	
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
			   url: "student_curd.php",
			   data:formdata,
			   success: function(data){// alert(data);
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
			   url: "student_curd.php",
			   data:formdata,
			   success: function(data){  //alert(data);
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
		
		flag=$("#insertStudent").valid();
		
		if (flag==true)
		{		
		
		var gender = $("input[name='gender']:checked").val();
		var physical_status = $("input[name='physical_status']:checked").val();
		
		
			var formdata = new FormData();
			formdata.append('type', "addStudent");
			
			formdata.append('file', $('input[id=fileupload]')[0].files[0]);
			formdata.append('student_sign', $('input[id=student_sign]')[0].files[0]);
			formdata.append('guardian_sign', $('input[id=guardian_sign]')[0].files[0]);
			
			formdata.append('reference', $("#reference").val());
			formdata.append('student_name', $("#student_name").val());
			formdata.append('dob', $("#dob").val());
			formdata.append('gender', gender);
			formdata.append('father_name', $("#father_name").val());
			formdata.append('mother_name', $("#mother_name").val());			
			formdata.append('religion', $("#religion").val());
			formdata.append('caste', $("#caste").val());
			formdata.append('physical_status', physical_status);			
			formdata.append('aadhaar_no', $("#aadhaar_no").val());
			formdata.append('education', $("#education").val());
			formdata.append('course', $("#course").val());
			formdata.append('mode', $("#mode").val());
			formdata.append('session', $("#session").val());
			formdata.append('fee_deposit_detail', $("#fee_deposit_detail").val());
			formdata.append('block', $("#block").val());
			formdata.append('address', $("#address").val());
			formdata.append('pincode', $("#pincode").val());
			formdata.append('contact_no', $("#contact_no").val());
			formdata.append('email', $("#email").val());			
			formdata.append('bank_name', $("#bank_name").val());
			formdata.append('account_no', $("#account_no").val());
			formdata.append('bank_address', $("#bank_address").val());
			formdata.append('ifsc_code', $("#ifsc_code").val());
			formdata.append('ac_holder_name', $("#ac_holder_name").val());			
			
			
			$.ajax({
			   type: "POST",
			   url: "student_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   
				   if(data==1)
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
			
			var formdata = new FormData();
			formdata.append('type', "editEmployee");
			
			formdata.append('emp_image', image);
			formdata.append('imageval', imageval);
			formdata.append('emp-img', $('#emp-img').val());
			
			
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