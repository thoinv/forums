<?php

/**
 * Admin controller for handling actions on leaderboards.
 */
class Waindigo_Leaderboards_ControllerAdmin_Leaderboard extends XenForo_ControllerAdmin_Abstract
{

    /**
     * Shows a list of leaderboards.
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionIndex()
    {
        $leaderboardModel = $this->_getLeaderboardModel();
        $leaderboards = $leaderboardModel->getLeaderboards();
        $viewParams = array(
            'leaderboards' => $leaderboards
        );
        return $this->responseView('Waindigo_Leaderboards_ViewAdmin_Leaderboard_List',
            'waindigo_leaderboard_list_leaderboards', $viewParams);
    } /* END actionIndex */

    /**
     * Helper to get the leaderboard add/edit form controller response.
     *
     * @param array $leaderboard
     *
     * @return XenForo_ControllerResponse_View
     */
    protected function _getLeaderboardAddEditResponse(array $leaderboard)
    {
        $viewParams = array(
            'leaderboard' => $leaderboard,

            'userCriteria' => XenForo_Helper_Criteria::prepareCriteriaForSelection($leaderboard['user_criteria']),
            'userCriteriaData' => XenForo_Helper_Criteria::getDataForUserCriteriaSelection()
        );

        return $this->responseView('Waindigo_Leaderboards_ViewAdmin_Leaderboard_Edit',
            'waindigo_leaderboard_edit_leaderboards', $viewParams);
    } /* END _getLeaderboardAddEditResponse */

    /**
     * Displays a form to add a new leaderboard.
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionAdd()
    {
        $leaderboard = $this->_getLeaderboardModel()->getDefaultLeaderboard();

        return $this->_getLeaderboardAddEditResponse($leaderboard);
    } /* END actionAdd */

    /**
     * Displays a form to edit an existing leaderboard.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionEdit()
    {
        $leaderboardId = $this->_input->filterSingle('leaderboard_id', XenForo_Input::STRING);

        if (!$leaderboardId) {
            return $this->responseReroute('Waindigo_Leaderboards_ControllerAdmin_Leaderboard', 'add');
        }

        $leaderboard = $this->_getLeaderboardOrError($leaderboardId);

        return $this->_getLeaderboardAddEditResponse($leaderboard);
    } /* END actionEdit */

    /**
     * Inserts a new leaderboard or updates an existing one.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionSave()
    {
        $this->_assertPostOnly();

        $leaderboardId = $this->_input->filterSingle('leaderboard_id', XenForo_Input::STRING);

        $input = $this->_input->filter(
            array(
                'title' => XenForo_Input::STRING,
                'order' => XenForo_Input::STRING,
                'user_criteria' => XenForo_Input::ARRAY_SIMPLE,
                'use_cached_value' => XenForo_Input::BOOLEAN,
                'rebuild_frequency' => XenForo_Input::STRING
            ));

        $writer = XenForo_DataWriter::create('Waindigo_Leaderboards_DataWriter_Leaderboard');
        if ($leaderboardId) {
            $writer->setExistingData($leaderboardId);
        }
        $writer->bulkSet($input);
        $writer->save();

        if ($this->_input->filterSingle('reload', XenForo_Input::STRING)) {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::RESOURCE_UPDATED,
                XenForo_Link::buildAdminLink('leaderboards/edit', $writer->getMergedData()));
        } else {
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildAdminLink('leaderboards') . $this->getLastHash($writer->get('leaderboard_id')));
        }
    } /* END actionSave */

    /**
     * Deletes a leaderboard.
     *
     * @return XenForo_ControllerResponse_Abstract
     */
    public function actionDelete()
    {
        $leaderboardId = $this->_input->filterSingle('leaderboard_id', XenForo_Input::STRING);
        $leaderboard = $this->_getLeaderboardOrError($leaderboardId);

        $writer = XenForo_DataWriter::create('Waindigo_Leaderboards_DataWriter_Leaderboard');
        $writer->setExistingData($leaderboard);

        if ($this->isConfirmedPost()) { // delete leaderboard
            $writer->delete();

            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS,
                XenForo_Link::buildAdminLink('leaderboards'));
        } else { // show delete confirmation prompt
            $writer->preDelete();
            $errors = $writer->getErrors();
            if ($errors) {
                return $this->responseError($errors);
            }

            $viewParams = array(
                'leaderboard' => $leaderboard
            );

            return $this->responseView('Waindigo_Leaderboards_ViewAdmin_Leaderboard_Delete',
                'waindigo_leaderboard_delete_leaderboards', $viewParams);
        }
    } /* END actionDelete */

    /**
     * Gets a valid leaderboard or throws an exception.
     *
     * @param string $leaderboardId
     *
     * @return array
     */
    protected function _getLeaderboardOrError($leaderboardId)
    {
        $leaderboard = $this->_getLeaderboardModel()->getLeaderboardById($leaderboardId);
        if (!$leaderboard) {
            throw $this->responseException(
                $this->responseError(new XenForo_Phrase('waindigo_requested_leaderboard_not_found_leaderboards'), 404));
        }

        return $leaderboard;
    } /* END _getLeaderboardOrError */

    /**
     * Get the leaderboards model.
     *
     * @return Waindigo_Leaderboards_Model_Leaderboard
     */
    protected function _getLeaderboardModel()
    {
        return $this->getModelFromCache('Waindigo_Leaderboards_Model_Leaderboard');
    } /* END _getLeaderboardModel */
}