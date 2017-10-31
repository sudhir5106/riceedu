// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Sector form validation
	////////////////////////////////////
	$("#insertCourse").validate({
		rules: 
		{ 
			course_name: 
			{ 
				required: true,
				CourseNameExist:true
			},
			application_fee:{
				required: true,
				number: true
			},
			learning_fee: 
			{ 
				required: true,
				number:true
			},
			registration_fee:
			{
				required: true,
				number:true
			},
			exam_fee:
			{
				required: true,
				number:true
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////
	// Edit Center form validation
	////////////////////////////////////
	$("#editCourse").validate({
		rules: 
		{ 
			course_name: 
			{ 
				required: true,
				EditCourseNameExist:true
			},
			application_fee:{
				required: true,
				number: true
			},
			learning_fee: 
			{ 
				required: true,
				number:true
			},
			registration_fee:
			{
				required: true,
				number:true
			},
			exam_fee:
			{
				required: true,
				number:true
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	///////////////////////////////////
	// Edit Jobroll form validation
	////////////////////////////////////
	$("#searchFrm").validate({
		rules: 
		{ 
			course_name: 
			{ 
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////////////////////
	// Method to check is the data already exist or not
	///////////////////////////////////////////////////
	var isSuccess ;
	$.validator.addMethod('CourseNameExist', function(val, element)
	{
		
		$.ajax({
				 url:"course_curd.php",
				 type: "POST",
				 data: {type:"CourseNameExist",course_name:$("#course_name").val()},
				 async:false,
				 dataType : 'json',
				 error : function(jqXHR, textStatus, errorThrown)
				 {
					alert('some error occured while submitting the form');
				 },
				 success : function(response,  textStatus,  jqXHR )
				 {
					isSuccess = response ;
				 }
		});//eof ajax
		return isSuccess ;				
	}, 'Course Name Already Exist.');
	
	///////////////////////////////////////////////////
	// Method to check is the data already exist or not
	///////////////////////////////////////////////////
	var isSuccess ;
	$.validator.addMethod('EditCourseNameExist', function(val, element)
	{

		$.ajax({
				 url:"course_curd.php",
				 type: "POST",
				 data: {type:"EditCourseNameExist",course_name:$("#course_name").val(), id:$("#id").val()},
				 async:false,
				 dataType : 'json',
				 error : function(jqXHR, textStatus, errorThrown)
				 {
					alert('some error occured while submitting the form');
				 },
				 success : function(response,  textStatus,  jqXHR )
				 {
					isSuccess = response ;
				 }
		});//eof ajax
		return isSuccess ;				
	}, 'Course Name Already Exist.');
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
		
		flag=$("#insertCourse").valid();
		
		if (flag==true)
		{			
			var formdata = new FormData();
			formdata.append('type', "addCourse");
			formdata.append('course_name', $("#course_name").val());
			formdata.append('application_fee', $("#application_fee").val());
			formdata.append('learning_fee', $("#learning_fee").val());
			formdata.append('registration_fee', $("#registration_fee").val());
			formdata.append('exam_fee', $("#exam_fee").val());
			
			var x;
			$.ajax({
			   type: "POST",
			   url: "course_curd.php",
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
		
		
		flag=$("#editCourse").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			formdata.append('type', "editCourse");
			formdata.append('id', $("#id").val());
			formdata.append('course_name', $("#course_name").val());
			formdata.append('application_fee', $("#application_fee").val());
			formdata.append('learning_fee', $("#learning_fee").val());
			formdata.append('registration_fee', $("#registration_fee").val());
			formdata.append('exam_fee', $("#exam_fee").val());
	  
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "course_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   if(x==1)
					{
						window.location.replace("list.php");				
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
			var course_id=$(this).attr("id");
			
			$.ajax({
				url:"course_curd.php",
				type: "POST",
				data: {type:"delete",course_id:course_id},
				success: function(data){ //alert(data);
					location.reload();
				}
			});
			
	    }
	});
	
	//////////////////////////////////
	// on click of block search button
	//////////////////////////////////
	$(document).on("click","#search", function(){
		
		var formdata = new FormData();
		formdata.append('type', "searchByCourseName");
		formdata.append('course_name', $("#course_name").val());
		
		$.ajax({
			type:"POST",
			url: "course_curd.php",
			data:formdata,
			success: function(data){ //alert(data);
				$("#courseList").html(data);
			},
			cache: false,
			contentType: false,
			processData: false
		});
		
	});
	
});//eof of ready function