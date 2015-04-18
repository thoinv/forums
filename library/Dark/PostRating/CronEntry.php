<?php
  
class Dark_PostRating_CronEntry {
	
	public static function runDailyOptimisation(){
		
		$options = XenForo_Application::get('options');
		
		
		// doing this in a daily cron because things like XF upgrades will undo the changes
		
		/// @var XenForo_Model_Phrase
		$phraseModel = XenForo_Model::create('XenForo_Model_Phrase');
				
		/// @var XenForo_DataWriter_Phrase
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("likes", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("trophy_points", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("points", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
		$dw = XenForo_DataWriter::create('XenForo_DataWriter_Phrase');
		$dw->setExistingData($phraseModel->getPhraseInLanguageByTitle("likes_received", 0), true);
		$dw->set('global_cache', 1);
		$dw->save();
	}
	
	
}

