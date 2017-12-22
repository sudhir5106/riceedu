// JavaScript Document
$(document).ready(function(){
	

		//////////////////////////////////
	// on click of approved button
	//////////////////////////////////
	$(".approved").click(function(){
		
		var didConfirm = confirm("Are you sure?");
	    if (didConfirm == true) {
			var sent_id=$(this).attr("id");
			
			$.ajax({
				url:"curd.php",
				type: "POST",
				data: {type:"approved",sent_id:sent_id},
				async:false,
				success: function(data){  //alert(data);
					if(data)
					{
						window.location.href="index.php";
					}
				}
			});
		//	location.reload();
	    }
	});
	
});//eof of ready function