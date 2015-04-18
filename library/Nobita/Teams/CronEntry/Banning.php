<?php

class Nobita_Teams_CronEntry_Banning
{
	public static function runHourly()
	{
		XenForo_Model::create('Nobita_Teams_Model_Banning')->deleteBanningExpired();
	}
}