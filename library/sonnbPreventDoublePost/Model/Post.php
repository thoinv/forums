<?php

/* Product: sonnb - Prevent Double Post
 * Author: sonnb
 * Version: 1.0.0
 * Released: 18th Jun 2012
 * Website: www.sonnb.com - www.underworldvn.com
 */
class sonnbPreventDoublePost_Model_Post extends XFCP_sonnbPreventDoublePost_Model_Post
{

    public function isDoublePost ( $postMessage, $postUserId, $threadId, $timeDiff=30 )
    {
        $to = time();
        $from = $to - $timeDiff;
        return $this->_getDb ()->fetchRow ( '
			SELECT *
			FROM xf_post
			WHERE message = ? AND user_id = ? AND thread_id = ? AND (post_date BETWEEN ? AND ?)
		', array ($postMessage, $postUserId, $threadId, $from, $to) );
    }

}

?>
