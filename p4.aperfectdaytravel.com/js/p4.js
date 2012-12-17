$(document).ready(function(){
	
	header_slide(4000);
	

});//end doc.onready function

function header_slide(t){
		
		for (i=0; i<4; i++) { 
			$("#head").animate({left:"-=376px"}, 4000); //credit to Head First jquery for parts of this effect
		}
		$("#head").fadeOut("fast").animate({left:"0px"}).fadeIn("fast");
		setTimeout(header_slide(), t);
	}