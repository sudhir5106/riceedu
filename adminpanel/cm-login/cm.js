// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Add RM Login form validation
	////////////////////////////////////
	$("#insertCm").validate({
		rules: 
		{ 
			centercode:
			{
				required: true,
				centerCodeCheck:true
			},
			d_emp_code: 
			{ 
				required: true,
				dempCodeValid:true,
				dmloginCheck:true
			},
			c_emp_code: 
			{ 
				required: true,
				cempCodeValid:true,
				cmAdded:true
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
			imageupload:
			{
				required: true,
				
			},
			contact_no:
			{
				required: true,
				
			},
			
			email:
			{
				required: true,
				
			},
			password:
			{
				required: true,
			},
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////
	// Edit RM Login form validation
	////////////////////////////////////
	$("#editCm").validate({
		rules: 
		{ 
			centercode:
			{
				required: true,
				EditCenterCodeCheck:true
			},
			d_emp_code: 
			{ 
				required: true,
				dempCodeValid:true,
				dmloginCheck:true
			},
			c_emp_code: 
			{ 
				required: true,
				cempCodeValid:true,
				cmAddedEdit:true
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
			password:
			{
				required: true,
			},

			contact_no:
			{
				required: true,
				
			},
			
			email:
			{
				required: true,
				
			},
		},
		messages:
		{
			
		}
	});// eof validation
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('dempCodeValid', function(val, element)
	{		
		$.ajax({
			 url:"cm_curd.php",
			 type: "POST",
			 data: {type:"dempCodeValid", emp_code: $('#d_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid DM Employee Code.');
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('dmloginCheck', function(val, element)
	{		
		$.ajax({
			 url:"cm_curd.php",
			 type: "POST",
			 data: {type:"dmloginCheck", emp_code: $('#d_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'DM Lgoin Not Created.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('centerCodeCheck', function(val, element)
	{		
		$.ajax({
			 url:"cm_curd.php",
			 type: "POST",
			 data: {type:"centerCodeCheck", centercode: $('#centercode').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Center Code Already Exist.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('EditCenterCodeCheck', function(val, element)
	{		
		$.ajax({
			 url:"cm_curd.php",
			 type: "POST",
			 data: {type:"EditCenterCodeCheck", centercode: $('#centercode').val(), cmid:$("#cmid").val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Center Code Already Exist.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('cempCodeValid', function(val, element)
	{		
		$.ajax({
			 url:"cm_curd.php",
			 type: "POST",
			 data: {type:"cempCodeValid", emp_code: $('#c_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid CM Employee Code.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is Exis or not
	///////////////////////////////////////////////////
	$.validator.addMethod('cmAdded', function(val, element)
	{		
		$.ajax({
			 url:"cm_curd.php",
			 type: "POST",
			 data: {type:"cmAdded", emp_code: $('#c_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'CM Employee Code Already Added.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is Exis or not
	///////////////////////////////////////////////////
	$.validator.addMethod('cmAddedEdit', function(val, element)
	{		
		$.ajax({
			 url:"cm_curd.php",
			 type: "POST",
			 data: {type:"cmAddedEdit", cmid:$("#cmid").val(), emp_code: $('#c_emp_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'CM Employee Code Already Added.');
	
	
	//////////////////////////////////////////
	// on change of state drop down
	//////////////////////////////////////////
	$(document).on('change', '#state', function() {
					
			var formdata = new FormData();
			formdata.append('type', "getDistrict");
			formdata.append('stateId', $("#state").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "cm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
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
	$(document).on('change', '#district', function() {
					
			var formdata = new FormData();
			formdata.append('type', "getBlocks");
			formdata.append('districtId', $("#district").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "cm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   $('#block').html(data);
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
	});
	
	//////////////////////////////////////////
	// on keyup of d_emp_code text field
	//////////////////////////////////////////
	$(document).on('keyup', '#d_emp_code', function() {
		var formdata = new FormData();
			formdata.append('type', "getEmpName");
			formdata.append('emp_code', $("#d_emp_code").val());

			$.ajax({
			   type: "POST",
			   url: "cm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   if(data!=""){
					   $("#dempNameBlk").show();
					   $("#dEmpName").html(data);
				   }
				   else{
					   $("#dempNameBlk").hide();
					   $("#dEmpName").html("");
				   }
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
	});
	
	
	//////////////////////////////////////////
	// on keyup of r_emp_code text field
	//////////////////////////////////////////
	$(document).on('keyup', '#c_emp_code', function() {
		var formdata = new FormData();
			formdata.append('type', "getEmpName");
			formdata.append('emp_code', $("#c_emp_code").val());

			$.ajax({
			   type: "POST",
			   url: "cm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   if(data!=""){
					   $("#cempNameBlk").show();
					   $("#cEmpName").html(data);
				   }
				   else{
					   $("#cempNameBlk").hide();
					   $("#cEmpName").html("");
				   }
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
	});
	
	//////////////////////////////////////////
	// on click of Block or Unblock button
	//////////////////////////////////////////
	$(document).on('click', '.status', function() {
		
		var cmid = $(this).attr("id");
		
		var formdata = new FormData();
			formdata.append('type', "changeStatus");
			formdata.append('cmid', cmid);
			
			$.ajax({
			   type: "POST",
			   url: "cm_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   window.location.replace("index.php");
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
	});
	
	//////////////////////////////////
	// on click of submit button
	//////////////////////////////////
	$(document).on('click', '#submit', function() {
		
		flag=$("#insertCm").valid();
		
		if (flag==true)
		{	var formdata = new FormData();	
		    var totalFiles = document.getElementById("imageupload").files.length;
			if(totalFiles<1)
			{
				$('#errmsg').show();
				$('#errmsg').append("image is required");;
				return false;
			}
			for (var i = 0; i < totalFiles; i++) {
				var file = document.getElementById("imageupload").files[i];
				formdata.append("imageupload[]", file);  //Use [] to add multiple.
			}
			formdata.append('type', "addCmLogin");
			formdata.append('centercode', $("#centercode").val());
			formdata.append('d_emp_code', $("#d_emp_code").val());
			formdata.append('c_emp_code', $("#c_emp_code").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('contact_no', $("#contact_no").val());
			formdata.append('email', $("#email").val());
			formdata.append('imageupload', $("#imageupload").val());
			formdata.append('password', $("#password").val());
			
			var x;
			$.ajax({
			   type: "POST",
			   url: "cm_curd.php",
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
	// on click of Update button
	//////////////////////////////////
	$(document).on('click', '#edit', function() {
		
		flag=$("#editCm").valid();
		
		if (flag==true)
		{

             
			 var formdata = new FormData();
			 var totalFiles = document.getElementById("imageupload").files.length;
			
			for (var i = 0; i < totalFiles; i++) {
				var file = document.getElementById("imageupload").files[i];
				formdata.append("imageupload[]", file);  //Use [] to add multiple.
			}

			formdata.append('type', "editCmLogin");
			formdata.append('cmid', $("#cmid").val());
			formdata.append('centercode', $("#centercode").val());
			formdata.append('d_emp_code', $("#d_emp_code").val());
			formdata.append('c_emp_code', $("#c_emp_code").val());
			formdata.append('state', $("#state").val());
			formdata.append('district', $("#district").val());
			formdata.append('block', $("#block").val());				
			formdata.append('address', $("#address").val());
			formdata.append('password', $("#password").val());
			formdata.append('contact_no', $("#contact_no").val());
			formdata.append('email', $("#email").val());
			
			 var x;
			 $.ajax({
			   type: "POST",
			   url: "cm_curd.php",
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
			});
			
			
		}//eof if condition
	});
	
	//////////////////////////////////
	// on click of delete button
	//////////////////////////////////
	$(".delete").click(function(){
		
		var didConfirm = confirm("Are you sure?");
	    if (didConfirm == true) {
			var cmid=$(this).attr("id");
			
			$.ajax({
				url:"cm_curd.php",
				type: "POST",
				data: {type:"delete",cmid:cmid},
				async:false,
				success: function(data){ 
				}
			});
			location.reload();
	    }
	});
	

 $(document).on('click',".deletegallery",function()
   {    var i=0;
   	    var count=0;

               $('.deletegallery').each(function()
               {

                          if($(this).prop('checked') == true)		 
		                   { 
		                     i++;
				            }
				            
				            count++;

                   });
                           if(i==count)
				            {
				            	$('#selecctallgallery').prop('checked',true);	
				            }
				            else
				            {
				            	 $('#selecctallgallery').prop('checked',false);
				            }
	});       
		      


   $(document).on('click',"#deletegalleryimage",function()
   {   
   	   var i=0;
			 var delete_id = [];	
		     $('.deletegallery').each(function(){
	       
		      if($(this).prop('checked') == true)		 
		      {
				  delete_id.push($(this).attr("id"));
				  
				  i++;
		      }
	     });


	      if(i==0){
			
			alert("Please Select Any One Option"); 
			 
			 }
			 if(i!=0){
			
			        var didConfirm = confirm("Are you sure?");
				 if(didConfirm==true)
				 {
				// alert(delete_id);
				//$("#loding").show();
		
				
			$.ajax({
				url:"cm_curd.php",
				type: "POST",
				data: {type:"deletegallerymultiimg",id:delete_id},
				//async:false,
				success: function(data){  //alert(data);
				location.reload();
				}
			});
			
	    }
                    		 
			          }

   });

$(document).on('click',"#selecctallgallery",function()
{
	 
	
	if($('#selecctallgallery').prop('checked') == true)		 
		      {  
				   $('.deletegallery').each(function(){
	                     $(this).prop('checked',true);		      
	                                         });
		      }	
		      else
		      {
		      	 $('.deletegallery').each(function(){
	                     $(this).prop('checked',false);		      
	                                         });

		      }
   



});

});//eof of ready function