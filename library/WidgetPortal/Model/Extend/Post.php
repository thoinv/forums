<?php
/**
 * @title Widget Portal Extended Post Model
 * @package WidgetPortal
 */

class WidgetPortal_Model_Extend_Post extends XenForo_Model_Post
{
    /**
     * Gets the attachments that belong to the given posts,
     * either by specified id or through as they are pulled, and merges them in with
     * their parent post (in the attachments key). The attachments key will not be
     * set if no attachments are found for the post.
     *
     * @param array $posts
     *
     * @param array $options Pass in limit => 1 to limit the number of attachments to return. If it isn't specified all will be returned.
     * @return array Posts, with attachments added where necessary
     */
    public function getAndMergeAttachmentsIntoPostData( array $posts, $options = array() )
    {
        $postIds = array();

        foreach( $posts AS $postId => $post )
        {
            if( $post['attach_count'] )
            {
                $postIds[] = $postId;
            }
        }

        if( $postIds )
        {
            $attachmentModel = $this->_getAttachmentModel();
            $attachments = $attachmentModel->getAttachmentsByContentIds( 'post', $postIds );
            $groupedAttachments = $this->groupAttachmentsByContentId( $attachments );

            foreach( $groupedAttachments AS $group )
            {
                if( isset( $options['limit'] ) )
                {
                    $limit = (int) $options['limit'];
                }
                else
                {
                    $limit = count( $group );
                }

                // This pains me but easier than trying to force a for loop here.
                $i = 0;
                foreach( $group as $attachment )
                {
                    if( $i >= $limit )
                    {
                        break;
                    }

                    $posts[$attachment['content_id']]['attachments'][$attachment['attachment_id']] = $attachmentModel->prepareAttachment( $attachment );
                    $i++;
                }
            }
        }

        return $posts;
    }

    protected function groupAttachmentsByContentId( $attachments )
    {
        $groupedAttachments = array();
        foreach( $attachments as $attachment )
        {
            $groupedAttachments[$attachment['content_id']][] = $attachment;
        }
        return $groupedAttachments;
    }
}