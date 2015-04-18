<?php

/* Product: sonnb - Prevent Double Post
 * Author: sonnb
 * Version: 1.0.1
 * Released: 19th Jul 2012
 * Website: www.sonnb.com - www.underworldvn.com
 */
class sonnbPreventDoublePost_Model_Thread extends XFCP_sonnbPreventDoublePost_Model_Thread
{

    public function isDoubleThread ( $threadTitle, $threadUserId, $threadForumId, $timeDiff=30 )
    {
        $to = time();
        $from = $to - $timeDiff;
        
        return $this->_getDb ()->fetchRow ( '
			SELECT *
			FROM xf_thread
			WHERE title = ? AND user_id = ? AND node_id = ? AND (post_date BETWEEN ? AND ?)
		', array ($threadTitle, $threadUserId, $threadForumId, $from, $to) );
    }

}

?>
