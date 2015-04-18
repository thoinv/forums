<?php

class bdSocialShare_Deferred_ShareQueue extends XenForo_Deferred_Abstract
{
	public function execute(array $deferred, array $data, $targetRunTime, &$status)
	{
		/* @var $queueModel bdSocialShare_Model_ShareQueue */
		$queueModel = XenForo_Model::create('bdSocialShare_Model_ShareQueue');

		$hasMore = $queueModel->runQueue($targetRunTime);
		if ($hasMore)
		{
			return $data;
		}
		else
		{
			return false;
		}
	}
}