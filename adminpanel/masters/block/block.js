// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Block Form Validation
	////////////////////////////////////
	$("#insertBlock").validate({
		rules: 
		{ 
			state: 
			{ 
				required: true,
			},
			district: 
			{ 
				required: true,
			},
			blockName:
			{
				required: true,
				BlockExist:true
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////
	// Edit Jobroll form validation
	////////////////////////////////////
	$("#editBlock").validate({
		rules: 
		{ 
			state: 
			{ 
				required: true,
			},
			district: 
			{ 
				required: true,
			},
			blockName:
			{
				required: true,
				BlockEditExist:true
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
			state: 
			{ 
				required: true,
			},
			district: 
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
	$.validator.addMethod('BlockExist', function(val, element)
	{		
		$.ajax({
			 url:"block_curd.php",
			 type: "POST",
			 data: {type:"BlockExist",district:$("#district").val(), blockName:$("#blockName").val()},
			 async:false,
			 success:function(data){//alert(data);
				 isSuccess=(data==1)?true:false;
			 }
		});//eof ajax
		return isSuccess ;				
	}, 'Block Already Exist.');
	
	
	///////////////////////////////////////////////////
	// Method to check is the data already exist or not
	///////////////////////////////////////////////////
	$.validator.addMethod('BlockEditExist', function(val, element)
	{		
		$.ajax({
			 url:"block_curd.php",
			 type: "POST",
			 data: {type:"BlockEditExist", blockId:$("#blockId").val(), blockName:$("#blockName").val(), district:$("#district").val()},
			 async:false,
			 success:function(data){//alert(data);
				 isSuccess=(data==1)?true:false;
			 }
		});//eof ajax
		return isSuccess ;				
	}, 'Block Already Exist.');
	
	
	//////////////////////////////////
	// Get all district state wise
	//////////////////////////////////
	$(document).on("change","#state", function(){
		
		var formdata = new FormData();
			formdata.append('type', "getDistricts");
			formdata.append('state', $("#state").val());
			
		$.ajax({
			type:"POST",
			url :"block_curd.php",
			data:formdata,
			success: function(data){ //alert(data);
				$("#districtDiv").html(data);
			},
			cache: false,
		    contentType: false,
		    processData: false
		});//eof ajax
		
	});
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$(document).on("click","#submit", function(){
		
		flag=$("#insertBlock").valid();
		
		if (flag==true)
		{			
			var formdata = new FormData();
			formdata.append('type', "addBlock");
			formdata.append('blockName', $("#blockName").val());
			formdata.append('district', $("#district").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "block_curd.php",
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
	$(document).on("click","#edit", function(){
		
		flag=$("#editBlock").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			formdata.append('type', "editBlock");
			formdata.append('blockId', $("#blockId").val());
			formdata.append('blockName', $("#blockName").val());
			formdata.append('district', $("#district").val());
	  
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "block_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   x=data;
				   if(x==0)
					{
						window.location.replace("block-list.php");				
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
	$(document).on("click",".delete", function(){
		
		var didConfirm = confirm("Are you sure?");
	    if (didConfirm == true) {
			var block_id=$(this).attr("id");
			
			$.ajax({
				url:"block_curd.php",
				type: "POST",
				data: {type:"delete",block_id:block_id},
				success: function(data){ //alert(data);
					location.reload();
				}
			});//eof ajax
			
	    }
	});
	
	
	//////////////////////////////////
	// on click of block search button
	//////////////////////////////////
	$(document).on("click","#search", function(){
		
		var formdata = new FormData();
		formdata.append('type', "searchByDistrict");
		formdata.append('district', $("#district").val());
		
		$.ajax({
			type:"POST",
			url: "block_curd.php",
			data:formdata,
			async: false,
			success: function(data){ //alert(data);
				$("#blockList").html(data);
			},
			cache: false,
			contentType: false,
			processData: false
		});
		
	});
	
});//eof of ready function