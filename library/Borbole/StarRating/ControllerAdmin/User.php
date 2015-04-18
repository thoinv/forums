<?php

//######################## Star Rating Threads By Borbole ###########################
class Borbole_StarRating_ControllerAdmin_User extends XFCP_Borbole_StarRating_ControllerAdmin_User
{
    /**
	 * Deletes the specified user 's thread ratings that he/she has made
	 *
	 * @return XenForo_ControllerResponse_Abstract
	 */
	public function actionDeleteRatings()
	{
		$userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
		$user = $this->_getUserOrError($userId);

		if ($user['is_admin'] || $user['is_moderator'])
		{
			return $this->responseNoPermission();
		}

		if ($this->isConfirmedPost())
		{
			/** @var $model Borbole_StarRating_Model_Rating */
			$model = $this->getModelFromCache('Borbole_StarRating_Model_Rating');
			//Delete all user's thread ratings
			$model->deleteRatingsByUser($user['user_id']);
			
            //Redirect to user edit page
			return $this->responseRedirect(
				XenForo_ControllerResponse_Redirect::SUCCESS,
				XenForo_Link::buildAdminLink('users/edit', $user)
			);
		}

		return $this->responseView('XenForo_ViewAdmin_User_RatingsDelete', 'user_thread_ratings_delete', array(
			'user' => $user
		));
	}
}