<?php
class EWRmedio_MediaCloudWidget extends WidgetFramework_WidgetRenderer {
    protected function _getConfiguration() {
        return array('name' => 'MediaCloud');
    }
    public function parseOptionsInput(XenForo_Input $input, array $widget) {
//        $options = XenForo_Application::get('options');
//        $found = $options->EWRmedio_mediacount;
		if ((!$addon = XenForo_Model::create('XenForo_Model_AddOn')->getAddOnById('EWRmedio')) || empty($addon['active']))
//        if (empty($found))
		{
            throw new XenForo_Exception(new XenForo_Phrase('wf_x_not_installed', array('target' => 'EWRmedio')), true);
        }
        return parent::parseOptionsInput($input, $widget);
    }
    protected function _getOptionsTemplate() {
        return false;
    }
    protected function _getRenderTemplate(array $widget, $positionCode, array $params) {
        return 'EWRblock_MediaCloud';
    }
    protected function _render(array $widget, $positionCode, array $params, XenForo_Template_Abstract $renderTemplateObject) {
        $mediaCloudModel = XenForo_Model::create('EWRmedio_Model_Keywords');

//		$model = XenForo_Model::create('EWRporta_Model_Options');
//		$option = $model->getOptionById('MediaCloud');
		$options = XenForo_Application::get('options');

		$sidebar['keywords'] = $mediaCloudModel->getKeywordCloud($options->EWRmedio_cloudcount, $options->EWRmedio_mincloud, $options->EWRmedio_maxcloud);
		
		if ($options->EWRmedio_animatedcloud && $sidebar['keywords'])
		{
			$sidebar['animated'] = $mediaCloudModel->getAnimatedCloud($sidebar['keywords']);
		}
/*		$limit = $option['limit'];
		$mincloud = $option['mincloud'];
		$maxcloud = $option['maxcloud'];
		$animated = $option['animated'];
		
		$cloud['keywords'] = $mediaCloudModel->getKeywordCloud($limit, $mincloud, $maxcloud);

		if ($animated && $cloud['keywords'])
		{
			$cloud['animated'] = $mediaCloudModel->getAnimatedCloud($cloud['keywords']);
		}*/

        $viewParams = array(
            'MediaCloud'    => $sidebar
        );
        $renderTemplateObject->setParams($viewParams);

        return $renderTemplateObject->render();        
    }
}