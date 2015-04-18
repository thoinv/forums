<?php

class DigitalPointAdPositioning_ControllerPublic_Thread extends XFCP_DigitalPointAdPositioning_ControllerPublic_Thread
{

	public function actionQuickUpdate()
	{
		$return = parent::actionQuickUpdate();

		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);

		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);

		$threadModel = $this->_getThreadModel();

		$input = $this->_input->filter(array(
			'block_adsense' => XenForo_Input::UINT,
		));

		$set = $this->_input->filterSingle('set', XenForo_Input::ARRAY_SIMPLE, array('array' => true));

		$dwInput = array();

		if (isset($set['block_adsense']) && $threadModel->canLockUnlockThread($thread, $forum))
		{
			// *should* do this by extending thread DataWriter, but really don't want the overhead of more event listeners just to make this one query "more clean"...
			XenForo_Application::getDb()->query('
				UPDATE xf_thread
					SET block_adsense = ?
				WHERE thread_id = ?
			', array($input['block_adsense'], $threadId));			
		}

		return $return;
	}

	
	/**
	 * Updates an existing thread.
	 *
	 * @return XenForo_ControllerResponse_Abstract
	 */
	public function actionSave()
	{
		$return = parent::actionSave();
			
		$threadId = $this->_input->filterSingle('thread_id', XenForo_Input::UINT);
	
		$ftpHelper = $this->getHelper('ForumThreadPost');
		list($thread, $forum) = $ftpHelper->assertThreadValidAndViewable($threadId);
	
		$this->_assertCanEditThread($thread, $forum);
	
		$dwInput = $this->_input->filter(array(
			'block_adsense' => XenForo_Input::UINT,
		));
	
		$threadModel = $this->_getThreadModel();
	
		if ($threadModel->canLockUnlockThread($thread, $forum))
		{
			// *should* do this by extending thread DataWriter, but really don't want the overhead of more event listeners just to make this one query "more clean"...
			XenForo_Application::getDb()->query('
				UPDATE xf_thread
					SET block_adsense = ?
				WHERE thread_id = ?
			', array($dwInput['block_adsense'], $threadId));			
			
		}

		return $return;	
	}
	
	
	
}