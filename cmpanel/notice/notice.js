// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Student form validation
	////////////////////////////////////
	$("#insertNotice").validate({
		rules: 
		{ 
			student_code:
			{
				required: true,
				InvalidStudentCode:true,
				number:true
			},
			notice:
			{
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('InvalidStudentCode', function(val, element)
	{		
		$.ajax({
			 url:"notice_curd.php",
			 type: "POST",
			 data: {type:"InvalidStudentCode", student_code: $('#student_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid Student Code.');
	
	
	//////////////////////////////////////////
	// on keyup of student_code
	//////////////////////////////////////////
	$('#student_code').keyup(function(){
		
							
			var formdata = new FormData();
			formdata.append('type', "getStudentName");
			formdata.append('student_code', $("#student_code").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "notice_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
					if(data!=""){
						$("#student-info").show();
						$('#student-name').html(data);
					}
					
					if($('#student_code').val()==''){
						$('#student-name').html('');
					}
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
		
		flag=$("#insertNotice").valid();
		
		if (flag==true)
		{		
		
			var formdata = new FormData();
			formdata.append('type', "sendNotice");
			
			formdata.append('student_id', $("#student_id").val());
			formdata.append('notice', $("#notice").val());
			
			$.ajax({
			   type: "POST",
			   url: "notice_curd.php",
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