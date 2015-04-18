<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_Listener_Listener
{
    //Controller
	public static function controller($class, array &$extend)
	{
		if ($class == 'XenForo_ControllerPublic_Thread')
		{
			$extend[] = 'Borbole_StarRating_ControllerPublic_Thread';
		}
		
		if ($class == 'XenForo_ControllerPublic_Forum')
		{
			$extend[] = 'Borbole_StarRating_ControllerPublic_Forum';
		}
		
		if ($class == 'XenForo_ControllerAdmin_Log')
		{
			$extend[] = 'Borbole_StarRating_ControllerAdmin_Log';
		}

        if ($class == 'XenForo_ControllerAdmin_User')
        {
            $extend[] = 'Borbole_StarRating_ControllerAdmin_User';
        }
	}
	
	//Model
	public static function model($class, array &$extend)
	{
	    if ($class == 'XenForo_Model_Log')
		{
			$extend[] = 'Borbole_StarRating_Model_Log';
		}
		
		if ($class == 'XenForo_Model_Thread')
		{
			$extend[] = 'Borbole_StarRating_Model_Thread';
		}
	}
	
	//Datawriter
	public static function dataWriter($class, array &$extend)
	{
		if ($class == 'XenForo_DataWriter_Discussion_Thread')
		{ 
			$extend[] = 'Borbole_StarRating_DataWriter_Discussion_Thread';
		}
	}
	
	//vB 3x&4x and MyBB 1.6/1.8 rating importer
	public static function ratingImporter($class, array &$extend) 
	{
		if (strpos($class, 'MyBb') != false AND !defined('Borbole_StarRating_Importer_MyBb_LOADED')) 
		{
			$extend[] = 'Borbole_StarRating_Importer_MyBb';
		}
		
		if (strpos($class, 'vBulletin') != false AND !defined('Borbole_StarRating_Importer_vBulletin_LOADED')) 
		{
			$extend[] = 'Borbole_StarRating_Importer_vBulletin';
		}
	}
}