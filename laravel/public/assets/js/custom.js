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

	$( ".lsthead li" ).click(function() {
		 var myClass = $(this).attr("class");
 			  window.location = myClass;
		});

	$(function() {
						  enable_cb();
						  $("#chck").click(enable_cb);
						});

						function enable_cb() {
						  if (this.checked) {
						  	 $("#lvl").attr("disabled", true);
						   
						  } else {
						    $("#lvl").removeAttr("disabled");
						  }
						}

						$( "#colapsethre" ).click(function() {
  					$('#collapseThree').collapse('show');
});
	
});



