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
class Nobita_Teams_Option
{
	public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$editLink = $view->createTemplateObject('option_list_option_editlink', array(
			'preparedOption' => $preparedOption,
			'canEditOptionDefinition' => $canEdit
		));

		$displayStyles = array(
			'userBanner bannerHidden',
			'userBanner bannerPrimary',
			'userBanner bannerSecondary',
			'userBanner bannerRed',
			'userBanner bannerGreen',
			'userBanner bannerOlive',
			'userBanner bannerLightGreen',
			'userBanner bannerBlue',
			'userBanner bannerRoyalBlue',
			'userBanner bannerSkyBlue',
			'userBanner bannerGray',
			'userBanner bannerSilver',
			'userBanner bannerYellow',
			'userBanner bannerOrange'
		);

		return $view->createTemplateObject('Team_option_ribbon_banner', array(
			'fieldPrefix' => $fieldPrefix,
			'listedFieldName' => $fieldPrefix . '_listed[]',
			'preparedOption' => $preparedOption,
			'formatParams' => $preparedOption['formatParams'],
			'editLink' => $editLink,

			'displayStyles' => $displayStyles
		));
	}

	public static function getTabsSupported()
	{
		if (Nobita_Teams_Validation::assetXenMediaValidAndUsable())
		{
			$photoTabTitle = new XenForo_Phrase('Teams_media');
		}
		elseif (Nobita_Teams_Validation::assetSonnbXenGalleryValidAndUsable())
		{
			$photoTabTitle = new XenForo_Phrase('Teams_gallery');
		}
		else
		{
			$photoTabTitle = new XenForo_Phrase('Teams_photos');
		}

		return array(
			'wtype_member' => array(
				'title' => new XenForo_Phrase('Teams_member_wall'),
				'explain' => new XenForo_Phrase('Teams_disable_wall_tab_explain')
			),
			'wtype_moderator' => array(
				'title' => new XenForo_Phrase('Teams_staff_wall'),
				'explain' => new XenForo_Phrase('Teams_disable_wall_tab_explain')
			),
			'member_list' => array(
				'title' => new XenForo_Phrase('Teams_members_list'),
				'explain' => new XenForo_Phrase('Teams_disable_member_list_explain')
			),
			'photos' => array(
				'title' => $photoTabTitle,
				'explain' => new XenForo_Phrase($photoTabTitle . '_disable_explain')
			),
			'events' => array(
				'title' => new XenForo_Phrase('Teams_events'),
				'explain' => new XenForo_Phrase('Teams_disable_event_explain')
			),
			'threads' => array(
				'title' => new XenForo_Phrase('threads')
			)
		);
	}

	public static function XenMedia_renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		if (!Nobita_Teams_Validation::assertAddOnValidAndUsable('XenGallery'))
		{
			$preparedOption['formatParams'] = array(
				'value' => 0,
				'label' => '(' . new XenForo_Phrase('unspecified') . ')',
				'selected' =>  true,
				'depth' => 0 
			);
		}
		else
		{
			$categoryModel = XenForo_Model::create('XenGallery_Model_Category');
			$categories = $categoryModel->getAllCategories();

			$options[0] = array(
				'value' => 0,
				'label' => '(' . new XenForo_Phrase('unspecified') . ')',
				'selected' =>  true,
				'depth' => 0 
			);
			foreach($categories as $category)
			{
				$options[$category['category_id']] = array(
					'value' => $category['category_id'],
					'label' => $category['category_title'],
					'selected' => false,
					'depth' => $category['depth']
				);
			}
			
			$preparedOption['formatParams'] = $options;
		}

		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
			'option_list_option_select', $view, $fieldPrefix, $preparedOption, $canEdit
		);
	}
}