<?php
class XenTrCom_TodayBirthday_Model_SetDate{
    public static function getSetDate() {
		$visitor = XenForo_Visitor::getInstance();
		$visitorDate = $visitor['timezone'];
		
		switch($visitorDate){
			case 'Pacific/Midway':
				$setDate = -11; break;
			case 'Pacific/Honolulu';
				$setDate = -10; break;
			case 'Pacific/Marquesas':
				$setDate = -9.5; break;
			case 'America/Anchorage':
				$setDate = -9; break;
			case 'America/Los_Angeles':
				$setDate = -8; break;
			case 'America/Tijuana' :
				$setDate = -8; break;
			case 'America/Denver':
				$setDate = -7; break;
			case 'America/Chihuahua':
				$setDate = -7; break;
			case 'America/Phoenix':
				$setDate = -7; break;
			case 'America/Chicago':
				$setDate = -6; break;
			case 'America/Belize':
				$setDate = -6; break;
			case 'America/Mexico_City':
				$setDate = -6; break;
			case 'America/New_York':
				$setDate = -5; break;
			case 'America/Havana':
				$setDate = -5; break;
			case 'America/Bogota':
				$setDate = -5; break;
			case 'America/Caracas':
				$setDate = -4.5; break;
			case 'America/Halifax':
				$setDate = -4; break;
			case 'America/Goose_Bay':
				$setDate = -4; break;
			case 'America/Asuncion':
				$setDate = -4; break;
			case 'America/Santiago':
				$setDate = -4; break;
			case 'America/Cuiaba':
				$setDate = -4; break;
			case 'America/La_Paz':
				$setDate = -4; break;
			case 'Atlantic/Stanley':
				$setDate = -4; break;
			case 'America/Argentina/San_Luis':
				$setDate = -4; break;
			case 'America/St_Johns':
				$setDate = -3.5; break;
			case 'America/Argentina/Buenos_Aires':
				$setDate = -3; break;
			case 'America/Argentina/Mendoza':
				$setDate = -3; break;
			case 'America/Godthab':
				$setDate = -3; break;
			case 'America/Montevideo':
				$setDate = -3; break;
			case 'America/Sao_Paulo':
				$setDate = -3; break;
			case 'America/Miquelon':
				$setDate = -3; break;
			case 'America/Noronha':
				$setDate = -2; break;
			case 'Atlantic/Cape_Verde':
				$setDate = -1; break;
			case 'Atlantic/Azores':
				$setDate = -1; break;
			case 'Europe/London':
				$setDate = 0; break;
			case 'Africa/Casablanca':
				$setDate = 0; break;
			case 'Atlantic/Reykjavik':
				$setDate = 0; break;
			case 'Europe/Amsterdam':
				$setDate = +1; break;
			case 'Africa/Algiers':
				$setDate = +1; break;
			case 'Africa/Windhoek':
				$setDate = +1; break;
			case 'Africa/Tunis':
				$setDate = +1; break;
			case 'Europe/Athens':
				$setDate = +2; break;
			case 'Africa/Johannesburg':
				$setDate = +2; break;
			case 'Asia/Amman':
				$setDate = +2; break;
			case 'Asia/Beirut':
				$setDate = +2; break;
			case 'Africa/Cairo':
				$setDate = +2; break;
			case 'Asia/Jerusalem':
				$setDate = +2; break;
			case 'Europe/Minsk':
				$setDate = +2; break;
			case 'Asia/Gaza':
				$setDate = +2; break;
			case 'Asia/Damascus':
				$setDate = +2; break;
			case 'Europe/Moscow':
				$setDate = +3; break;
			case 'Africa/Nairobi':
				$setDate = +3; break;
			case 'Asia/Tehran':
				$setDate = +3.5; break;
			case 'Asia/Dubai':
				$setDate = +4; break;
			case 'Asia/Yerevan':
				$setDate = +4; break;
			case 'Asia/Baku':
				$setDate = +4; break;
			case 'Indian/Mauritius':
				$setDate = +4; break;
			case 'Asia/Kabul':
				$setDate = +4.5; break;
			case 'Asia/Yekaterinburg':
				$setDate = +5; break;
			case 'Asia/Tashkent':
				$setDate = +5; break;
			case 'Asia/Kolkata':
				$setDate = +5.5; break;
			case 'Asia/Kathmandu':
				$setDate = +5.75; break;
			case 'Asia/Dhaka':
				$setDate = +6; break;
			case 'Asia/Novosibirsk':
				$setDate = +6; break;
			case 'Asia/Almaty':
				$setDate = +6; break;
			case 'Asia/Rangoon':
				$setDate = +6.5; break;
			case 'Asia/Bangkok':
				$setDate = +7; break;
			case 'Asia/Krasnoyarsk':
				$setDate = +7; break;
			case 'Asia/Hong_Kong':
				$setDate = +8; break;
			case 'Asia/Singapore':
				$setDate = +8; break;
			case 'Asia/Irkutsk':
				$setDate = +8; break;
			case 'Australia/Perth':
				$setDate = +8; break;
			case 'Asia/Tokyo':
				$setDate = +9; break;
			case 'Asia/Seoul':
				$setDate = +9; break;
			case 'Asia/Yakutsk':
				$setDate = +9; break;
			case 'Australia/Adelaide':
				$setDate = +9.5; break;
			case 'Australia/Darwin':
				$setDate = +9.5; break;
			case 'Australia/Brisbane':
				$setDate = +10; break;
			case 'Australia/Sydney':
				$setDate = +10; break;
			case 'Asia/Vladivostok':
				$setDate = +10; break;
			case 'Pacific/Noumea':
				$setDate = +11; break;
			case 'Asia/Magadan':
				$setDate = +11; break;
			case 'Pacific/Norfolk':
				$setDate = +11.5; break;
			case 'Asia/Anadyr':
				$setDate = +12; break;
			case 'Pacific/Auckland':
				$setDate = +12; break;
			case 'Pacific/Fiji':
				$setDate = +12; break;
			case 'Pacific/Chatham':
				$setDate = +12.75; break;
			case 'Pacific/Tongatapu':
				$setDate = +13; break;
			case 'Pacific/Kiritimati':
				$setDate = +14; break;
		};
		return $setDate;
      
    }
}