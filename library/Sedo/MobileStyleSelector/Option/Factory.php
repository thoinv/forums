<?php
class Sedo_MobileStyleSelector_Option_Factory
{
	public static function render_styles(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
	{
		$preparedOption['formatParams'] = XenForo_Model::create('Sedo_MobileStyleSelector_Model_GetStyles')->getStylesOptions($preparedOption['option_value']);
		return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal('option_list_option_radio', $view, $fieldPrefix, $preparedOption, $canEdit);
	}
}
