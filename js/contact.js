// JavaScript Document
$(document).ready(function(){
	
	////////////////////////////////////
	// Add contact form validation
	////////////////////////////////////
	$("#contactform").validate({
		rules: 
		{ 
			name: 
			{ 
				required: true,
			},
			emailId: 
			{ 
				email: true,
				required: true,
			},
			msg: 
			{ 
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	////////////////////////////////
	// on click of submit button
	////////////////////////////////
	$("#submit").click(function(){
		
		flag=$("#contactform").valid();
		/*alert("Before Success");
		
		
		if (flag==true)
		{
			//alert("Success");
			var formdata = new FormData();
			formdata.append('type', "enquiry");
			formdata.append('name', $("#name").val());
			formdata.append('emailId', $("#emailId").val());
			formdata.append('countrycode', $("#countrycode").val());
			formdata.append('phone', $("#phone").val());
			formdata.append('msg', $("#msg").val());
			
			var x;
			$.ajax({
				 url:"contact_curd.php",
				 type: "POST",
				 data: formdata,
				 async:false,
				 success: function(data){ alert(data);
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
			if(x==0)
			{
				$("#captchaError").html("The reCAPTCHA wasn't entered correctly. Please try it again.");
			}
		
		}*/
	});// eof #submit click function
		
});