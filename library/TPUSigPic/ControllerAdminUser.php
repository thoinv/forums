<?php

class TPUSigPic_ControllerAdminUser extends XFCP_TPUSigPic_ControllerAdminUser
{
	public function actionSave()
	{
		$result=parent::actionSave();
		
		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
		if ($userId)
		{
			$user = $this->_getUserOrError($userId);
			$doRemove = $this->_input->filterSingle('remove_sigpic', XenForo_Input::UINT);
			
			if ($doRemove==1)
			{
				XenForo_Model::create('TPUSigPic_Model_SigPic')->deleteSigPic($userId, true);
			}
		}
		
		return $result;
	}
}