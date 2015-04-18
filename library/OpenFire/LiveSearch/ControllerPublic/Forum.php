<?php
class OpenFire_LiveSearch_ControllerPublic_Forum extends XFCP_OpenFire_LiveSearch_ControllerPublic_Forum {
	/* called via forums/ID/live-result */
	public function actionLiveResult() {
		/* Ensure we only post to it */
		$this->_assertPostOnly ();
		
		/* Check if the user can search */
		$canSearch = XenForo_Visitor::getInstance ()->canSearch ();
		
		/* Getting LiveSearch Model */
		$liveSearchModel = $this->getLiveSearchModel ();
		
		/* Getting forum id and name for the ftpHelper */
		$forumId = $this->_input->filterSingle ( 'node_id', XenForo_Input::UINT );
		$forumName = $this->_input->filterSingle ( 'node_name', XenForo_Input::STRING );
		
		/* Setting up the helper to get the forum */
		$ftpHelper = $this->getHelper ( 'ForumThreadPost' );
		$forum = $ftpHelper->assertForumValidAndViewable ( $forumId ? $forumId : $forumName );
		
		/* Now getting the real and valid forumId */
		$forumId = $forum ['node_id'];
		
		/* Getting the Search Query */
		$query = $this->_input->filterSingle ( 'query', XenForo_Input::STRING );
		
		/* Preparing and getting our liveResults from the model */
		$liveResult = array ();
		
		if ($query) {
			$liveResult = $liveSearchModel->getLiveSearch ( $forum, $query );
		}
		
		/* Setting up viewParams */
		$viewParams = array (
				'canSearch' => $canSearch,
				'liveResult' => $liveResult 
		);
		
		/* Returning our View */
		return $this->responseView ( 'OpenFire_LiveSearch_ViewPublic_LiveResults', 'openfire_livesearch', $viewParams );
	}
	
	/* Getting the Model to do searching */
	public function getLiveSearchModel() {
		return $this->getModelFromCache ( 'OpenFire_LiveSearch_Model_LiveSearch' );
	}
}

?>