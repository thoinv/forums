<?php

abstract class Nobita_Teams_Importer_Abstract extends XenForo_Importer_Abstract
{
	protected $_teamDwName 		= 'Nobita_Teams_DataWriter_Team';
	protected $_categoryDwName 	= 'Nobita_Teams_DataWriter_Category';
	protected $_memberDwName 	= 'Nobita_Teams_DataWriter_Member';


	public function getSteps()
	{
		return array(
			'categories' => array(
				'title' => new XenForo_Phrase('Teams_import_categories')
			),
			'groups' => array(
				'title' => new XenForo_Phrase('Teams_import_groups'),
				'depends' => array('categories')
			),
			'members' => array(
				'title' => new XenForo_Phrase('Teams_import_members'),
				'depends' => array('groups')
			)
		);
	}

}