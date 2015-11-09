// On document ready:

$(function(){

	// Instantiate MixItUp:
	console.log('works');
	$('#Container').mixItUp();
	$('.main-gallery').flickity({
	  // options
	  cellAlign: 'left',
	  contain: true
	});
});