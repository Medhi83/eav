$(document).ready( function () {
		
	$('#page_up').hide();		

	$("#page_up").click(function() { 
		$('html, body').animate({ scrollTop: 0 }, 'slow');

	});
			
	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('#page_up').show('slow');
		} else {
			$('#page_up').hide('slow');
		}
	});
});
