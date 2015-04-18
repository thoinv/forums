<?php

class Nobita_Teams_XenForo_Model_Import extends XFCP_Nobita_Teams_XenForo_Model_Import
{
	public function group_importCategory($oldId, array $import, $writerName, $importMode = true)
	{
		$newId = $this->group_importGroup($oldId, $import, $writerName, 'team_category_id', $importMode);

        XenForo_Model::create('Nobita_Teams_Model_Category')->rebuildCategoryStructure();

		return $newId;
	}

	public function group_importGroup($oldId, array $import, $dwClass, $key, $importMode = true, $returnFullData = false)
    {
        XenForo_Db::beginTransaction();

        $dw = XenForo_DataWriter::create($dwClass, XenForo_DataWriter::ERROR_SILENT);
        if ($importMode)
        {
            $dw->setImportMode(true);
        }
        $dw->bulkSet($import, array('ignoreInvalidFields' => true));

        $newId = false;
        if ($dw->save())
        {
            if ($returnFullData)
            {
                $newId = $dw->getMergedData();
            }
            else
            {
                $newId = $dw->get($key);
            }
        }

        XenForo_Db::commit();

        return $newId;
    }

}