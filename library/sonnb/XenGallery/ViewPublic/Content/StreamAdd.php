<?php

/**
 * @category    XenForo
 * @package     sonnb - XenGallery
 * @version     2.1.3
 * @copyright:  sonnb
 * @link        www.sonnb.com
 * @version     One license is valid for only one nominated domain.
 * @license     You might not copy or redistribute this addon. Any action to public or redistribute must be authorized from author
 */
class sonnb_XenGallery_ViewPublic_Content_StreamAdd extends sonnb_XenGallery_ViewPublic_Abstract
{
	public function renderJson()
	{
		$results = array();
        $content = $this->_params['content'];
		if ($this->_params['newStreams'])
		{
			foreach ($this->_params['newStreams'] AS $stream)
			{
				$results[$stream] = $this->createTemplateObject('sonnb_xengallery_'. $content['content_type'] .'_stream_item', array(
					'stream' => $stream,
					'content' => $this->_params['content']
				));
			}
		}

		return array(
			'streams' => $results
		);
	}
}