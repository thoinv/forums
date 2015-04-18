<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!-- SolidMean_floating_login -->
	';
if (!$visitor['user_id'])
{
$__output .= '
		$(function() {
   	 	$(window).scroll(function(){
       	 	($(window).scrollTop() > 20) ?
           		$(\'#loginBarHandle\').stop().animate({\'opacity\':\'0.7\'},400).css({\'position\':\'fixed\',\'top\':\'0px\',\'z-index\':\'60\',\'height\':\'20px\', \'right\' : \'30px\'}):
            		$(\'#loginBarHandle\').stop().animate({\'opacity\':\'1\'},400).css({\'position\':\'absolute\',\'top\':\'\',\'height\':\'20px\', \'right\' : \'0px\'});
   	 	});
 
		$(\'#loginBarHandle\').hover(
        		 function(){ if ($(window).scrollTop() > 20) $(this).stop().animate({\'opacity\':\'1\'},400);},
         		function(){ if ($(window).scrollTop() > 20) $(this).stop().animate({\'opacity\':\'0.7\'},400);}
     		);
 
		});
	';
}
$__output .= '
<!-- /SolidMean_floating_login -->';
