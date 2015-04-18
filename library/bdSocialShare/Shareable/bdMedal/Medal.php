<?php

class bdSocialShare_Shareable_bdMedal_Medal extends bdSocialShare_Shareable_Abstract
{
	protected $_medal;
	protected $_user;

	public function __construct($medal, $user)
	{
		$this->_medal = $medal;
		$this->_user = $user;
	}

	public function getId()
	{
		return sprintf('%d_%d', $this->_medal['medal_id'], $this->_user['user_id']);
	}

	public function getLink(XenForo_Model $model)
	{
		return XenForo_Link::buildPublicLink('full:members/medals', $this->_user);
	}

	public function getImage(XenForo_Model $model)
	{
		$imageUrl = bdMedal_Model_Medal::getImageUrl($this->_medal);

		if (!empty($imageUrl))
		{
			return XenForo_Link::convertUriToAbsoluteUri($imageUrl, true);
		}

		return parent::getImage($model);
	}

	public function getUserText(XenForo_Model $model)
	{
		$params = array('medal' => $this->_medal);

		return $this->_getSimulationTemplate('bdsocialshare_user_text_i_am_awarded_medal_x', $params);
	}

	public static function createFromId($id)
	{
		$parts = explode('_', $id);
		if (count($parts) == 2 AND is_numeric($parts[0]) AND is_numeric($parts[1]))
		{
			$medal = XenForo_Model::create('bdMedal_Model_Medal')->getMedalById($parts[0]);
			$user = XenForo_Model::create('XenForo_Model_User')->getUserById($parts[1]);

			if (!empty($medal) AND !empty($user))
			{
				return new self($medal, $user);
			}
		}

		return false;
	}

}
