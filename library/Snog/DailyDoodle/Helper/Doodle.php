<?php
/*============================================================================*\
|| ########################################################################## ||
|| # ---------------------------------------------------------------------- # ||
|| # Copyright © 2014 Jim Dudek AKA Nhawk/Snog                              # ||
|| # Original vBulletin Code by BirdOPrey5 (BOP5)                           # ||
|| # Ported for XenForo use with permission from BirdOPrey5                 # ||
|| # All Rights Reserved.                                                   # ||
|| # This file may not be redistributed in whole or significant part.       # ||
|| # ---------------------------------------------------------------------- # ||
|| ########################################################################## ||
\*============================================================================*/

class Snog_DailyDoodle_Helper_Doodle
{
	public static function helperDoodle()
	{
		if(XenForo_Application::getOptions()->snog_daily_doodle_array)
		{
			$visitor = XenForo_Visitor::getInstance()->toArray();
			$style = $visitor['style_id'];
			if($style == 0) $style = 1;
			$skip_styles = explode(",",XenForo_Application::getOptions()->snog_daily_doodle_styles);

			if(!in_array($style,$skip_styles))
			{	
				$newlogo = array();
				$logoarray = explode ("\n", XenForo_Application::getOptions()->snog_daily_doodle_array);

				//Clean empty lines
				$logoarray = array_filter($logoarray);
				$logoarray = array_values($logoarray);

				if (XenForo_Application::getOptions()->snog_daily_doodle_time == 1) // = guest timezone
				{
					date_default_timezone_set(XenForo_Application::getOptions()->guestTimeZone);
				}else{  // = user timezone
					date_default_timezone_set($visitor['timezone']);
				}

				$longdoodledate  = date('Y-m-d'); 
				$shortdoodledate = date('m-d');
				$thisyear = date('Y');

				foreach ($logoarray AS $tlogo)
				{
					$thislogo = explode ("|", $tlogo);
					$thislogo[0] = trim ($thislogo[0]);

					// CHECK IF OCCURRENCE
					if(version_compare(PHP_VERSION, '5.3') >= 0 && !stristr($thislogo['0'],'-'))
					{
						$tempdate = date('m-d', strtotime($thislogo['0'] . ' ' . $thisyear));
						$thislogo['0'] = $tempdate;
					}

					$thislogo[1] = trim ($thislogo[1]);
					if (isset($thislogo[2])) $thislogo[2] = trim ($thislogo[2]);
					if (isset($thislogo[3])) $thislogo[3] = trim ($thislogo[3]);

					if($thislogo[0] == $shortdoodledate OR $thislogo[0] == $longdoodledate)
					{
						$newlogo['image'] = $thislogo[1];
						if (isset($thislogo[2]) AND $thislogo[2] != '') $newlogo['holiday'] = $thislogo[2];
						if (isset($thislogo[3])) $newlogo['link'] = $thislogo[3];
					}
				}
			}
		}

		if(isset($newlogo))
		{
			return $newlogo;
		}else{
			return FALSE;
		}
	}
}