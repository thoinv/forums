<?php
class DigitalPointSyntaxHighlighter_Listener_LoadClassBbCode_Formatter_Base
{
	public static function loadClassListener($class, &$extend)
	{
		$extend[] = 'DigitalPointSyntaxHighlighter_BbCode_Formatter_Base';
	}
}