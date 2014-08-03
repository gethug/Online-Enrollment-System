$(document).ready(function(){

	$("#rad3").keydown(function(){
		  $("#rad3").css("background-color","white");
		  $("#rad3").css("border","1px solid #ccc");
		  $("#error2").hide();
	});

	$("#rad4").keydown(function(){
		  $("#rad4").css("background-color","white");
		  $("#rad4").css("border","1px solid #ccc");
		  $("#error3").hide();
	});

	$(".lsthead li a").click(function(e){
		$(".lsthead li a").removeClass("active1");
		 $( e.target ).addClass("active1" );
	});

 	
});

