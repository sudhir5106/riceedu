// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add Jobroll form validation
	////////////////////////////////////
	$("#insertDistrict").validate({
		rules: 
		{ 
			state: 
			{ 
				required: true,
			},
			district_name: 
			{ 
				required: true,
				DistrictExist:true,
			}
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////
	// Edit Jobroll form validation
	////////////////////////////////////
	$("#editDistrict").validate({
		rules: 
		{ 
			state: 
			{ 
				required: true,
			},
			district_name: 
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
	$.validator.addMethod('DistrictExist', function(val, element)
	{
		district_name=$("#district_name").val();

		$.ajax({
				 url:"district_name_curd.php",
				 type: "POST",
				 data: {type:"validate",district_name:district_name},
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
	}, 'District Name already exist.');
	
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$('#submit').click(function(){
		
		flag=$("#insertDistrict").valid();
		
		if (flag==true)
		{			
			var formdata = new FormData();
			formdata.append('type', "addDistrict");
			formdata.append('state', $("#state").val());
			formdata.append('district_name', $("#district_name").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "district_name_curd.php",
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
	// on change of state search button
	//////////////////////////////////
	$("#searchStateId").change(function(){
		
		//alert("working");
		
		var formdata = new FormData();
		formdata.append('type', "searchByState");
		formdata.append('stateId', $("#searchStateId").val());
		
		$.ajax({
			type:"POST",
			url: "district_name_curd.php",
			data:formdata,
			async: false,
			success: function(data){ //alert(data);
				$("#districtList").html(data);
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
		
		flag=$("#editDistrict").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			formdata.append('type', "editDistrict");
			
			formdata.append('state', $("#state").val());
			formdata.append('district_id', $("#district_id").val());
			formdata.append('district_name', $("#district_name").val());
			
	  
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "district_name_curd.php",
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
			var district_id=$(this).attr("id");
			
			$.ajax({
				url:"district_name_curd.php",
				type: "POST",
				data: {type:"delete",district_id:district_id},
				async:false,
				success: function(data){ //alert(data);
				}
			});
			location.reload();
	    }
	});
	
});//eof of ready function