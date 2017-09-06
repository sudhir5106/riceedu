// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Document form validation
	////////////////////////////////////
	$("#insertDoc").validate({
		rules: 
		{ 
			doc_name:
			{
				required: true,
			},
			fileupload:
			{
				required: true,
			},
			
		},
		messages:
		{
			
		}
	});// eof validation
	
	///////////////////////////////////
	// Edit Document form validation
	////////////////////////////////////
	$("#editDoc").validate({
		rules: 
		{ 
			doc_name:
			{
				required: true,
			},
			
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
		
		flag=$("#insertDoc").valid();
		
		if (flag==true)
		{		
		
			var formdata = new FormData();
			formdata.append('type', "addDoc");
			
			formdata.append('doc_name', $("#doc_name").val());
			formdata.append('file', $('input[id=fileupload]')[0].files[0]);
			
			$.ajax({
			   type: "POST",
			   url: "document_curd.php",
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
		
		
		flag=$("#editDoc").valid();
		
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
			formdata.append('type', "editDoc");
			formdata.append('doc_id', $("#doc_id").val());
			formdata.append('doc_name', $("#doc_name").val());
			
			formdata.append('doc_image', image);
			formdata.append('imageval', imageval);
			formdata.append('doc-img', $('#doc-img').val());
			
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "document_curd.php",
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
			var id=$(this).attr("id");
			
			$.ajax({
				url:"document_curd.php",
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