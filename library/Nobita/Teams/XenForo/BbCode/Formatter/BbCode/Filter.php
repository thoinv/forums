<?php

class Nobita_Teams_XenForo_BbCode_Formatter_BbCode_Filter extends XFCP_Nobita_Teams_XenForo_BbCode_Formatter_BbCode_Filter
{
	protected $_disableButtons = array();

	public function configureSimpleComment()
	{
		$buttons = $this->_getDisableButtons();
		foreach ($buttons as $name => $button)
		{
			$this->Teams_setDisableButton($name, !$button['disable']);
			if (!$button['disable'])
			{
				continue;
			}

			$this->disableTags($button['tags']);
		}

		$this->setMaxTextSize(XenForo_Application::getOptions()->Teams_commentLength);
	}

	public function Teams_setDisableButton($button, $value)
	{
		$this->_disableButtons[$button] = (bool) $value;
	}

	public function Teams_getButtons()
	{
		return $this->_disableButtons;
	}

	protected function _getDisableButtons()
	{
		return array(
			'basic' 		=> array(
				'disable' => false,
				'tags' => array('u', 'i', 's')
			),
			'extended' 		=> array(
				'disable' => true,
				'tags' => array('color', 'font', 'size')
			),
			'align' 		=> array(
				'disable' => true,
				'tags' => array('left', 'center', 'right', 'indent')
			),
			'smilies' 		=> array(
				'disable' => false,
				'tags' => array()
			),
			'link' 			=> array(
				'disable' => false,
				'tags' => array()
			),
			'image' 		=> array(
				'disable' => true,
				'tags' => array('img')
			),
			'media' 		=> array(
				'disable' => true,
				'tags' => array('media')
			),
			'block' 		=> array(
				'disable' => true,
				'tags' => array('code', 'php', 'html', 'quote', 'spoiler')
			),
			'list' 			=> array(
				'disable' => true,
				'tags' => array()
			)
		);
	}

	public function Teams_validateComment($comment, &$errors = array())
	{
		$errors = array();

		$length = XenForo_Application::getOptions()->Teams_commentLength;
		if ($length != -1 && $this->getPrintableLength() > $length)
		{
			$diff = $this->getPrintableLength() - $length;
			$errors[] = new XenForo_Phrase('Teams_your_message_is_x_characters_too_long', array('count' => XenForo_Locale::numberFormat($diff)));
		}

		$links = 1;
		if ($links != -1 && ($this->getTagTally('url') + $this->getTagTally('email')) > $links)
		{
			$errors[] = new XenForo_Phrase('Teams_your_message_may_only_have_x_links', array('count' => XenForo_Locale::numberFormat($links)));
		}

		if (!$this->_stripDisabled)
		{
			foreach ($this->_disabledTags AS $disabledTag)
			{
				if ($this->getTagTally($disabledTag))
				{
					$errors[] = new XenForo_Phrase('Teams_your_message_may_not_contain_disabled_tags');
					break;
				}
			}
		}

		return (count($errors) == 0);
	}
}