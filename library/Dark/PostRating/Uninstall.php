<?php


class Dark_PostRating_Uninstall
{
	private static $_instance;
	protected $_db;

	public static final function getInstance()
	{						
		if (!self::$_instance)
		{
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	protected function _getDb()
	{
		if ($this->_db === null)
		{
			$this->_db = XenForo_Application::get('db');
		}

		return $this->_db;
	}
	
	public static function uninstall($addOnData)
	{
		$startVersionId = $addOnData['version_id'];
		$endVersionId = 1;

		$uninstall = self::getInstance();

		for ($i = $startVersionId; $i >= $endVersionId; $i--)
		{
			$method = '_uninstallVersion' . $i;
			if (method_exists($uninstall, $method) === false)
			{
				continue;
			}

			$uninstall->$method();
		}

	}

	protected function _uninstallVersion1()
	{
		$db = $this->_getDb();

		$db->query("delete from xf_content_type_field where content_type='postrating'");
		$db->query("delete from xf_content_type where content_type='postrating'");
		$db->query("delete from xf_stats_daily where stats_type = 'postrating'");
	}
	
	protected function _uninstallVersion27()
	{
		$db = $this->_getDb();		
		
		/// @var XenForo_Model_Phrase
		$phraseModel = XenForo_Model::create('XenForo_Model_Phrase');
				
		/// @var XenForo_DataWriter_Phrase
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("likes", 0), true);
		$dw->set('global_cache', 0);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("trophy_points", 0), true);
		$dw->set('global_cache', 0);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("points", 0), true);
		$dw->set('global_cache', 0);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("likes_received", 0), true);
		$dw->set('global_cache', 0);
		$dw->save();
	}
}






