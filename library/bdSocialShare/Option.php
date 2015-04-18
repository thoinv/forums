<?php

class bdSocialShare_Option
{
	public static function get($key)
	{
		return XenForo_Application::getOptions()->get('bdSocialShare_' . $key);
	}

	public static function getTwitterConsumerPair()
	{
		$options = XenForo_Application::getOptions();

		if (XenForo_Application::$versionId > 1030000)
		{
			$consumerKey = $options->get('twitterAppKey');
			$consumerSecret = $options->get('twitterAppSecret');
		}
		else
		{
			$consumerKey = $options->get('twitterConsumerKey');
			$consumerSecret = $options->get('twitterConsumerSecret');
		}

		return array(
			$consumerKey,
			$consumerSecret
		);
	}

	public static function hasPermissionFacebook(array $viewingUser = array())
	{
		$options = XenForo_Application::getOptions();
		$appId = $options->get('facebookAppId');
		$appSecret = $options->get('facebookAppSecret');
		if (empty($appId) OR empty($appSecret))
		{
			return false;
		}

		if (empty($viewingUser['user_id']))
		{
			// a special record of guest is used for pre-configured targets
			return true;
		}

		if (empty($viewingUser['permissions']))
		{
			return false;
		}

		return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'bdSocialShare_facebook');
	}

	public static function hasPermissionTwitter(array $viewingUser = array())
	{
		$pair = self::getTwitterConsumerPair();
		if (empty($pair[0]) OR empty($pair[1]))
		{
			return false;
		}

		if (empty($viewingUser['user_id']))
		{
			// a special record of guest is used for pre-configured targets
			return true;
		}

		if (empty($viewingUser['permissions']))
		{
			return false;
		}

		return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'bdSocialShare_twitter');
	}

	public static function renderOnOff(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$formatParams = array();
		$formatParams[] = array(
			'value' => 'yes',
			'label' => new XenForo_Phrase('yes'),
		);
		$formatParams[] = array(
			'value' => '',
			'label' => new XenForo_Phrase('no'),
		);

		return self::renderRadio($view, $fieldPrefix, $preparedOption, $canEdit, $formatParams);
	}

	public static function renderOptInOptOutOff(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$formatParams = array();
		$formatParams[] = array(
			'value' => 'optOut',
			'label' => new XenForo_Phrase('bdsocialshare_opt_out'),
		);
		$formatParams[] = array(
			'value' => 'optIn',
			'label' => new XenForo_Phrase('bdsocialshare_opt_in'),
		);
		$formatParams[] = array(
			'value' => '',
			'label' => new XenForo_Phrase('no'),
		);

		return self::renderRadio($view, $fieldPrefix, $preparedOption, $canEdit, $formatParams);
	}

	public static function renderRadio(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit, $formatParams)
	{
		$preparedOption['title'] = new XenForo_Phrase('bdsocialshare_allow_posting_for_x', array('action' => $preparedOption['title']));

		$preparedOption['formatParams'] = $formatParams;

		$editLink = $view->createTemplateObject('option_list_option_editlink', array(
			'preparedOption' => $preparedOption,
			'canEditOptionDefinition' => $canEdit
		));

		list($addOns, $missingAddOns) = self::_getMissingAddOns($preparedOption['option_id']);

		if (empty($missingAddOns))
		{
			return $view->createTemplateObject('option_list_option_radio', array(
				'fieldPrefix' => $fieldPrefix,
				'listedFieldName' => $fieldPrefix . '_listed[]',
				'preparedOption' => $preparedOption,
				'value' => isset($preparedOption['option_value']) ? $preparedOption['option_value'] : '',
				'formatParams' => $preparedOption['formatParams'],
				'editLink' => $editLink,
			));
		}
		else
		{
			return $view->createTemplateObject('bdsocialshare_option_missing_add_ons', array(
				'fieldPrefix' => $fieldPrefix,
				'listedFieldName' => $fieldPrefix . '_listed[]',
				'preparedOption' => $preparedOption,
				'value' => isset($preparedOption['option_value']) ? $preparedOption['option_value'] : '',
				'formatParams' => $preparedOption['formatParams'],
				'editLink' => $editLink,

				'addOns' => $addOns,
				'missingAddOns' => $missingAddOns,
			));
		}
	}

	public static function renderAuto(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		list($addOns, $missingAddOns) = self::_getMissingAddOns($preparedOption['option_id']);

		if (empty($missingAddOns))
		{
			$preparedOption['title'] = new XenForo_Phrase('bdsocialshare_auto_for_x', array('action' => $preparedOption['title']));

			$editLink = $view->createTemplateObject('option_list_option_editlink', array(
				'preparedOption' => $preparedOption,
				'canEditOptionDefinition' => $canEdit
			));

			return $view->createTemplateObject('bdsocialshare_option_auto', array(
				'fieldPrefix' => $fieldPrefix,
				'listedFieldName' => $fieldPrefix . '_listed[]',
				'preparedOption' => $preparedOption,
				'value' => isset($preparedOption['option_value']) ? $preparedOption['option_value'] : '',
				'formatParams' => $preparedOption['formatParams'],
				'editLink' => $editLink,
			));
		}
	}

	public static function renderThreadAuto(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$templateObj = self::renderAuto($view, $fieldPrefix, $preparedOption, $canEdit);

		/* @var $nodeModel XenForo_Model_Node */
		$nodeModel = XenForo_Model::create('XenForo_Model_Node');

		/* @var $forumModel XenForo_Model_Forum */
		$forumModel = $nodeModel->getModelFromCache('XenForo_Model_Forum');

		$nodes = $nodeModel->getAllNodes();
		$forumIds = array();
		foreach ($nodes as $node)
		{
			if ($node['node_type_id'] === 'Forum')
			{
				$forumIds[] = $node['node_id'];
			}
		}
		$forums = $forumModel->getForumsByIds($forumIds);

		$configuredForums = array();
		foreach ($forumIds as $forumId)
		{
			$forumRef = &$forums[$forumId];
			$forumThreadAuto = bdSocialShare_Helper_Common::unserializeOrFalse($forumRef, 'bdsocialshare_threadauto');
			if ($forumThreadAuto !== false)
			{
				$configuredForums[$forumId] = $forumRef;
				$configuredForums[$forumId]['_bdSocialShare_threadAuto'] = $forumThreadAuto;
			}
		}

		$ourTemplateParams = array('configuredForums' => $configuredForums);
		$ourTemplateObj = $view->createTemplateObject('bdsocialshare_option_threadauto_extra_html', $ourTemplateParams);
		$templateObj->setParam('_bdSocialShare_extraHtml', $ourTemplateObj);

		return $templateObj;
	}

	protected static function _getMissingAddOns($optionId)
	{
		/* @var $publisherModel bdSocialShare_Model_Publisher */
		$publisherModel = XenForo_Model::create('bdSocialShare_Model_Publisher');

		$requiredAddOns = array();
		$missingAddOns = array();

		if (XenForo_Application::isRegistered('addOns'))
		{
			// XenForo v1.2+
			$addOns = XenForo_Application::get('addOns');
		}
		else
		{
			// older version of XenForo
			$allAddOns = $publisherModel->getModelFromCache('XenForo_Model_AddOn')->getAllAddOns();

			$addOns = array();
			foreach ($allAddOns as $addOn)
			{
				if (!empty($addOn['active']))
				{
					$addOns[$addOn['addon_id']] = $addOn['version_id'];
				}
			}
		}

		switch ($optionId)
		{
			case 'bdSocialShare_medalAward':
				// check for [bd] Medal add-on
				$requiredAddOns['bdMedal'] = true;
				break;
			case 'bdSocialShare_nfljShowcaseItemPublish':
				// check for [NFLJ] Showcase add-on
				$requiredAddOns['NFLJ_Showcase'] = true;
				break;
			case 'bdSocialShare_resourceAdd':
			case 'bdSocialShare_resourceAddAuto':
			case 'bdSocialShare_resourceVersionAdd':
				// check for XenForo Resouce Manager add-on
				$requiredAddOns['XenResource'] = true;
				break;
			case 'bdSocialShare_sonnbXenGalleryPhotoAttach':
				// check for sonnb - XenGallery add-on
				$requiredAddOns['sonnb_xengallery'] = true;
				break;
			case 'bdSocialShare_xenGalleryImageAttach':
				// check for Xen Media Gallery add-on
				$requiredAddOns['XenGallery'] = true;
				break;
			case 'bdSocialShare_xiBlogEntryPublish':
				// check for [XI] Blog add-on
				$requiredAddOns['XIBlog'] = true;
				break;
		}
		$requiredAddOns = array_merge($requiredAddOns, $publisherModel->getRequiredAddOnsForOption($optionId));

		if (!empty($requiredAddOns))
		{
			foreach ($requiredAddOns as $requiredAddOnId => $requiredAddOnVersionId)
			{
				if (empty($addOns[$requiredAddOnId]))
				{
					$missingAddOns[$requiredAddOnId] = $requiredAddOnVersionId;
					continue;
				}

				if (is_int($requiredAddOnVersionId))
				{
					// need to check for version id
					if ($requiredAddOnVersionId > $addOns[$requiredAddOnId])
					{
						$missingAddOns[$requiredAddOnId] = $requiredAddOnVersionId;
						continue;
					}
				}
			}
		}

		return array(
			$addOns,
			$missingAddOns
		);
	}

}
