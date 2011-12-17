$(document).ready(function(){
	$("a.postthumb").hover(function() {
		// make sure that ALL thumbs become visible
		$(document).find("a.postthumb").find(".postimage").removeClass("hidden");
		// then hide only the desired one
		$(this).find(".postimage").addClass("hidden");		
	}, function(){
		$(this).find(".postimage").removeClass("hidden");
	});
});