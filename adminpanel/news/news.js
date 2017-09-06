// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Jobroll form validation
	////////////////////////////////////
	$("#insertNews").validate({
		rules: 
		{ 
			news: 
			{ 
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////
	// Edit Jobroll form validation
	////////////////////////////////////
	$("#editNews").validate({
		rules: 
		{ 
			news: 
			{ 
				required: true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
		
		//alert("success");
		
		flag=$("#insertNews").valid();
		
		if (flag==true)
		{			
			var formdata = new FormData();
			formdata.append('type', "addNews");
			formdata.append('news', $("#news").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "news_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
			if(x==1)
			{
				window.location.replace("index.php");
			}
		}// eof if condition
		
	});
	
	
	//////////////////////////////////
	// on click of update button
	//////////////////////////////////
	$("#edit").click(function(){
		
		flag=$("#editNews").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			formdata.append('type', "editNews");
			formdata.append('newsId', $("#Newsid").val())
			formdata.append('newsContent', $("#news").val());
			
	  
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "news_curd.php",
			   data:formdata,
			   async: false,
			   success: function(data){ //alert(data);
				   x=data;
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});
			
			if(x==0)
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
			var news_id=$(this).attr("id");
			
			$.ajax({
				url:"news_curd.php",
				type: "POST",
				data: {type:"delete",news_id:news_id},
				async:false,
				success: function(data){ //alert(data);
				}
			});
			location.reload();
	    }
	});
	
});//eof of ready function