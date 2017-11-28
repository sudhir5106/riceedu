// JavaScript Document
$(document).ready(function(){
	//////////////////////////////////////////
	// on click of approve button
	//////////////////////////////////////////
	$(document).on('click', '.status', function() {
		var student_id = $(this).attr('id');
		
		var formdata = new FormData();
			formdata.append('type', "approval");
			formdata.append('student_id', student_id);

			$.ajax({
			   type: "POST",
			   url: "student_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   if(data==1){
					   window.location.replace("index.php");
				   }
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
	});

	/////////////////////////////////
	//for approve- not approve //

   $(document).on('click', '.approve_status', function() {

		var student_id = $(this).attr('id');
		var formdata = new FormData();
		formdata.append('type', "approve_status");
		formdata.append('student_id', student_id);

			$.ajax({
			   type: "POST",
			   url: "student_curd.php",
			   data:formdata,
			   success: function(data){ //alert(data);
				   if(data==1){
					   window.location.replace("index.php");
				   }
			   },
			   cache: false,
			   contentType: false,
			   processData: false
			});//eof ajax
		
	});


});//eof ready function