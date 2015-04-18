<?php

class bdSocialShare_Listener
{
	const BDMEDAL_MODEL_AWARDED_AWARD = 'bdSocialShare_bdMedal_Model_Awarded::award';
	const NFLJ_SHOWCASE_CONTROLLERPUBLIC_INDEX_SAVE = 'bdSocialShare_NFLJ_Showcase_ControllerPublic_Index::actionSave';
	const XENFORO_CONTROLLERADMIN_FORUM_SAVE = 'bdSocialShare_XenForo_ControllerAdmin_Forum::actionSave';
	const XENFORO_CONTROLLERPUBLIC_ACCOUNT_PERSONAL_DETAILS_SAVE = 'bdSocialShare_XenForo_ControllerPublic_Account::actionPersonalDetailsSave';
	const XENFORO_CONTROLLERPUBLIC_ACCOUNT_PREFERENCES_SAVE = 'bdSocialShare_XenForo_ControllerPublic_Account::actionPreferencesSave';
	const XENFORO_CONTROLLERPUBLIC_FORUM_ADD_THREAD = 'bdSocialShare_XenForo_ControllerPublic_Forum::actionAddThread';
	const XENFORO_CONTROLLERPUBLIC_MEMBER_POST = 'bdSocialShare_XenForo_ControllerPublic_Member::actionPost';
	const XENFORO_CONTROLLERPUBLIC_REGISTER_FACEBOOK = 'bdSocialShare_XenForo_ControllerPublic_Register::actionFacebook';
	const XENFORO_CONTROLLERPUBLIC_REGISTER_TWITTER = 'bdSocialShare_XenForo_ControllerPublic_Register::actionTwitter';
	const XENFORO_CONTROLLERPUBLIC_THREAD_ADD_REPLY = 'bdSocialShare_XenForo_ControllerPublic_Thread::actionAddReply';
	const XENGALLERY_CONTROLLERPUBLIC_MEDIA_SAVE_MEDIA = 'bdSocialShare_XenGallery_ControllerPublic_Media::actionSaveMedia';
	const XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_SAVE = 'bdSocialShare_sonnb_XenGallery_ControllerPublic_XenGallery_Album::actionSave';
	const XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_PHOTO = 'bdSocialShare_sonnb_XenGallery_ControllerPublic_XenGallery_Album::actionAddPhoto';
	const XENGALLERY_CONTROLLERPUBLIC_XENGALLERY_ADD_VIDEO = 'bdSocialShare_sonnb_XenGallery_ControllerPublic_XenGallery_Album::actionAddVideo';
	const XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE = 'bdSocialShare_XenResource_ControllerPublic_Resource::actionSave';
	const XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_SAVE_VERSION = 'bdSocialShare_XenResource_ControllerPublic_Resource::actionSaveVersion';
	const XENRESOURCE_CONTROLLERPUBLIC_RESOURCE_ICON = 'bdSocialShare_XenResource_ControllerPublic_Resource::actionIcon';
	const XI_BLOG_CONTROLLERPUBLIC_INDEX_ADD_ENTRY = 'bdSocialShare_XI_Blog_ControllerPublic_Index::actionAddEntry';
	const XI_BLOG_CONTROLLERPUBLIC_BLOGDRAFT_SAVE = 'bdSocialShare_XI_Blog_ControllerPublic_BlogDraft::actionSave';
	const XI_BLOG_MODEL_DRAFT_PUBLISH_PENDING = 'bdSocialShare_XI_Blog_Model_Draft::publishPendingDrafts';

	protected static $_dependencies = null;

	/**
	 * @return XenForo_Dependencies_Abstract
	 */
	public static function getDependencies()
	{
		return self::$_dependencies;
	}

