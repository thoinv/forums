<?php

class TPUSigPic_DataWriterUser extends XFCP_TPUSigPic_DataWriterUser
{
	protected function _getFields()
	{
		$result=parent::_getFields();
		
		$result['xf_user']['sigpic_date'] = array('type' => self::TYPE_UINT, 'default' => 0);
		
		return $result;
	}
	
	protected function _postDelete()
	{
		$userId = $this->get('user_id');
		parent::_postDelete();		
		$this->getModelFromCache('TPUSigPic_Model_SigPic')->deleteSigPic($userId, false);
	}
}