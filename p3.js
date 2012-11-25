$(document).ready(function() { // start doc ready; do not delete this!
	
		$('.box').css('background-color', 'white');
		
		var currentMeasure = $('#allinches').text();
		
		$("#calc").click(function() {
			var value = $("#feet").val()*12;                                   
			var value2 = $("#inches").val();                                   
			var newValue = Math.round(value) + Math.round(value2);                                   
        
			$('#allinches').text(newValue);
		
			var cms = Math.round(newValue * 2.54)
			
			$('#centimeters').text(cms);
			$('#quarter').text((cms*1)/.25);
			$('#half').text((cms*1)/.5);
			$('#twenty').text((cms*1)/20);
			$('#fifty').text((cms*1)/50);
		
		});
		
}); // end doc ready; do not delete this!