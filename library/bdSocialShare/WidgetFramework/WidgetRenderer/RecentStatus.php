<?php

class bdSocialShare_WidgetFramework_WidgetRenderer_RecentStatus extends XFCP_bdSocialShare_WidgetFramework_WidgetRenderer_RecentStatus
{
	protected static $_data = array();

	public function prepare(array $widget, $positionCode, array $params, XenForo_Template_Abstract $template)
	{
		$template->preloadTemplate('bdsocialshare_buttons_short');
		self::$_data[$widget['widget_id']] = array(
			$template,
			$params
		);

		return parent::prepare($widget, $positionCode, $params, $template);
	}

	public function extraPrepare(array $widget, &$html)
	{
		if (isset(self::$_data[$widget['widget_id']]))
		{
			list($template, $params) = self::$_data[$widget['widget_id']];

			$ourTemplate = $template->create('bdsocialshare_buttons_short', $params);
			$ourTemplate->setParam('_bdSocialShare_optionId', 'status');
			$ourHtml = $ourTemplate->render();

			// this was kept for backward compatibility
			$html = str_replace('<!-- bdsocialshare_wf_widget_recent_status -->', $ourHtml, $html, $count);

			if ($count == 0)
			{
				// [bd] Widget Framework v2.5.9+
				$html = str_replace('<!-- bdsocialshare_wf_widget_profile_posts -->', $ourHtml, $html, $count);
			}
		}

		return parent::extraPrepare($widget, $html);
	}

}
