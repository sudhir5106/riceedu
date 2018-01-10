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
			session_year:
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
	
	
	///////////////////////////////////
	// EDIT Student form validation
	////////////////////////////////////
	$("#insertStudent_EDIT").validate({
		rules: 
		{ 
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
			session_year:
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
	$('#edit').click(function(){
		
		
		;

		flag=$("#insertStudent_EDIT").valid();
		if (flag==true)
		{ 
		     
		    var gender = $("input[name='gender']:checked").val();
		    var physical_status = $("input[name='physical_status']:checked").val();
		    var file="";
		    var file_val="";
		    var student_sign="";
		    var student_sign_val="";
		    var guardian_sign="";
		    var guardian_sign_val="";
			var formdata = new FormData();
			formdata.append('type', "editStudent");
			 if($("#fileupload").val().length>0)
				{
					file=$("#fileupload").prop('files')[0];
					file_val=1;
				}
				if($("#student_sign").val().length>0)
				{
					student_sign=$("#student_sign").prop('files')[0];
					student_sign_val=1;
					
				}
				if($("#guardian_sign").val().length>0)
				{
					guardian_sign=$("#guardian_sign").prop('files')[0];
					guardian_sign_val=1;
					
				}
			formdata.append('file',file);
			formdata.append('file_val',file_val);
			formdata.append('student_sign',student_sign);
			formdata.append('student_sign_val',student_sign_val);
			formdata.append('guardian_sign',guardian_sign);
			formdata.append('guardian_sign_val',guardian_sign_val);
			formdata.append('student_name', $("#student_name").val());
			formdata.append('student_id', $("#student_id").val());
			formdata.append('reference', $("#reference").val());
			formdata.append('student_photo', $("#student_photo").val());
			formdata.append('student_signature', $("#student_signature").val());
			formdata.append('gurdian_signature', $("#gurdian_signature").val());
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
			formdata.append('session_year', $("#session_year").val());
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
				   
				   if(data)
					{
						window.location.replace("index.php");
					}
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
			
			
		}
		
		
		
		
	});
	
	
	
	
	
	
	
	//////////////////////////////////////////
	// on change of state drop down
	//////////////////////////////////////////
	$('#state').change(function(){
					$('#block').html("<option value=''>--Select Type--</option>");
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
					$('#block').html(" ");
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
			formdata.append('session_year',$("#session_year").val());
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
			   success: function(data){ alert(data);
				   
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