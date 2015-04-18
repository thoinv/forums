<?php

//class XenPlaza_XPLoveMessage_Model_XPLoveMessage extends XFCP_XenPlaza_XPLoveMessage_DataWriter_XPLoveMessage
class XenPlaza_XPLoveMessage_DataWriter_XPLoveMessage extends XenForo_DataWriter
{
	protected function _getFields()
	{
		return array(
			'xf_love_message' => array(
				'message_id' 	=> array('type' => self::TYPE_UINT, 'autoIncrement' => true),
				'from_user_id' 	=> array('type' => self::TYPE_UINT, 'required' => true),
				'from_username' => array('type' => self::TYPE_STRING, 'required' => true, 'maxLength' => 50, 'default' => ''),
				'to_user_id'  	=> array('type' => self::TYPE_UINT, 'required' => true),
				'to_username' 	=> array('type' => self::TYPE_STRING, 'required' => true, 'maxLength' => 50, 'default' => ''),
				'message'    	=> array('type' => self::TYPE_STRING, 'default' => ''),
				'active'  	=> array('type' => self::TYPE_BOOLEAN, 'default' => 1),
				'message_date'  => array('type' => self::TYPE_UINT, 'default' => XenForo_Application::$time),
			)
		);
	}

    protected function _getExistingData($data)
    {
        if (!$id = $this->_getExistingPrimaryKey($data, 'message_id'))
        {
            return false;
        }
     
        return array('xf_love_message' => $this->_getLoveMessageModel()->getLoveMessageById($id));
    }
    
    protected function _getUpdateCondition($tableName)
    {
        return 'message_id = ' . $this->_db->quote($this->getExisting('message_id'));
    }
	
    protected function _getLoveMessageModel()
    {
        return $this->getModelFromCache ( 'XenPlaza_XPLoveMessage_Model_XPLoveMessage' );
    }
 
}
?>