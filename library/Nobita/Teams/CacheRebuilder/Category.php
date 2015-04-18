<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_CacheRebuilder_Category extends XenForo_CacheRebuilder_Abstract
{
	public function getRebuildMessage()
	{
		return new XenForo_Phrase('Teams_categories');
	}
	
	public function showExitLink()
	{
		return true;
	}
	
	public function rebuild($position = 0, array &$options = array(), &$detailedMessage = '')
	{
		$options['batch'] = max(1, isset($options['batch']) ? $options['batch'] : 10);

		/* @var $categoryModel Nobita_Teams_Model_Category */
		$categoryModel = XenForo_Model::create('Nobita_Teams_Model_Category');

		$categories = $categoryModel->getAllCategories();

		XenForo_Db::beginTransaction();

		foreach ($categories AS $category)
		{
			$position++;

			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Category', XenForo_DataWriter::ERROR_SILENT);
			if ($dw->setExistingData($category, true))
			{
				$dw->rebuildCounters();
				$dw->save();
			}
		}

		XenForo_Db::commit();

		$detailedMessage = XenForo_Locale::numberFormat($position);

		return true;
	}

}