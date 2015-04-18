<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_Array
{
	public static function removeKeys(array &$data1, array $data2)
	{
		foreach ($data2 as $key)
		{
			if (array_key_exists($key, $data1))
			{
				unset($data1[$key]);
			}
		}

		return $data1;
	}

	public static function fullcalendar_languageOptions()
	{
		// http://msdn.microsoft.com/en-us/library/ms533052(v=vs.85).aspx
		// http://www.fincher.org/Utilities/CountryLanguageList.shtml
		return array(
			'ar' => 'Arabic',
			'ar-ma' => 'Arabic (Morocco)',
			'ar-sa' => 'Arabic (Saudi Arabia)',
			'bg' => 'Bulgarian',
			'ca' => 'Catalan',
			'cs' => 'Czech',
			'da' => 'Danish',
			'de' => 'Germany',
			'de-at' => 'German (Austria)',
			'en-au' => 'English (Australia)',
			'en-ca' => 'English (Canada)',
			'en-gb' => 'English (United Kingdom)',
			'es' => 'Spanish (United States)',
			'fa' => 'Farsi',
			'fi' => 'Finnish',
			'fr' => 'French (Standard)',
			'fr-ca' => 'French (Canada)',
			'hi' => 'Hindi',
			'hr' => 'Croatian (Croatia)',
			'hu' => 'Hungarian',
			'id' => 'Indonesian',
			'it' => 'Italian (Standard)',
			'is' => 'Icelandic',
			'ja' => 'Japanese',
			'ko' => 'Korean (Johab)',
			'lt' => 'Lithuanian',
			'lv' => 'Latvian',
			'nl' => 'Dutch (Netherlands)',
			'pl' => 'Polish',
			'pt' => 'Portuguese (Portugal)',
			'pt-br' => 'Portuguese (Brazil)',
			'ro' => 'Romanian',
			'ru' => 'Russian',
			'sk' => 'Slovak',
			'sl' => 'Slovenian',
			'sr' => 'Serbian (Cyrillic)',
			'sr-cyrl' => 'Serbian',
			'sv' => 'Swedish',
			'th' => 'Thai',
			'tr' => 'Turkish',
			'uk' => 'Ukrainian',
			'vi' => 'Vietnamese (Vietnam)',
			'zh-cn' => "Chinese (Simplified)",
			'zh-tw' => "Chinese (Traditional)"
		);
	}
}