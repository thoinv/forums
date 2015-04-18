<?php
	
class Dark_PostRating_ControllerAdmin extends XenForo_ControllerAdmin_Abstract
{
	protected function _preDispatch($action)
	{						
		$this->assertAdminPermission('option');
	}
	
	public function actionRecount(){
		
		
		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		
		if ($this->isConfirmedPost())
		{
			$ratingModel->recountRatings();
			
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('postrating')
			);
		}
		else // show confirmation dialog
		{
			return $this->responseView('Dark_PostRating_ViewAdmin_Recount', 'dark_postrating_recount', array());
		}
	}
		
	public function actionSave(){
		$this->_assertPostOnly();
		
		$id = $this->_input->filterSingle('id', XenForo_Input::UINT);
		
		/** @var Dark_PostRating_DataWriter */
		$dw = XenForo_DataWriter::create('Dark_PostRating_DataWriter');
		if($id)
			$dw->setExistingData($id);
		
		$input = $this->_input->filter(array(
				'name'           => XenForo_Input::STRING,
				'title'          => XenForo_Input::STRING,
				'disabled'       => XenForo_Input::BINARY,
				'whitelist_forum_ids'  => XenForo_Input::ARRAY_SIMPLE,
				'whitelist_group_ids'  => XenForo_Input::ARRAY_SIMPLE,
				'whitelisted_forum'    => XenForo_Input::STRING,
				'whitelisted_group'    => XenForo_Input::STRING,
				'op_only'        => XenForo_Input::BINARY,
				'display_order'  => XenForo_Input::UINT,
				'type'           => XenForo_Input::INT,
				'sprite_mode'    => XenForo_Input::UINT,
				'sprite_params'  => array(XenForo_Input::INT, array('array' => true)),
		));
		
		$whitelist = array();
		if($input['whitelisted_forum'] == 'sel')
			$whitelist = $input['whitelist_forum_ids'];
			
		$group_whitelist = array();
		if($input['whitelisted_group'] == 'sel')
			$group_whitelist = $input['whitelist_group_ids'];
		
		$dw->bulkSet(array(
			'name' => $input['name'],
			//'title' => $input['title'],
			'disabled' => $input['disabled'],
			'whitelist' => $whitelist,
			'group_whitelist' => $group_whitelist,
			'op_only' => $input['op_only'],
			'display_order' => $input['display_order'],
			'type' => $input['type'],
			'sprite_mode' => $input['sprite_mode'],
			'sprite_params' => $input['sprite_params'],
		));    
		$dw->setExtraData(Dark_PostRating_DataWriter::DATA_TITLE, $input['title']);
		$dw->save();
			
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::SUCCESS,
			XenForo_Link::buildAdminLink('postrating')
		);
	}
	
	public function actionIndex(){		
		return $this->responseRedirect(
			XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL,
			XenForo_Link::buildAdminLink('postrating/list')
		);
	}
	
	public function actionDelete()
	{
		if ($this->isConfirmedPost())
		{
			return $this->_deleteData(
				'Dark_PostRating_DataWriter', 'id',
				XenForo_Link::buildAdminLink('postrating')
			);
		}
		else // show confirmation dialog
		{
			$id = $this->_input->filterSingle('id', XenForo_Input::UINT);
			
			/** @var Dark_PostRating_Model */
			$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
			$ratings = $ratingModel->getRatings(true);
			
			if(empty($ratings[$id])){
				throw $this->responseException($this->responseError(new XenForo_Phrase('dark_requested_rating_not_found'), 404));
			}			
			
			$viewParams = array(
				'rating' => $ratings[$id]
			);
			return $this->responseView('Dark_PostRating_ViewAdmin_Delete', 'dark_postrating_delete', $viewParams);
		}
	}

	
	public function actionEdit(){
		
		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings();

		$ratingId = $rating = $this->_input->filterSingle('id', XenForo_Input::UINT);
		
		if(!array_key_exists($rating, $ratings))            
			return $this->responseError(new XenForo_Phrase('dark_invalid_rating')); 
			
		$rating = $ratings[$rating];
	
		if(!empty($rating['whitelist']) && count($rating['whitelist']) > 0)
			$rating['whitelisted_forum'] = true;
		else
			$rating['whitelisted_forum'] = false;
			
		if(!empty($rating['group_whitelist']) && count($rating['group_whitelist']) > 0)
			$rating['whitelisted_group'] = true;
		else
			$rating['whitelisted_group'] = false;
			
		$rating['title'] = $ratingModel->getRatingMasterTitlePhraseValue($ratingId);

		$viewParams = array(
			'rating' => $rating,
			'nodes' => $this->_getNodeModel()->getAllNodes(),
			'groups' => $this->_getUserGroupModel()->getAllUserGroups(),
		);
		
		return $this->responseView('Dark_PostRating_ViewAdmin_Edit', 'dark_postrating_edit', $viewParams);	
	}
	
	public function actionAdd(){
		
		$viewParams = array(
			'rating' => array('whitelist' => array(), 'group_whitelist' => array()),
			'nodes' => $this->_getNodeModel()->getAllNodes(),
			'groups' => $this->_getUserGroupModel()->getAllUserGroups(),
		);
		
		return $this->responseView('Dark_PostRating_ViewAdmin_List', 'dark_postrating_edit', $viewParams);    
	}
		
	public function actionList()
	{
		/** @var Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings(true);

		if(empty($ratings))
		{
			return $this->responseError(new XenForo_Phrase('no_results_found'));
		}
		
		foreach($ratings as &$rating){
			if($rating['type'] == -1)
				$rating['type_text'] = new XenForo_Phrase('dark_negative');
			else if($rating['type'] == 1)
				$rating['type_text'] = new XenForo_Phrase('dark_positive');
			else
				$rating['type_text'] = new XenForo_Phrase('dark_neutral');
				
			if((!empty($rating['whitelist']) && count($rating['whitelist']) > 0) || (!empty($rating['group_whitelist']) && count($rating['group_whitelist'])) || $rating['op_only'])
				$rating['whitelisted'] = true;
			else
				$rating['whitelisted'] = false;
				
		}

		$viewParams = array(
			'ratings' => $ratings,
			'totalRatings' => count($ratings),
		);
		
		return $this->responseView('Dark_PostRating_ViewAdmin_List', 'dark_postrating_list', $viewParams);
	}
	
	/**
	 * @return XenForo_Model_Node
	 */
	protected function _getNodeModel()
	{
		return $this->getModelFromCache('XenForo_Model_Node');
	}
	
	/**
	 * @return XenForo_Model_UserGroup
	 */
	protected function _getUserGroupModel()
	{
		return $this->getModelFromCache('XenForo_Model_UserGroup');
	}
}						