<?php

class Turki_Adv_Listener extends Turki_Package_Library_EventListeners
{
	public static $containerData = array();

	public static function Advtemplat($templateName, array &$params, XenForo_Template_Abstract $template)
	{
		switch ($templateName) {
			case 'account_preferences':
				$template->preloadTemplate('adv_xenforo_account_options');
				break;
			default:
				$template->preloadTemplate('ads_xf_ar_xenforo');
				break;
		}
	}

	public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		$options          = XenForo_Application::get('options');
		$enableadvxenforo = $options->enableadvxenforo;
		$thread_id = $hookParams['thread']['thread_id'];
		if ($enableadvxenforo) {
			$PermissionEnable = XenForo_Visitor::getInstance()->hasPermission('adv_xenforo', 'adv_xenforo_enable_adv') ? TRUE : FALSE;
			if ($hookName == 'account_preferences_options' && $PermissionEnable) {
				$ourTemplate = $template->create('adv_xenforo_account_options', $template->getparams());
				$rendered    = $ourTemplate->render();
				$contents    = $contents . $rendered;
			}
			$hasPermission = XenForo_Visitor::getInstance()->hasPermission('adv_xenforo', 'adv_xenforo_show') ? TRUE : FALSE;
			$advs          = XenForo_Application::getSimpleCacheData('adv_xenforo');
			$user          = XenForo_Visitor::getInstance()->toArray();
			$enable_adv    = ($PermissionEnable === TRUE) ? $user['enable_adv'] : TRUE;

			$containerData = self::$containerData;
			if (empty(self::$containerData))
				$containerData = XenForo_Template_Public::getExtraContainerData();

			if ($enable_adv) {
				if ($hasPermission === TRUE && $advs["AdvsHook"]) {
					$isMobile = XenForo_Visitor::isBrowsingWith('mobile');
					switch (TRUE) {
						case ($isMobile == TRUE):
							$adv_adv = 'adv_small';
							break;
						default:
							$adv_adv = 'adv_large';
							break;
					}

					foreach ($advs["AdvsHook"] AS $_asv) {
						if ($_asv['active']
							&& XenForo_Helper_Criteria::userMatchesCriteria($_asv['user_criteria'], TRUE, $user)
							&& XenForo_Helper_Criteria::pageMatchesCriteria($_asv['page_criteria'], TRUE, $template->getParams(), $containerData)
						) {
							$ourTemplate = $template->create('ads_xf_ar_xenforo', array('advanced' => $_asv[$adv_adv]));
							$rendered    = $ourTemplate->render();
							if ($hookName == 'message_content' && Turki_Adv_Helper_Criteria::postCriteria($_asv['post_criteria'], TRUE) === FALSE) {
								{
									if($hookParams['message']['thread_id']) {
										$decode = XenForo_Helper_Criteria::prepareCriteriaForSelection($_asv['post_criteria']);
										$position = ($decode['active']['page']) ? $hookParams['message']['position'] % $options->messagesPerPage : $hookParams['message']['position'];
										if ($position == ($decode['active']['post_id'] - 1)) {
											$contents = ($decode['active']['position']) ? Turki_Adv_Helper_Helpers::advhtml($contents, $rendered) : $contents . $rendered;
										}
									}
								}
							}
							else if ($hookName == $_asv['adv_hook_name'] && Turki_Adv_Helper_Criteria::postCriteria($_asv['post_criteria'], TRUE)) {
								$contents = ($_asv['display'] == 'top') ? $rendered . $contents : $contents . $rendered;
							}
						}
					}
				}
			}
			self::_templateHook($hookName,$contents,$hookParams,$template);
		}
	}
}