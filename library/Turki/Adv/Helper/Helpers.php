<?php

class Turki_Adv_Helper_Helpers
{
	public static function advhtml($string, $banner)
	{
		$sentences = explode("\n", $string);
		$time      = rand(1, count($sentences));
		$first     = array_slice($sentences, 0, $time);
		$last      = array_slice($sentences, $time);
		$output    = join(" ", $first) . "\n";
		$output .= $banner . "\n";
		$output .= join(" ", $last);
		return $output;
	}
}