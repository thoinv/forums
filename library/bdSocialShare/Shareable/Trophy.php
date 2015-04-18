<?php

class bdSocialShare_Shareable_Trophy extends bdSocialShare_Shareable_Abstract
{
	protected $_trophyId;
	protected $_user;

	public function __construct($trophyId, $user)
	{
		$this->_trophyId = $trophyId;
		$this->_user = $user;
	}

	public function getId()
	{
		return sprintf('%d_%d', $this->_trophyId, $this->_user['user_id']);
	}

	public function getLink(XenForo_Model $model)
	{
		return XenForo_Link::buildPublicLink('full:members/trophies', $this->_user);
	}

	public function getUserText(XenForo_Model $model)
	{
		$params = array();
		$params['trophyId'] = $this->_trophyId;
		$params['trophyPhrase'] = $this->_getPhrase($model->getModelFromCache('XenForo_Model_Trophy')->getTrophyTitlePhraseName($this->_trophyId));

		return $this->_getSimulationTemplate('bdsocialshare_user_text_i_am_awarded_trophy_x', $params);
	}

	public static function createFromId($id)
	{
		$parts = explode('_', $id);
		if (count($parts) == 2 AND is_numeric($parts[0]) AND is_numeric($parts[1]))
		{
			$user = XenForo_Model::create('XenForo_Model_User')->getUserById($parts[1]);

			if (!empty($user))
			{
				return new self($parts[0], $user);
			}
		}

		return false;
	}

}
