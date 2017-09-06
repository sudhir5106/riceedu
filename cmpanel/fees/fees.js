// JavaScript Document
$(document).ready(function(){
	
	///////////////////////////////////
	// Student Search form validation
	////////////////////////////////////
	$("#findstudentFrm").validate({
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
	
	
	///////////////////////////////////
	// Payment form validation
	////////////////////////////////////
	$("#payentFrm").validate({
		rules: 
		{ 
			amount:
			{
				required: true,
				number:true,
				checkamt:true,	
				iszero:true,			
			},
			cDDNo:
			{
				required: true,
			},
			bank:
			{
				required: true,
			},
			transactionNo:
			{
				required: true,
			}
		},
		messages:
		{
			amount:
			{
				number:"Please Enter Only Numbers."
			}
		}
	});// eof validation
	
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('InvalidStudentCode', function(val, element)
	{		
		$.ajax({
			 url:"fees_curd.php",
			 type: "POST",
			 data: {type:"InvalidStudentCode", student_code: $('#student_code').val()},
			 async:false,
			 success:function(data){ //alert(data);
				 isSuccess=(data==1)?true:false;
			 }
			 
		});//eof ajax
		return isSuccess ;				
	}, 'Invalid Student Code.');
	
	///////////////////////////////////////////////////
	// Method to check the data is valid or not
	///////////////////////////////////////////////////
	$.validator.addMethod('checkamt', function(val, element)
	{		
		
		var balance = $("#balance").val();
		var amount = $("#amount").val();
		
		if(parseInt(balance) < parseInt(amount)){			
			isSuccess=false;		
		}
		else{ isSuccess=true; }
		
		return isSuccess ;
	}, 'The Entered Amount is greater than Balance Fees.');
	
	
	///////////////////////////////////////////////////
	// Method to check the data is greater than 0 or not
	///////////////////////////////////////////////////
	$.validator.addMethod('iszero', function(val, element)
	{		
		
		var amount = $("#amount").val();
		
		if(parseInt(amount)<=0){			
			isSuccess=false;		
		}
		else{ isSuccess=true; }
		
		return isSuccess ;
	}, 'Please Enter The Correct Amount.');
	
	
	$(document).on('click', '#pay', function() { //alert("hello");
	
		flag=$("#payentFrm").valid();
				
		if (flag==true)
		{
			var paymentmode= $("input[name='paymentmode']:checked").val();
			
			var formdata = new FormData();
			formdata.append('type', "feespayment");
			formdata.append('studentid', $("#studentid").val());
			formdata.append('amount', $("#amount").val());
			formdata.append('paymentmode', paymentmode);
			formdata.append('cDDNo', $("#cDDNo").val());
			formdata.append('bank', $("#bank").val());
			formdata.append('transactionNo', $("#transactionNo").val());
	
			
			$.ajax({
			   type: "POST",
			   url: "fees_curd.php",
			   data:formdata,
			   success: function(data){ alert(data);
					
					if(data==1)
					{
						window.location.replace("index.php");
					}
					
				},
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		}
	});
	
	//////////////////////////////////////////
	// on keyup of student_code
	//////////////////////////////////////////
	$("#displayInfo").hide();
	
	$(document).on('click', '#search', function() {
		
		flag=$("#findstudentFrm").valid();
		
		if (flag==true)
		{
			var formdata = new FormData();
			formdata.append('type', "getStudentInfo");
			formdata.append('student_code', $("#student_code").val());
	
			var x;
			$.ajax({
			   type: "POST",
			   url: "fees_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
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
	
	$(document).on('click', "input[name='paymentmode']", function() {
	
		var paymentMode = $(this).val();
		
		if(paymentMode == 2){
			$("#chDdNo").show();
			$("#neftinfo").hide();
		}
		else if(paymentMode == 3){
			$("#chDdNo").hide();
			$("#neftinfo").show();
		}
		else{
			$("#chDdNo").hide();
			$("#neftinfo").hide();
		}
	
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