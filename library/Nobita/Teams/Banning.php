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
class Nobita_Teams_Banning
{
	const BANNING_ID_KEY = 'banning_id';

	protected $_data;

	public function __construct(array $data)
	{
		$this->_data = $data;
	}

	public function getTeamId()
	{
		return isset($this->_data['team_id']) ? $this->_data['team_id'] : 0;
	}

	public function getUserId()
	{
		return isset($this->_data['user_id']) ? $this->_data['user_id'] : 0;
	}

	public static function generateBanningUniqueId(array &$data, $type)
	{
		$self = new self($data);

		return $data['banningInfo'][self::BANNING_ID_KEY] = sprintf('%d_%s_%d', 
			$self->getTeamId(), 
			$type, 
			$self->getUserId()
		);
	}

	public static function getBanningParamsFromData($data)
	{
		if (empty($data[self::BANNING_ID_KEY]))
		{
			return array();
		}
		$id = $data[self::BANNING_ID_KEY];

		$parts = explode('_', $id);
		return $parts;
	}
}