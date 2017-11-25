// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Student Search form validation
	////////////////////////////////////
	$("#findstudentFrm").validate({
		rules: 
		{ 
			course_code:
			{
				required: true,
				//InvalidStudentCode:true,
			//	number:true
			},
			
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////
	// Payment form validation
	////////////////////////////////////
	
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////

	
	///////////////////////////////////////////////////
	// Method to check the data is greater than 0 or not
	///////////////////////////////////////////////////
	
	
	//////////////////////////////////////////
	// on keyup of student_code
	//////////////////////////////////////////
	$("#displayInfo").hide();
	
	$(document).on('click', '#search', function() {
		
		flag=$("#findstudentFrm").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			
			//var course_code=$('#course_code :selected').val();

		var course_code = $("#course_code").val() || [];


			alert(course_code);
			formdata.append('type', "getStudentInfo");
		formdata.append('course_code',course_code);
	      
			var x;
			$.ajax({
			   type: "POST",
			   url: "fees_curd.php",
			   data:formdata,
			   success: function(data){  alert(data);
					if(data!=""){
						$("#displayInfo").show();
						$('#displayInfo').html(data);
					}
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax	
		}
		
	});
	
	$(document).on('click', "input[name='mode']", function() {
	
		var paymentMode = $(this).val();
		
		if(paymentMode == "cash"){
			$("#cheque_no").val(" ");
			$("#cheque_no").hide();
			
		}
		if(paymentMode == "cheque"){
			$("#tranisation").val(" ");
			$("#tranisation").show();
			
		}

		if(paymentMode == "dd"){
			$("#tranisation").val(" ");
			$("#tranisation").show();
			
		}
		if(paymentMode == "neft"){
			$("#tranisation").val(" ");
			$("#tranisation").show();
			
		}
		
	
	});
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$(document).on('click', "#save", function() {
	
		
			var paymentmode= $("input[name='mode']:checked").val();	
			var student= $("input[name='get_val']").val();	
			alert(student);
		 	formdata.append('type', "regestration_fees_send");
		 	formdata.append('student',student);
		 	formdata.append('mode',mode);
			$.ajax({
			   type: "POST",
			   url: "fees_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   if(x==1)
					{
						window.location.replace("view-notice.php");				
					}
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});
		
		
	});
	
	
	//////////////////////////////////
	// on click of update button
	//////////////////////////////////
	$("#edit").click(function(){		
		
		flag=$("#insertNotice").valid();
		
		if (flag==true)
		{
					
			var formdata = new FormData();
			formdata.append('type', "editNotice");
			formdata.append('notice_id', $("#notice_id").val());
			formdata.append('student_id', $("#student_id").val());
			formdata.append('notice', $("#notice").val());			
			
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "notice_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   if(x==1)
					{
						window.location.replace("view-notice.php");				
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
			var id=$(this).attr("id");
			
			$.ajax({
				url:"notice_curd.php",
				type: "POST",
				data: {type:"delete",id:id},
				async:false,
				success: function(data){ //alert(data);
				}
			});
			location.reload();
	    }
	});
	
});//eof of ready function