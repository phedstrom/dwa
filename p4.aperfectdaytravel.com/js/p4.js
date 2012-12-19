$(document).ready(function(){

	/*--this code adapted from jQuery Cookbook - O'Reilly - 2010 --*/
	$('form').submit(function(event){

    var isErrorFree = true;

    // iterate through required form elements and check to see if they are valid
    $('input.required, select.required, textarea.required',this).each(function(){
        if ( validateElement.isValid(this) == false ){
            isErrorFree = false;
        };
    });

    return isErrorFree;

	}); // close .submit()

	var validateElement = {

		isValid:function(element){

			var isValid = true;
			var $element = $(element);
			var id = $element.attr('id');
			var name = $element.attr('name');
			var value = $element.val();

			// <input> uses type attribute as written in tag
			var type = $element[0].type.toLowerCase();

			switch(type){
				case 'text':
				case 'textarea':
				case 'password':
					if ( value.length == 0 || 
						value.replace(/\s/g,'').length == 0 ){ isValid = false; }
					break;
				case 'select-one':
					if( !value ){ isValid = false; }
					break;
				case 'radio':
					if( $('input[name="' + name + '"]:checked').length == 0 ){ isValid = false; };
					break;

			} // close switch()

			// instead of $(selector).method this is using $(selector)[method]
			var method = isValid ? 'removeClass' : 'addClass';

			// show error message [addClass]
			// hide error message [removeClass]
			$('#errorMessage_' + name)[method]('showErrorMessage');
			$('label[for="' + id + '"]')[method]('error');

			return isValid;

		} // close validateElement.isValid()
	}; // close validateElement object
		
	/*--------------------------------------------------------*/
	
	//jQueryUI
    $( "#tabs" ).tabs();
	
	//my very own function!
	header_slide(6000);
	

});//end doc.onready function

function header_slide(t){
		
		for (i=0; i<4; i++) { 
			$("#head").animate({left:"-=376px"}, 4000); //credit to Head First jquery for the box model of this effect
		}
		$("#head").fadeOut("fast").animate({left:"0px"}).fadeIn("fast");
		setTimeout(header_slide(), t);
	}
