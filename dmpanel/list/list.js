// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Center Search form validation
	////////////////////////////////////
	$("#findcmFrm").validate({
		rules: 
		{ 
			center_Code:
			{
				required: true,
				InvalidCenterCode:true,
				
			}
			
		},
		messages:
		{
			
		}
	});// eof validation
	
	///////////////////////////////////
	// Student Search form validation
	////////////////////////////////////
	$("#findstudentfrm").validate({
		rules: 
		{ 
			student_code:
			{
				required: true,
				InvalidstudentCode:true,
				
			}
			
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('InvalidCenterCode', function(val, element)
	{		
		$.ajax({
			 url:"list_curd.php",
			 type: "POST",
			 data: {type:"InvalidCenterCode", center_Code: $('#center_Code').val()},
			 async:false,
			 success:function(data){ //alert(data);
			 	
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid Center Code.');

$(document).on('click', '#search', function()
{ 
	flag=$("#findcmFrm").valid();
				
		if (flag==true)
		{
         
            var formdata = new FormData();
			formdata.append('type', "findcmFrm");
			formdata.append('center_Code', $("#center_Code").val());
             $.ajax({
			   type: "POST",
			   url: "list_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
					
					if(data)
					{
						$('#displayInfo').html(data);
					}
					
				},
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax  

		}
});


///////////////////////////////////////////////////
	// Method to check the student data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('InvalidstudentCode', function(val, element)
	{		
		$.ajax({
			 url:"list_curd.php",
			 type: "POST",
			 data: {type:"InvalidstudentCode", student_code: $('#student_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
			 	
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid Student Code.');


$(document).on('click', '#search_student', function()
{ 
	flag=$("#findstudentfrm").valid();
				
		if (flag==true)
		{
         
            var formdata = new FormData();
			formdata.append('type', "findstudentfrm");
			formdata.append('student_code', $("#student_code").val());
             $.ajax({
			   type: "POST",
			   url: "list_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
					
					if(data)
					{
						$('#displayInfo').html(data);
					}
					
				},
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax  

		}
});

///////////////////////////////for  ///////////////////////////

	
});//eof of ready function

