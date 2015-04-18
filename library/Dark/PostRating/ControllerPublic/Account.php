<?php
 
class Dark_PostRating_ControllerPublic_Account extends XFCP_Dark_PostRating_ControllerPublic_Account {
	
	public function actionRatingsReceived(){						
		
		/* @var $likeModel XenForo_Model_Like */
		$likeModel = $this->getModelFromCache('XenForo_Model_Like'); 
		/* @var $ratingModel Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings();          

		$userId = XenForo_Visitor::getUserId();

		$page = $this->_input->filterSingle('page', XenForo_Input::UINT);
		$perPage = 20;

		$ratingsUser = $ratingModel->getRatingsForContentUser($userId, array(
			'page' => $page,
			'perPage' => $perPage
		));
		$ratingsUser = $likeModel->addContentDataToLikes($ratingsUser);
		
		foreach($ratingsUser as &$ratingUser){			
			$oldRating = $ratingUser['rating'];
			$ratingUser = $ratingUser + $ratingUser['content'];
			if(empty($ratingUser['rating']))
				$ratingUser['rating'] = $oldRating;				
			if(array_key_exists($ratingUser['rating'], $ratings)){
				$ratingUser['rating'] = $ratings[$ratingUser['rating']];
			}
		}

		$viewParams = array(
			'ratings' => $ratingsUser,

			'totalRatings' => $ratingModel->countRatingsForContentUser($userId),
			'page' => $page,
			'ratingsPerPage' => $perPage
		);

		return $this->_getWrapper(
			'alerts', 'ratingsReceived',
			$this->responseView('Dark_ViewPublic_Account_RatingsReceived', 'dark_postrating_account_ratings_received', $viewParams)
		);
		
	}
	
	public function actionRatingsGiven(){
		
		/* @var $likeModel XenForo_Model_Like */
		$likeModel = $this->getModelFromCache('XenForo_Model_Like'); 
		/* @var $ratingModel Dark_PostRating_Model */
		$ratingModel = $this->getModelFromCache('Dark_PostRating_Model');
		$ratings = $ratingModel->getRatings();          

		$userId = XenForo_Visitor::getUserId();

		$page = $this->_input->filterSingle('page', XenForo_Input::UINT);
		$perPage = 20;

		$ratingsUser = $ratingModel->getRatingsByContentUser($userId, array(
			'page' => $page,
			'perPage' => $perPage
		));
		$ratingsUser = $likeModel->addContentDataToLikes($ratingsUser);
		
		foreach($ratingsUser as &$ratingUser){
			$oldRating = $ratingUser['rating'];
			$ratingUser = $ratingUser['content'] + $ratingUser;
			if(empty($ratingUser['rating']))
				$ratingUser['rating'] = $oldRating;
			if(array_key_exists($ratingUser['rating'], $ratings)){
				$ratingUser['rating'] = $ratings[$ratingUser['rating']];
			}
		}

		$viewParams = array(
			'ratings' => $ratingsUser,

			'totalRatings' => $ratingModel->countRatingsByContentUser($userId),
			'page' => $page,
			'ratingsPerPage' => $perPage
		);

		return $this->_getWrapper(
			'alerts', 'ratingsGiven',
			$this->responseView('Dark_ViewPublic_Account_RatingsGiven', 'dark_postrating_account_ratings_given', $viewParams)
		);
		
	}
}





