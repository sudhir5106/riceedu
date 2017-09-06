// JavaScript Document
$(document).ready(function(){
	$("#edit").click(function(){
		
		pass=$("#pass").val();
		
		
		$.ajax({
		   type: "POST",
		   url: "changepass_curd.php",
		   data:{type:"update",pass:pass},
		   async: false,
		   success: function(data){
			   x=data;
		   }
		});// eof ajax
	
		if(x==1)
		{
			window.location.replace("home.php");
		}
	});// eof edit
});