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
class Nobita_Teams_Setup
{
	const TEAM_CACHE = 'team_cache';

	protected static $_instance;

	/**
	 * @var XenForo_Visitor
	 */
	protected $_visitor;

	/**
	 * @var array
	 */
	protected $_optionCache = array();

	public function __construct()
	{
		$this->_visitor = XenForo_Visitor::getInstance();
	}

	public static function getInstance()
	{
		if (!self::$_instance)
		{
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	public static function hasInstance()
	{
		return (self::$_instance ? true : false);
	}

	public function getTeamFromVisitor($teamId, array $visitor = null)
	{
		$teamId = intval($teamId);

		if ($visitor === null)
		{
			$visitor = $this->_visitor;
		}

		$teamCache = @unserialize($visitor[self::TEAM_CACHE]);
		if (!is_array($teamCache))
		{
			// sometime it return false
			// so make sure that it alway array
			$teamCache = array();
		}
		$team = array();

		if (isset($teamCache[$teamId]))
		{
			$team = $teamCache[$teamId];
			Nobita_Teams_Setup::helperMemberId($team, $team['team_id'], $team['user_id']);
		}

		return $team;
	}

	public function insertNewPostWhenActionCreated($teamId, $message, $systemPost = 0)
	{
		$visitor = $this->_visitor->toArray();
		
		$teamModel = XenForo_Model::create('Nobita_Teams_Model_Team');
		if (!$team = $teamModel->getTeamById($teamId))
		{
			throw new XenForo_Exception('[Nobita] Social Groups (Teams): Invalid team provided.', false);
			return false;
		}

		$writer = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Post');
		$writer->bulkSet(array(
			'team_id' => $team['team_id'],
			'user_id' => $visitor['user_id'],
			'username' => $visitor['username'],
			'message' => $message,
			'system_posting' => $systemPost
		));
		
		$writer->save();
	}

	public function verifyAndProcessingTimeinput(XenForo_Controller $controller, $sorttime = '', $datepicker)
	{
	
		$sorttime = array_map('intval', explode(":", $sorttime));
		if (count($sorttime) != 2)
		{
			throw new XenForo_Exception("Missing agrument for create/edit event.");
			return false;
		}
		
		$datepicker = XenForo_Locale::date($datepicker, 'd-m-Y');
		$datepicker = array_map('intval', explode('-', $datepicker));

		$gmmktime = gmmktime($sorttime[0], $sorttime[1], 0, $datepicker[1], $datepicker[0], $datepicker[2]);
		return $gmmktime - XenForo_Locale::getTimeZoneOffset();
	}

	public static function helperSystemPost(array $post)
	{
		if (empty($post['system_posting']))
		{
			return isset($post['messageHtml']) ? $post['messageHtml'] : $post['message'];
		}
		
		$message = isset($post['messageHtml']) ? $post['messageHtml'] : $post['message'];
		preg_match('#\[(user)(=[^\]]*)?](.*)\[/\\1]#siU', $message, $matched);

		if ($matched)
		{
			return $message;
		}
		
		$newMessage = '[user=' . $post['user_id'] . ']' . $post['username'] . '[/user] ' . $message;
		return $newMessage;
	}

	public function getOption($key, $subKey = null)
	{
		$cacheKey = $key . $subKey;

		if (!array_key_exists($cacheKey, $this->_optionCache))
		{
			$this->_optionCache[$cacheKey] = XenForo_Application::getOptions()->get(sprintf('Teams_%s', $key), $subKey);
		}

		return $this->_optionCache[$cacheKey];
		//return $this->_options->get(sprintf('Teams_%s', $key), $subKey);
	}

	public static function getTimeSelectableMap()
	{
		$map = array();

		$self = Nobita_Teams_Setup::hasInstance() 
			? self::$_instance 
			: Nobita_Teams_Setup::getInstance();
		$timeformat = $self->getOption('timeformat');

		switch(intval($timeformat))
		{
			case 12:
				for ($i = 0; $i < 24; $i++)
				{
					if ($i < 12)
					{
						if (0 === $i)
						{
							$map[$i . ':00'] = '12:00 AM';
							$map[$i . ':30'] = '12:30 AM';
						}
						else
						{
							$map[$i . ':00'] = $i . ':00 AM';
							$map[$i . ':30'] = $i . ':30 AM';
						}
					}
					else
					{
						
						if (12 == $i)
						{
							$map[$i . ':00'] = $i . ':00 PM';
							$map[$i . ':30'] = $i . ':30 PM';
						}
						else
						{
							$map[$i . ':00'] = ($i - 12) . ':00 PM';
							$map[$i . ':30'] = ($i - 12) . ':30 PM';
						}
					}
				}
				break;
			case 24:
				for ($i = 0; $i < 24; $i++)
				{
					$map[$i . ':00'] = $i . ':00';
					$map[$i . ':30'] = $i . ':30';
				}
				break;
		}

		return $map;
	}

	public static function getFinalPermission($permKey, $teamId)
	{
		$permissions = XenForo_Application::getOptions()->Teams_globalPerms;

		$visitor = XenForo_Visitor::getInstance();
		if (! $visitor['user_id'])
		{
			return false;
		}

		$teamCache = @unserialize($visitor[self::TEAM_CACHE]);
		$isMember = isset($teamCache[$teamId]) ? $teamCache[$teamId] : false;

		if (! $isMember)
		{
			return false;
		}

		$isValid = false;
		if (isset($isMember['member_state']))
		{
			$isValid = ($isMember['member_state'] != 'request');
		}

		return (
			!empty($permissions[$permKey])
			&& $isValid
		);
	}

	public static function helperMemberId(array &$record, $teamId, $userId)
	{
		$teamId = intval($teamId);
		$userId = intval($userId);

		$record['member_id'] = sprintf('%d_%d', $teamId, $userId);
		return $record;
	}
}