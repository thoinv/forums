<?php
/**
 * @package     Nobita Social Groups Nulled by HQCoder
 * @author      Nobita
 * @nuller		Congngheaz
 * @link        http://www.congngheaz.com/forums/Xenforo-addon-nulled-free/
 * @copyright   (c) 2015 AZ Technologies, Inc. All rights reserved!
 */

/*====================================================================*\
 || ################################################################## ||
|| #               Copyright 2015 AZ Technologies, Inc.              # ||
|| #                      All Rights Reserved.                       # ||
||  ################################################################## ||
\*====================================================================*/
class Nobita_Teams_BbCode_Formatter_Comment extends XenForo_BbCode_Formatter_Base
{
	public function getTags()
	{
		return array(
			'url' => array(
				'parseCallback' => array($this, 'parseValidatePlainIfNoOption'),
				'callback' => array($this, 'renderTagUrl'),
			),

			'user' => array(
				'hasOption' => true,
				'stopSmilies' => true,
				'callback' => array($this, 'renderTagUser')
			)
		);
	}
}