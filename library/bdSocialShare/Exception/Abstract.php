<?php

abstract class bdSocialShare_Exception_Abstract extends XenForo_Exception
{
	public function __construct($message = '[bd] Social Share Exception')
	{
		parent::__construct($message, false);
	}

}
