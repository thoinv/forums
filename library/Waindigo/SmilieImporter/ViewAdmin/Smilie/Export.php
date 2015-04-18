<?php

/**
 * Exports smilies as XML.
 */
class Waindigo_SmilieImporter_ViewAdmin_Smilie_Export extends XenForo_ViewAdmin_Base
{
	public function renderXml()
	{
		$this->setDownloadFileName('smilies.xml');
		return $this->_params['xml']->saveXml();
	} /* END renderXml */ /* Waindigo_SmilieImporter_ViewAdmin_Smilie_Export::renderXml */
}