<?php

class EWRutiles_Sitemap_ControllerPublic_Sitemap extends XenForo_ControllerPublic_Abstract
{
	public function actionIndex()
	{
		$file = XenForo_Helper_File::getExternalDataPath().'/sitemaps/index.xml';
		
		if (!file_exists($file))
		{
			$this->getModelFromCache('EWRutiles_Sitemap_Model_Sitemap')->buildIndex();
		}
		
		echo file_get_contents($file);
		exit;
	}
}