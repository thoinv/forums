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
class Nobita_Teams_BbCode_Formatter_Base extends XenForo_BbCode_Formatter_Base
{
	/**
	 * List of bbcode tags which use in addon
	 *
	 * @var array
	 */
	protected $_usableTags = array();

	public function __construct()
	{
		$this->_setBasicUsableTags();
		$this->_getAdvancedUsableTags();

		return parent::__construct();
	}

	public function getTags()
	{
		$tags = parent::getTags();

		foreach($tags as $tagName => $tagOption)
		{
			if (isset($this->_usableTags[$tagName]))
			{
				continue;
			}
			unset($tags[$tagName]);
		}

		return $tags;
	}

	public function setUsableTag($tag)
	{
		if (!isset($this->_usableTags[$tag]))
		{
			$this->_usableTags[$tag] = true;
		}
	}

	public function setUsableTags(array $tags)
	{
		array_walk($tags, function($tag) {
			call_user_func_array(array($this, 'setUsableTag'), array($tag));
		});
	}

	protected function _setBasicUsableTags()
	{
		$tags = array('b', 'i', 'u', 's', 'font', 'color', 'img');

		call_user_func_array(array($this, 'setUsableTags'), array($tags));
	}

	protected function _getAdvancedUsableTags()
	{
		$tags = array('size', 'url', 'list', 'media', 'user', 'attach');

		call_user_func_array(array($this, 'setUsableTags'), array($tags));
	}

}
