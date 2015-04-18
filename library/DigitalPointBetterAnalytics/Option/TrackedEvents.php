<?php

abstract class DigitalPointBetterAnalytics_Option_TrackedEvents
{
	/**
	 * Renders the tracked events list.
	 *
	 * @param XenForo_View $view View object
	 * @param string $fieldPrefix Prefix for the HTML form field name
	 * @param array $preparedOption Prepared option info
	 * @param boolean $canEdit True if an "edit" link should appear
	 *
	 * @return XenForo_Template_Abstract Template object
	 */
	public static function renderOption(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$preparedOption['extraChoices'] = array();

		$selectable = DigitalPointBetterAnalytics_Helper_Api::check();

		$preparedOption['formatParams'] = array(
			array('name' => 'options[dpAnalyticsEvents][user_engagement]', 'label' => new XenForo_Phrase('user_engagement'), 'selected' => @$preparedOption['option_value']['user_engagement']),
			array('name' => 'options[dpAnalyticsEvents][content]', 'label' => new XenForo_Phrase('content_being_created'), 'selected' => @$preparedOption['option_value']['content']),
			array('name' => 'options[dpAnalyticsEvents][emails]', 'label' => new XenForo_Phrase('emails_sent_opened'), 'selected' => @$preparedOption['option_value']['emails'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][attachment]', 'label' => new XenForo_Phrase('attachment_views'), 'selected' => @$preparedOption['option_value']['attachment'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][links]', 'label' => new XenForo_Phrase('clicks_on_external_links'), 'selected' => @$preparedOption['option_value']['links'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][registration]', 'label' => new XenForo_Phrase('user_registrations'), 'selected' => @$preparedOption['option_value']['registration'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][moderator]', 'label' => new XenForo_Phrase('moderator_actions'), 'selected' => @$preparedOption['option_value']['moderator'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][report]', 'label' => new XenForo_Phrase('reports'), 'selected' => @$preparedOption['option_value']['report'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][warning]', 'label' => new XenForo_Phrase('warnings'), 'selected' => @$preparedOption['option_value']['warning'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][ajax_requests]', 'label' => new XenForo_Phrase('ajax_requests'), 'selected' => @$preparedOption['option_value']['ajax_requests']),
			array('name' => 'options[dpAnalyticsEvents][ajax_error]', 'label' => new XenForo_Phrase('js_errors'), 'selected' => @$preparedOption['option_value']['ajax_error'], 'unselectable' => !$selectable),
			array('name' => 'options[dpAnalyticsEvents][js_error]', 'label' => new XenForo_Phrase('ajax_errors'), 'selected' => @$preparedOption['option_value']['js_error'], 'unselectable' => !$selectable)
		);

		$preparedOption['explain'] = (!$selectable ? '<style> .unselectable{opacity:0.5} </style>' . new XenForo_Phrase('some_options_not_available_for_unlicensed') : '');

		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal(
			'option_list_option_checkbox',
			$view, $fieldPrefix, $preparedOption, $canEdit
		);
	}
}