
var setScrollPosition = function(seconds, expiredays) {

	if (typeof seconds === 'undefined') seconds = 1;
	if (typeof expiredays === 'undefined') expiredays = 1;
	
	var position = jQuery.cookie('positionScroll');
	if (this.scrollY == position) return;
	position = this.scrollY;
	jQuery.cookie('positionScroll',position,{expires: expiredays});
};

function getScrollPosition(){
	
	var position = jQuery.cookie('positionScroll');
	if (typeof position === 'undefined') {
		position = 0;
	}
	console.log(position)
	window.scrollBy(0,position);
	document.cookie = 'positionScroll=; Max-Age=-99999999;';  
};

window.onload = getScrollPosition;