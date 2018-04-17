// Javascript updated 4/17/2018 
$(function() {
  $('#slideshow').cycle({fx: 'fade'});
  setupButtons();
});

var setupButtons = function(){
var slideShow = $('#slideshow');
var pause = $('<span id="pause" class="control-bar"><i class="fa fa-pause control"></i><span class="control-label">Pause Slideshow</span></span>');
var resume = $('<span id="resume" class="control-bar" style="display:block;"><i class="fa fa-play control"></i><span class="control-label">Resume Slideshow</span></span>');

  pause.click(function() { 
   slideShow.cycle('pause');
    toggleControls();
  }).insertAfter(slideShow);
  
  resume.click(function() { 
    slideShow.cycle('resume'); 
    toggleControls();
  }).insertAfter(slideShow);

  resume.toggle();
};

var toggleControls = function(){
	$('#pause').toggle();
	$('#resume').toggle();
};

