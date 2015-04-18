<?php

class Turki_Adv_ViewAdmin_Hooks_Export extends XenForo_ViewAdmin_Base
{
	/**
	 * Render the exported date to XML.
	 *
	 * @return string
	 */
	public function renderXml()
	{
		$this->setDownloadFileName('hooks.xml');
		return $this->_params['xml']->saveXml();
	}
}