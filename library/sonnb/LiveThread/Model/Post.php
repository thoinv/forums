<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

class sonnb_LiveThread_Model_Post extends XFCP_sonnb_LiveThread_Model_Post
{

    public function getPostsInLiveThread($threadId, array $fetchOptions = array())
    {
        $stateLimit = $this->prepareStateLimitFromConditions($fetchOptions, 'post');
        $joinOptions = $this->preparePostJoinOptions($fetchOptions);

        $timestamp = 0;
        if (isset($fetchOptions['timestamp']))
        {
            $timestamp = $fetchOptions['timestamp'];
        }

        return $this->fetchAllKeyed('
			SELECT post.*
				' . $joinOptions['selectFields'] . '
			FROM xf_post AS post
			' . $joinOptions['joinTables'] . '
			WHERE post.thread_id = ?
				AND (' . $stateLimit . ')
                AND (post.post_date > ' . $timestamp . ')
			ORDER BY post.position ASC, post.post_date ASC
		', 'post_id', $threadId);
    }

    public function getPreviousPostsInLiveThread($threadId, array $fetchOptions = array())
    {
        $stateLimit = $this->prepareStateLimitFromConditions($fetchOptions, 'post');
        $joinOptions = $this->preparePostJoinOptions($fetchOptions);

        $postDate = 0;
        if (isset($fetchOptions['post_date']))
        {
            $postDate = $fetchOptions['post_date'];
        }
        
        $cacheKey = 'sonnb_LiveThread_'.md5($threadId.$stateLimit.serialize($joinOptions).$postDate);
        $cacheModel = $this->getModelFromCache('sonnb_LiveThread_Model_Cache');
        
        $returns = $cacheModel->load($cacheKey);
        if (!$returns)
        {
            $returns = $this->fetchAllKeyed($this->limitQueryResults('
                            SELECT post.*
                                    ' . $joinOptions['selectFields'] . '
                            FROM xf_post AS post
                            ' . $joinOptions['joinTables'] . '
                            WHERE post.thread_id = ?
                                    AND (' . $stateLimit . ')
                    AND (post.post_date < ' . $postDate . ')
                    AND post.position > 0
                            ORDER BY post.position DESC, post.post_date DESC
                    ', $fetchOptions['limit']), 'post_id', $threadId);
            
            $cacheModel->save($cacheKey, $returns);
        }
        
        return $returns;
    }

    public function countRemainPostsInLiveThread($threadId, array $fetchOptions = array())
    {
        $stateLimit = $this->prepareStateLimitFromConditions($fetchOptions, 'post');
        $joinOptions = $this->preparePostJoinOptions($fetchOptions);

        $postDate = 0;
        if (isset($fetchOptions['post_date_live_thread']))
        {
            $postDate = $fetchOptions['post_date_live_thread'];
        }

        return $this->_getDb()->fetchOne('
			SELECT COUNT(*)
			FROM xf_post AS post
			' . $joinOptions['joinTables'] . '
			WHERE post.thread_id = ?
				AND (' . $stateLimit . ')
                AND (post.post_date < ' . $postDate . ')
                AND post.position > 0
			ORDER BY post.position ASC, post.post_date ASC
		', $threadId);
    }

    public function getLatestPostsInLiveThread($threadId, array $fetchOptions = array())
    {
        $limitOptions = $this->prepareLimitFetchOptions($fetchOptions);
        $stateLimit = $this->prepareStateLimitFromConditions($fetchOptions, 'post');
        $joinOptions = $this->preparePostJoinOptions($fetchOptions);

        return $this->fetchAllKeyed($this->limitQueryResults('
			SELECT post.*
				' . $joinOptions['selectFields'] . '
			FROM xf_post AS post
			' . $joinOptions['joinTables'] . '
			WHERE post.thread_id = ?
				AND (' . $stateLimit . ')
			ORDER BY post.position DESC, post.post_date DESC
		', $limitOptions['limit']), 'post_id', $threadId);
    }

}