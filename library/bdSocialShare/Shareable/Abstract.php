<?php

abstract class bdSocialShare_Shareable_Abstract
{
	protected $_published = array();
	protected $_viewingUser = false;

	public function getId()
	{
		return false;
	}

	public function getLink(XenForo_Model $model)
	{
		return false;
	}

	public function getImageDataPath(XenForo_Model $model)
	{
		return false;
	}

	public function getImage(XenForo_Model $model)
	{
		return false;
	}

	public function getTitle(XenForo_Model $model)
	{
		return false;
	}

	public function getDescription(XenForo_Model $model)
	{
		return false;
	}

	public function getUserText(XenForo_Model $model)
	{
		return false;
	}

	public function getQueueDate(XenForo_Model $model)
	{
		return 0;
	}

	public function markPublished($target, $extraData)
	{
		$this->_published[$target] = $extraData;
	}

	public function getPublishedTargets()
	{
		return array_keys($this->_published);
	}

	public function getPublishedExtraData($target)
	{
		if (isset($this->_published[$target]))
		{
			return $this->_published[$target];
		}
		else
		{
			return false;
		}
	}

	public function isPublished($target = false)
	{
		if (!empty($target))
		{
			return $this->getPublishedExtraData($target) !== false;
		}
		else
		{
			return !empty($this->_published);
		}
	}

	public function setViewingUser(array $viewingUser)
	{
		$this->_viewingUser = $viewingUser;
	}

	public function getViewingUser()
	{
		return $this->_viewingUser;
	}

	public function getViewingUserId()
	{
		if (!empty($this->_viewingUser['user_id']))
		{
			return intval($this->_viewingUser['user_id']);
		}

		return 0;
	}

	public function getRecoveryData()
	{
		$id = $this->getId();

		if (!empty($id))
		{
			return array(
				get_class($this),
				$id
			);
		}

		return false;
	}

	public function getPreConfiguredTargets()
	{
		return array();
	}

	protected function _getSnippetFromBbCodeMessage(XenForo_Model $model, $message)
	{
		if (!empty($message))
		{
			$snippet = XenForo_Template_Helper_Core::callHelper('snippet', array(
				$message,
				0,
				array('stripQuote' => true)
			));

			// remove attach, img, media tags
			$snippet = str_ireplace(array(
				'[ATTACH]',
				'[IMG]',
				'[MEDIA]',
			), '', $snippet);

			$snippet = htmlspecialchars_decode($snippet);

			return $snippet;
		}

		return false;
	}

	protected function _getImageFromBbCodeMessage(XenForo_Model $model, array $data, $contentType, $contentId, $options = array())
	{
		$options = array_merge(array(
			'messageKey' => 'message',
			'attachCountKey' => 'attach_count',
		), $options);
		$bbCodeFormatter = XenForo_BbCode_Formatter_Base::create('bdSocialShare_BbCode_Formatter_ImageCollect');
		$bbCodeParser = XenForo_BbCode_Parser::create($bbCodeFormatter);

		$bbCodeParser->render($data[$options['messageKey']], array('model' => $model));

		$found = $bbCodeFormatter->getFound();
		foreach ($found as $foundSingle)
		{
			$type = reset($foundSingle);

			switch ($type)
			{
				case 'image':
					return $foundSingle[1];
					break;
				case 'media':
					if ($foundSingle[1] == 'youtube')
					{
						return sprintf('http://img.youtube.com/vi/%s/default.jpg', $foundSingle[2]);
					}
					break;
				case 'attach':
					$attachment = $model->getModelFromCache('XenForo_Model_Attachment')->getAttachmentById($foundSingle[1]);
					if (!empty($attachment))
					{
						return $this->_getImageForAttachment($attachment, $model);
					}
					break;
			}
		}

		if (!empty($options['attachCountKey']) AND $data[$options['attachCountKey']] > 0)
		{
			$attachments = $model->getModelFromCache('XenForo_Model_Attachment')->getAttachmentsByContentId($contentType, $contentId);
			foreach ($attachments as $attachment)
			{
				if (!empty($attachment['thumbnail_width']) AND !empty($attachment['thumbnail_height']))
				{
					return $this->_getImageForAttachment($attachment, $model);
				}
			}
		}

		return false;
	}

	protected function _getImageForAttachment($attachment, XenForo_Model $model)
	{
		// try to use full size link if possible
		$image = XenForo_Link::buildPublicLink('attachments', $attachment);
		if (Zend_URi::check($image) AND substr($image, -1) !== '/')
		{
			$filename = basename($image);
			$ext = XenForo_Helper_File::getFileExtension($filename);

			if (in_array($ext, array(
				'gif',
				'jpg',
				'jpeg',
				'png'
			), true))
			{
				return $image;
			}
		}

		// fallback to thumbnail
		$image = $model->getModelFromCache('XenForo_Model_Attachment')->getAttachmentThumbnailUrl($attachment);
		$image = XenForo_Link::convertUriToAbsoluteUri($image, true);

		return $image;
	}

	protected function _getPhrase($phraseName, array $params = array())
	{
		$options = XenForo_Application::getOptions();
		$viewingUser = $this->getViewingUser();

		if (!empty($viewingUser['language_id']))
		{
			$languageId = $viewingUser['language_id'];
		}
		else
		{
			$languageId = $options->get('defaultLanguageId');
		}

		return new bdSocialShare_Helper_Phrase($languageId, $phraseName, $params);
	}

	protected function _getSimulationTemplate($templateName, array $params = array())
	{
		static $view = null;

		$options = XenForo_Application::getOptions();
		$viewingUser = $this->getViewingUser();

		if (!empty($viewingUser['style_id']))
		{
			bdSocialShare_Helper_Simulation_Template::$bdSocialShare_Helper_styleId = $viewingUser['style_id'];
		}
		else
		{
			bdSocialShare_Helper_Simulation_Template::$bdSocialShare_Helper_styleId = $options->get('defaultStyleId');
		}

		if (!empty($viewingUser['language_id']))
		{
			bdSocialShare_Helper_Simulation_Template::$bdSocialShare_Helper_languageId = $viewingUser['language_id'];
		}
		else
		{
			bdSocialShare_Helper_Simulation_Template::$bdSocialShare_Helper_languageId = $options->get('defaultLanguageId');
		}

		bdSocialShare_Helper_Simulation_Template::$bdSocialShare_Helper_visitor = $viewingUser;

		if ($view === null)
		{
			$view = bdSocialShare_Helper_Simulation_View::create();
		}

		return $view->createTemplateObject($templateName, $params);
	}

	public static function createFromRecoveryData($data)
	{
		if (is_array($data) AND count($data) == 2)
		{
			if (is_callable(array(
				$data[0],
				'createFromId'
			)))
			{
				return call_user_func(array(
					$data[0],
					'createFromId'
				), $data[1]);
			}
		}

		return false;
	}

}
