<?php
/*
 * Forum Runner
 *
 * Copyright (c) 2010-2011 to End of Time Studios, LLC
 *
 * This file may not be redistributed in whole or significant part.
 *
 * http://www.forumrunner.com
 */

class ForumRunner_ControllerPublic_Attachment extends XenForo_ControllerPublic_Attachment
{
    public function actionUploadAttachment ()
    {
	$vals = $this->_input->filter(array(
	    'poststarttime' => XenForo_Input::STRING,
	    'forumid' => XenForo_Input::UINT,
	));

	try {
	    $this->_assertCanUploadAndManageAttachments($vals['poststarttime'], 'post',
		array(
		    'node_id' => $vals['forumid'],
		)
	    );
	} catch (Exception $e) {
	    json_error($e->getControllerResponse()->errorText->render(), RV_UPLOAD_ERROR);
	}

	$contentid = 0;
	$attachment_model = $this->_getAttachmentModel();
	$attachment_handler = $attachment_model->getAttachmentHandler('post');
	$existing = array();

	$new_attachments = $attachment_model->getAttachmentsByTempHash($vals['poststarttime']);
	$max = $attachment_handler->getAttachmentCountLimit();
	if ($max !== true) {
	    $remaining = $max - (count($existing) + count($new));
	    if ($remaining <= 0) {
		$error = new XenForo_Phrase('you_may_not_upload_more_files_with_message');
		json_error($error->render(), RV_UPLOAD_ERROR);
	    }
	}

	$cons = $attachment_model->getAttachmentConstraints();

	$file = XenForo_Upload::getUploadedFile('attachment');
	if (!$file) {
	    $error = new XenForo_Phrase('do_not_have_permission');
	    json_error($error->render(), RV_UPLOAD_ERROR);
	}

	$file->setConstraints($cons);
	if (!$file->isValid()) {
	    $error_text = '';
	    foreach ($file->getErrors() as $error) {
		$error_text .= $error->render() . "\n";
	    }
	    json_error($error_text, RV_UPLOAD_ERROR);
	}
	$dataid = $attachment_model->insertUploadedAttachmentData($file, XenForo_Visitor::getUserId());
	$attachmentid = $attachment_model->insertTemporaryAttachment($dataid, $vals['poststarttime']);

	return array(
	    'attachmentid' => $attachmentid,
	);
    }

    public function actionDeleteAttachment ()
    {
	$vals = $this->_input->filter(array(
	    'attachmentid' => XenForo_Input::UINT,
	    'poststarttime' => XenForo_Input::STRING,
	));

        try {
            $attachment = $this->_getAttachmentOrError($vals['attachmentid']);
	} catch (Exception $e) {
	    $error = new XenForo_Phrase('do_not_have_permission');
	    json_error($error->render());
	}
	if (!$this->_getAttachmentModel()->canDeleteAttachment($attachment, $vals['poststarttime'])) {
	    $error = new XenForo_Phrase('do_not_have_permission');
	    json_error($error->render());
	}

	$dw = XenForo_DataWriter::create('XenForo_DataWriter_Attachment');
	$dw->setExistingData($attachment, true);
	$dw->delete();

	return array('success' => true);
    }

    protected function _postDispatch ($controllerResponse, $controllerName, $action) {}
    protected function _checkCsrf ($action) {}
}
