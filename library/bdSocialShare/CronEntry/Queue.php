<?php

class bdSocialShare_CronEntry_Queue
{
	public static function run()
	{
		if (XenForo_Application::$versionId > 1020000)
		{
			// turn off itself...
			// for XenForo 1.2+, we will use deferred system
			$dw = XenForo_DataWriter::create('XenForo_DataWriter_CronEntry');
			$dw->setExistingData('bdSocialShare_runQueue');
			$dw->set('active', 0);
			$dw->save();
		}
		else
		{
			XenForo_Model::create('bdSocialShare_Model_ShareQueue')->runQueue();
		}
	}
}
