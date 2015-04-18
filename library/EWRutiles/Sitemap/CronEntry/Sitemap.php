<?php

class EWRutiles_Sitemap_CronEntry_Sitemap
{
	public static function build()
	{
		XenForo_Model::create('EWRutiles_Sitemap_Model_Sitemap')->buildIndex();
	}
}