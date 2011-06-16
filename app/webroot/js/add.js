$(document).ready(function() {
	var message = 'Enter your URL here';
	$('#UrlOriginal').attr('value', message);
	$('.submit').attr('value', 'Shorten');
	$('#UrlOriginal').focus(function() {
		if($(this).val() == message) {
			$(this).attr('value', '');
		}
	});

	$('#UrlOriginal').blur(function() {
		if($(this).val() == '') {
			$(this).attr('value', message);
		}
	});
});