<?php
class Sedo_DetectBrowser_Helper_Tools
{

	/******
		This function is not used anymore but keep it to compare
	***/

	public static function IsMobile($useragent)
	{
		/*
			Detection method created by Gitlez 
			See here: http://www.000webhost.com/forum/scripts-code-snippets/27404-php-extremely-simple-way-check-if-mobile-browser.html
			
			Based on Regex from http://detectmobilebrowsers.com
			Regex updated: 3 July 2012
		*/

		if(strpos($useragent, 'mobile') !== false || strpos($useragent, 'android') !== false)
		{
			return true;
		}
		if(preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|meego.+mobile|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/',$useragent))
		{
			return true;
		}
		else if(preg_match('/(bolt\/[0-9]{1}\.[0-9]{3})|nexian(\s|\-)?nx|(e|k)touch|micromax|obigo|kddi\-|;foma;|netfront/',$useragent))
		{
			return true;
		}
		else if(preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/',substr($useragent,0,4)))
		{
			return true;
		}
		
		return false;
	}

	/******
		#isBadIE

		If no option => return true from IE1 to IE8
		#option: all => return true for all IE
		#target + RANGE; ex: isBadIE('target', '6-7') => return true if match the target
	***/

	public static function isBadIE($method = false, $range = false)
	{
		if(!isset($_SERVER['HTTP_USER_AGENT']))
		{
			return false;
		}
		
		$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$output = false;

		if(preg_match('/msie/', $useragent))
       		{
			if($method == 'all')
			{
	       			$output = true;
	       		}
	       		elseif($method == 'target')
	       		{
	       			$first = $range[0];
	       			$last = substr($range, -1);
	       			$first_fix = $first - 4;
	       			$last_fix = $last - 4;
	       			
	       			if($first > 7 AND $last > 7)
	       			{
		       			if(preg_match('/trident\/[' . $first_fix  . '-' . $last_fix  . ']/', $useragent))
       					{
      						$output = true;
	       				}	       			
	       			}
	       			elseif($first < 8 AND $last > 7)
	       			{
		       			if(preg_match('/trident\/[4-' . $last_fix  . ']/', $useragent) OR preg_match('/(?i)msie [' . $first . '-7]/', $useragent))
       					{
      						$output = true;
	       				}	       			
	       			}
	       			elseif($last < 8)
	       			{
		       			if(preg_match('/msie [' . $first . '-' . $last . ']/', $useragent))
       					{
      						$output = true;
	       				}	       			
	       			}
	       		}
	       		else
	       		{
	       			if(preg_match('/trident\/4/', $useragent) OR preg_match('/msie [1-7]/', $useragent))
       				{
       					//IE1 to IE8 width default option
      					$output = true;
	       			}
	       		}
       		}
       		elseif(strpos($useragent, 'like gecko') !== false && preg_match('#trident/(\d{1,2})\.(\d{1,2})#', $useragent, $match))
       		{
	       		//IE11
	       		if(intval($match[1]) == 7)
	       		{
	       			if($method == 'all' || ($method == 'target' && strpos($range, '11') !== false) )
				{
	       				$output = true;
	       			}
	       		}
       		}

       		return $output;
	}	
}