// XENPLAZA

$(document).ready(function(){
	$(function() {
		$sidebar = $("aside .sidebar")
		var offset = $sidebar.offset();
		var topPadding = 10;
		
		$parent = $sidebar.parent().parent().children('.mainContainer');
		$margin = 0;
		$(window).scroll(function() {
			$range = $parent.height() + parseInt($parent.css('margin-top')) + parseInt($parent.css('padding-top'))+ parseInt($parent.css('padding-bottom')) +$parent.offset().top;
			$safe =  $parent.height() -  $sidebar.height();
			if (($(window).scrollTop() + $sidebar.height() + topPadding) > $range) {
				$("aside .sidebar").stop().animate({
					marginTop: $safe
				});
			}else if ($(window).scrollTop() > offset.top) {
				$margin = $(window).scrollTop() - offset.top + topPadding
				$("aside .sidebar").stop().animate({
					marginTop: $margin
				});
				
			} else {
				$("aside .sidebar").stop().animate({
					marginTop: 0
				});
			};
		});
	});
});
 



