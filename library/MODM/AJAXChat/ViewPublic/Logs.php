<?php
class MODM_AJAXChat_ViewPublic_Logs extends XenForo_ViewPublic_Base
{
	public function renderJson()
	{		
		$output = $this->_renderer->getDefaultOutputArray(get_class($this), $this->_params, $this->_templateName);
		$output = array_merge($output, array("lastItemId" => $this->_params['lastItemId']));
		
		return XenForo_ViewRenderer_Json::jsonEncodeForOutput($output);
	}
	
	public function renderXml()
	{
		$document = new DOMDocument('1.0', 'utf-8');
		$document->formatOutput = true;
	
		$rootNode = $document->createElement('form');
		$document->appendChild($rootNode);
		
		return $document->saveXML();
	}
}