<?php

/**
 *
 * @see XenForo_Model_Smilie
 */
class Waindigo_SmilieImporter_Extend_XenForo_Model_Smilie extends XFCP_Waindigo_SmilieImporter_Extend_XenForo_Model_Smilie
{
	/**
	 * Gets the XML representation of a smilie, including customized templates.
	 *
	 * @param array $smilie
	 *
	 * @return DOMDocument
	 */
	public function getSmilieImporterXml(array $smilies)
	{
		$document = new DOMDocument('1.0', 'utf-8');
		$document->formatOutput = true;

		$rootNode = $document->createElement('smilies');
		foreach ($smilies as $smilie) {
			$smilieNode = $document->createElement('smilie');
			$this->_appendSmilieXml($smilieNode, $smilie);
			$rootNode->appendChild($smilieNode);
		}

		$document->appendChild($rootNode);

		return $document;
	} /* END getSmilieImporterXml */

	/**
	 * @param DOMElement $rootNode
	 * @param array $smilie
	 */
	protected function _appendSmilieXml(DOMElement $rootNode, $smilie)
	{
		$document = $rootNode->ownerDocument;

		if ($smilie['sprite_params']) {
			$spriteParams = unserialize($smilie['sprite_params']);
		} else {
			$spriteParams = array('w'=>'','h'=>'','x'=>'','y'=>'');
		}
		$rootNode->setAttribute('y', $spriteParams['y']);
		$rootNode->setAttribute('x', $spriteParams['x']);
		$rootNode->setAttribute('h', $spriteParams['h']);
		$rootNode->setAttribute('w', $spriteParams['w']);
		$rootNode->setAttribute('sprite_mode', $smilie['sprite_mode']);

		$titleNode = $document->createElement('title');
		$rootNode->appendChild($titleNode);
		$titleNode->appendChild(XenForo_Helper_DevelopmentXml::createDomCdataSection($document, $smilie['title']));

		$titleNode = $document->createElement('image_url');
		$rootNode->appendChild($titleNode);
		$titleNode->appendChild(XenForo_Helper_DevelopmentXml::createDomCdataSection($document, $smilie['image_url']));

		$titleNode = $document->createElement('smilie_text');
		$rootNode->appendChild($titleNode);
		$titleNode->appendChild(XenForo_Helper_DevelopmentXml::createDomCdataSection($document, $smilie['smilie_text']));
	} /* END _appendSmilieXml */ /* END Waindigo_SmilieImporter_Extend_XenForo_Model_Smilie::appendSmilieXml */

	/**
	 * Imports a smilie XML file.
	 *
	 * @param SimpleXMLElement $document
	 * @param string $smilieGroupId
	 * @param integer $overwriteSmilieId
	 *
	 * @return array List of cache rebuilders to run
	 */
	public function importSmiliesXml(SimpleXMLElement $document, $overwrite = 0)
	{
		if ($document->getName() != 'smilies') {
			throw new XenForo_Exception(new XenForo_Phrase('waindigo_provided_file_is_not_valid_smilie_xml_smilieimporter'), true);
		}

		$smilies = XenForo_Helper_DevelopmentXml::fixPhpBug50670($document->smilie);
		$db = $this->_getDb();
		/* @var $smilie SimpleXMLElement */
		XenForo_Db::beginTransaction($db);
		foreach ($smilies as $smilie) {
			$smilieText = XenForo_Helper_DevelopmentXml::processSimpleXmlCdata($smilie->smilie_text);
			$existing = $this->getSmiliesByText($smilieText);
			$updateText = array();
			foreach ($existing AS $text => $existingSmilie) {
				if ($overwrite) {
					if (isset($updateText[$existingSmilie['smilie_id']])) {
						$existingSmilie['smilie_text'] = $updateText[$existingSmilie['smilie_id']];
					}
					$existingSmilie['smilie_text'] = preg_split('/\R/m', $existingSmilie['smilie_text']);
					unset($existingSmilie['smilie_text'][array_search($text, $existingSmilie['smilie_text'])]);
					if (!empty($existingSmilie['smilie_text'])) {
						$updateText[$existingSmilie['smilie_id']] = implode(PHP_EOL, $existingSmilie['smilie_text']);
					} else {
						$dw = XenForo_DataWriter::create('XenForo_DataWriter_Smilie', XenForo_DataWriter::ERROR_SILENT);
						$dw->setExistingData($existingSmilie['smilie_id']);
						$dw->delete();
					}
				} else {
					$smilieText = preg_split('/\R/m', $smilieText);
					if (in_array($text, $smilieText)) unset($smilieText[array_search($text, $smilieText)]);
					$smilieText = implode(PHP_EOL, $smilieText);
					if (!trim($smilieText)) continue;
				}
			}
			foreach ($updateText as $smilieId => $updateTextItem)
			{
				$dw = XenForo_DataWriter::create('XenForo_DataWriter_Smilie', XenForo_DataWriter::ERROR_SILENT);
				$dw->setExistingData($smilieId);
				$dw->set('smilie_text', $updateTextItem);
				$dw->save();
			}
			if (!trim($smilieText)) {
			    continue;
			}
			$dw = XenForo_DataWriter::create('XenForo_DataWriter_Smilie', XenForo_DataWriter::ERROR_SILENT);
			$spriteParams = array(
				'h'=>(string)$smilie['h'],
				'w'=>(string)$smilie['w'],
				'x'=>(string)$smilie['x'],
				'y'=>(string)$smilie['y']
			);
			$dw->bulkSet(array(
				'title' => XenForo_Helper_DevelopmentXml::processSimpleXmlCdata($smilie->title),
				'image_url' => XenForo_Helper_DevelopmentXml::processSimpleXmlCdata($smilie->image_url),
				'smilie_text' => $smilieText,
				'sprite_mode' => (string)$smilie['sprite_mode'],
				'sprite_params' => $spriteParams,
			));
			$dw->save();
		}
		XenForo_Db::commit($db);
	} /* END importSmiliesXml */
}