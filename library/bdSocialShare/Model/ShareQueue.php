<?php

class bdSocialShare_Model_ShareQueue extends XenForo_Model
{
	public function canQueue()
	{
		$optionDeferred = bdSocialShare_Option::get('deferred');
		return !empty($optionDeferred);
	}

	public function insertQueue(bdSocialShare_Shareable_Abstract $shareable, array $targets, $default, array $viewingUser = null, array $options = array())
	{
		$shareableRecoveryData = $shareable->getRecoveryData();
		if (empty($shareableRecoveryData))
		{
			return false;
		}

		$options = array_merge(array('queueDate' => 0), $options);

		$this->standardizeViewingUserReference($viewingUser);

		$queueDate = $options['queueDate'];
		if (empty($queueDate))
		{
			$queueDate = $shareable->getQueueDate($this);
		}
		if (empty($queueDate))
		{
			$queueDate = XenForo_Application::$time;
		}

		if (is_callable(array(
			'XenForo_Application',
			'defer'
		)))
		{
			XenForo_Application::defer('bdSocialShare_Deferred_ShareQueue', array(), 'bdSocialShare_ShareQueue', false, $queueDate + 1);
		}

		$this->_getDb()->insert('xf_bdsocialshare_share_queue', array(
			'queue_data' => serialize(array(
				'shareable' => $shareableRecoveryData,
				'targets' => $targets,
				'default' => $default,
				'user_id' => $viewingUser['user_id'],
			)),
			'queue_date' => $queueDate
		));

		return true;
	}

	public function reInsertQueue(array $queueRecord, $queueDate)
	{
		if (is_callable(array(
			'XenForo_Application',
			'defer'
		)))
		{
			XenForo_Application::defer('bdSocialShare_Deferred_ShareQueue', array(), 'bdSocialShare_ShareQueue', false, $queueDate + 1);
		}

		$this->_getDb()->update('xf_bdsocialshare_share_queue', array('queue_date' => $queueDate), array('share_queue_id = ?' => $queueRecord['share_queue_id']));
	}

	public function publish(bdSocialShare_Shareable_Abstract $shareable, array $targets, $default, array $viewingUser = null)
	{
		$this->standardizeViewingUserReference($viewingUser);
		$publisherModel = $this->_getPublisherModel();
		$recoveryTargets = array();

		foreach ($targets as $target => $targetId)
		{
			try
			{
				$publisherModel->publish($target, $targetId, $shareable, $viewingUser);
			}
			catch (bdSocialShare_Exception_Abstract $e)
			{
				$isRecoverable = $publisherModel->isRecoverable($target, $targetId, $shareable, $viewingUser, $e);

				if (XenForo_Application::debugMode() OR !$isRecoverable)
				{
					XenForo_Error::logException($e, false);
				}

				if ($isRecoverable)
				{
					$recoveryTargets[$target] = $targetId;
				}
			}
		}

		$publisherModel->postPublish($shareable, $default, $viewingUser);

		if (!empty($recoveryTargets))
		{
			$shareableRecoveryData = $shareable->getRecoveryData();

			if (!empty($shareableRecoveryData))
			{
				$publisherModel->saveRecoveryData($shareableRecoveryData, $recoveryTargets, $viewingUser);
			}
		}
	}

	public function hasQueue()
	{
		$res = $this->_getDb()->fetchOne('
			SELECT MIN(share_queue_id)
			FROM xf_bdsocialshare_share_queue
			WHERE queue_date < ?
		', array(XenForo_Application::$time));
		return (bool)$res;
	}

	public function getQueueAt($queueDate)
	{
		return $this->fetchAllKeyed('
				SELECT *
				FROM xf_bdsocialshare_share_queue
				WHERE queue_date = ?
			', 'share_queue_id', array($queueDate));
	}

	public function getQueue($limit = 20)
	{
		return $this->fetchAllKeyed($this->limitQueryResults('
				SELECT *
				FROM xf_bdsocialshare_share_queue
				WHERE queue_date < ?
				ORDER BY queue_date
			', $limit), 'share_queue_id', array(XenForo_Application::$time));
	}

	public function runQueue($targetRunTime = 0)
	{
		$s = microtime(true);
		$db = $this->_getDb();

		do
		{
			$queue = $this->getQueue($targetRunTime ? 20 : 0);

			foreach ($queue AS $id => $record)
			{
				if (!$db->delete('xf_bdsocialshare_share_queue', 'share_queue_id = ' . $db->quote($id)))
				{
					// already been deleted - run elsewhere
					continue;
				}

				$data = bdSocialShare_Helper_Common::unserializeOrFalse($record, 'queue_data');
				if (empty($data) OR empty($data['shareable']))
				{
					if (XenForo_Application::debugMode())
					{
						XenForo_Error::logException(new XenForo_Exception('Insufficient data'), false);
					}

					continue;
				}

				$shareable = bdSocialShare_Shareable_Abstract::createFromRecoveryData($data['shareable']);
				if (empty($shareable))
				{
					if (XenForo_Application::debugMode())
					{
						XenForo_Error::logException(new XenForo_Exception('Unable to create shareable from recovery data'), false);
					}

					return false;
				}

				$userModel = $this->getModelFromCache('XenForo_Model_User');
				if (!empty($data['user_id']))
				{
					$viewingUser = $userModel->getVisitingUserById($data['user_id']);
				}
				else
				{
					$viewingUser = $userModel->getVisitingGuestUser();
				}
				if (empty($viewingUser))
				{
					if (XenForo_Application::debugMode())
					{
						XenForo_Error::logException(new XenForo_Exception('User could not be found'), false);
					}

					return false;
				}
				$userModel->bdSocialShare_prepareViewingUser($viewingUser);

				$this->publish($shareable, $data['targets'], !empty($data['default']), $viewingUser);

				if ($targetRunTime && microtime(true) - $s > $targetRunTime)
				{
					$queue = false;
					break;
				}
			}
		}
		while ($queue);

		return $this->hasQueue();
	}

	/**
	 * @return bdSocialShare_Model_Publisher
	 */
	protected function _getPublisherModel()
	{
		return $this->getModelFromCache('bdSocialShare_Model_Publisher');
	}

}
