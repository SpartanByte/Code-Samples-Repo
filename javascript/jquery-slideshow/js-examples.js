// jQuery Image Slideshow
$("#slideshow > div:first").hide();

setInterval(function(){

	$('#slideshow > div:first')
		.fadeOut(2000)
		.next()
		.fadeIn(2000)
		.end()
		.appendTo('#slideshow');
		
}, 4000);
	
/* centering the images with extra WxH for the text below the images */
jQuery.fn.setDivSize = function(extraHeight, extraWidth){
	var img = new Image();
	img.src = this.children('img').attr('src');
	
	this.height(img.height + extraHeight)
		.width (img.width + extraHeight);
	return this;
}
