<?php

class bdSocialShare_XI_Blog_Model_Draft extends XFCP_bdSocialShare_XI_Blog_Model_Draft
{
	protected $_bdSocialShare_publishPendingDrafts_entries = array();
	protected $_bdSocialShare_publishPendingDrafts_drafts = array();

	public function publishPendingDrafts()
	{
		$GLOBALS[bdSocialShare_Listener::XI_BLOG_MODEL_DRAFT_PUBLISH_PENDING] = $this;

		$response = parent::publishPendingDrafts();

		/* @var $publisherModel bdSocialShare_Model_Publisher */
		$publisherModel = $this->getModelFromCache('bdSocialShare_Model_Publisher');

		/* @var $userModel XenForo_Model_User */
		$userModel = $this->getModelFromCache('XenForo_Model_User');

		foreach ($this->_bdSocialShare_publishPendingDrafts_drafts as $hash => &$draftDw)
		{
			$entryDw = &$this->_bdSocialShare_publishPendingDrafts_entries[$hash];

			$scheduled = bdSocialShare_Helper_Common::unserializeOrFalse($draftDw->get('bdsocialshare_scheduled'));
			if (!empty($scheduled) AND !empty($scheduled['targets']))
			{
				if (empty($users[$entryDw->get('user_id')]))
				{
					$users[$entryDw->get('user_id')] = $userModel->getVisitingUserById($entryDw->get('user_id'));
					$users[$entryDw->get('user_id')] = $userModel->prepareUser($users[$entryDw->get('user_id')]);
					$users[$entryDw->get('user_id')]['permissions'] = XenForo_Permission::unserializePermissions($users[$entryDw->get('user_id')]['global_permission_cache']);
				}

				if (!empty($users[$entryDw->get('user_id')]))
				{
					$shareable = new bdSocialShare_Shareable_XI_Blog_Entry($entryDw);

					$publisherModel->publishScheduled($scheduled, $shareable, $users[$entryDw->get('user_id')]);

					$publisherModel->postPublish($shareable, false, $users[$entryDw->get('user_id')]);
				}
			}
		}

		return $response;
	}

	public function bdSocialShare_publishPendingDrafts_entryPostSave(XI_Blog_DataWriter_Discussion_Entry $entryDw)
	{
		$entry = $entryDw->getMergedData();
		$hash = $this->_bdSocialShare_publishPendingDrafts_getHash($entry);

		$this->_bdSocialShare_publishPendingDrafts_entries[$hash] = $entryDw;
	}

	public function bdSocialShare_publishPendingDrafts_draftPostDelete(XI_Blog_DataWriter_Discussion_Draft $draftDw)
	{
		$draft = $draftDw->getMergedData();
		$hash = $this->_bdSocialShare_publishPendingDrafts_getHash($draft);

		if (isset($this->_bdSocialShare_publishPendingDrafts_entries[$hash]))
		{
			$this->_bdSocialShare_publishPendingDrafts_drafts[$hash] = $draftDw;
		}
	}

	protected function _bdSocialShare_publishPendingDrafts_getHash(array $entryOrDraft)
	{
		$data = array();

		$data[] = $entryOrDraft['member_blog_id'];
		$data[] = $entryOrDraft['category_id'];
		$data[] = $entryOrDraft['title'];
		$data[] = $entryOrDraft['user_id'];
		$data[] = $entryOrDraft['username'];
		$data[] = $entryOrDraft['message'];

		return md5(implode('', $data));
	}

}
