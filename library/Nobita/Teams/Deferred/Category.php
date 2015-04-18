<?php

class Nobita_Teams_Deferred_Category extends XenForo_Deferred_Abstract
{
	public function execute(array $deferred, array $data, $targetRunTime, &$status)
	{
		/* @var $categoryModel Nobita_Teams_Model_Category */
		$categoryModel = XenForo_Model::create('Nobita_Teams_Model_Category');

		$categories = $categoryModel->getAllCategories();

		foreach ($categories AS $category)
		{
			$dw = XenForo_DataWriter::create('Nobita_Teams_DataWriter_Category', XenForo_DataWriter::ERROR_SILENT);
			if ($dw->setExistingData($category, true))
			{
				$dw->rebuildCounters();
				$dw->save();
			}
		}

		return true;
	}

	public function canCancel()
	{
		return true;
	}

}