	public static function load_class($class, array &$extend)
	{
		static $classes = null;

		if ($classes === null)
		{
			$classes = array_flip(array(
				'bdMedal_DataWriter_Awarded',
				'bdMedal_Model_Awarded',

				'NFLJ_Showcase_ControllerPublic_Index',
				'NFLJ_Showcase_ControllerPublic_Showcase',
				'NFLJ_Showcase_DataWriter_Item',

				'sonnb_XenGallery_ControllerPublic_XenGallery_Album',
				'sonnb_XenGallery_DataWriter_Photo',
				'sonnb_XenGallery_DataWriter_Video',

				'XenForo_ControllerAdmin_Forum',
				'XenForo_ControllerAdmin_Tools',
				'XenForo_ControllerPublic_Account',
				'XenForo_ControllerPublic_Forum',
				'XenForo_ControllerPublic_Member',
				'XenForo_ControllerPublic_Misc',
				'XenForo_ControllerPublic_Thread',
				'XenForo_DataWriter_AddOn',
				'XenForo_DataWriter_Discussion_Thread',
				'XenForo_DataWriter_DiscussionMessage_Post',
				'XenForo_DataWriter_DiscussionMessage_ProfilePost',
				'XenForo_DataWriter_Forum',
				'XenForo_DataWriter_User',
				'XenForo_Model_Forum',
				'XenForo_Model_Thread',
				'XenForo_Model_Trophy',
				'XenForo_Model_User',
				'XenForo_Model_UserExternal',
				'XenForo_ViewAdmin_Forum_Edit',

				'XenGallery_ControllerPublic_Media',
				'XenGallery_DataWriter_Media',

				'XenResource_ControllerPublic_Resource',
				'XenResource_DataWriter_Resource',
				'XenResource_DataWriter_Update',
				'XenResource_Model_Category',
				'XenResource_Model_Resource',

				'WidgetFramework_WidgetRenderer_ProfilePosts',
				'WidgetFramework_WidgetRenderer_RecentStatus',

				'XI_Blog_ControllerPublic_Index',
				'XI_Blog_ControllerPublic_BlogDraft',
				'XI_Blog_DataWriter_Discussion_Draft',
				'XI_Blog_DataWriter_Discussion_Entry',
				'XI_Blog_Model_Draft',
				'XI_Blog_ViewPublic_Draft_Edit',
			));
		}

		if (isset($classes[$class]))
		{
			$extend[] = 'bdSocialShare_' . $class;
		}
	}

	public static function load_class_XenForo_ControllerPublic_Register($class, array &$extend)
	{
		if ($class === 'XenForo_ControllerPublic_Register')
		{
			$extend[] = 'bdSocialShare_XenForo_ControllerPublic_Register';

			// this will cause some other add-on to stop working...
			// We have 9999 execution order for this listener so the impact should
			// be minimal. Also, breaking thing completely will draw enough attention
			// to fix the issue.
			return false;
		}
	}

	public static function init_dependencies(XenForo_Dependencies_Abstract $dependencies, array $data)
	{
		XenForo_Template_Helper_Core::$helperCallbacks['bdsocialshare_getoption'] = array(
			'bdSocialShare_Option',
			'get'
		);

		XenForo_Template_Helper_Core::$helperCallbacks['bdsocialshare_haspermissionfacebook'] = array(
			'bdSocialShare_Option',
			'hasPermissionFacebook'
		);
		XenForo_Template_Helper_Core::$helperCallbacks['bdsocialshare_haspermissiontwitter'] = array(
			'bdSocialShare_Option',
			'hasPermissionTwitter'
		);

		XenForo_Template_Helper_Core::$helperCallbacks['bdsocialshare_isconnectedwith'] = array(
			'bdSocialShare_Template_Helper',
			'isConnectedWith'
		);

		XenForo_Template_Helper_Core::$helperCallbacks['bdsocialshare_checked'] = array(
			'bdSocialShare_Template_Helper',
			'checked'
		);

		XenForo_Template_Helper_Core::$helperCallbacks['bdsocialshare_checkedoptinoptoutoff'] = array(
			'bdSocialShare_Template_Helper',
			'checkedOptInOptOutOff'
		);

		self::$_dependencies = $dependencies;
	}

	public static function visitor_setup(XenForo_Visitor &$visitor)
	{
		$options = $visitor->get('bdsocialshare_options');
		if (!empty($options))
		{
			$visitor['_bdSocialShare_options'] = bdSocialShare_Helper_Common::unserializeOrFalse($options);
		}
		else
		{
			$visitor['_bdSocialShare_options'] = array();
		}

		$visitor['_bdSocialShare_canStaffShare'] = $visitor->hasPermission('general', 'bdSocialShare_staffShare');
	}

	public static function template_create(&$templateName, array &$params, XenForo_Template_Abstract $template)
	{
		switch ($templateName)
		{
			case 'account_preferences':
				$template->preloadTemplate('bdsocialshare_account_preferences_options');
				break;
		}

		if (!empty($params['_bdSocialShare_renderSubView']) AND isset($params['_subView']))
		{
			$params['_subView'] = strval($params['_subView']);
		}

	}

	public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		switch ($hookName)
		{
			case 'account_preferences_options':
				$ourTemplate = $template->create('bdsocialshare_' . $hookName, $template->getParams());
				$contents .= $ourTemplate;
				break;
		}
	}

	public static function file_health_check(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
	{
		$hashes += bdSocialShare_FileSums::getHashes();
	}

}
