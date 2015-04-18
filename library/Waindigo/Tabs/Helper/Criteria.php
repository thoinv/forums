<?php

class Waindigo_Tabs_Helper_Criteria
{

    /**
     * Determines if the given thread matches the criteria.
     *
     * @param array|string $criteria List of criteria, format: [] with keys rule
     * and data; may be serialized
     * @param boolean $matchOnEmpty If true and there's no criteria, true is
     * returned; otherwise, false
     * @param array $thread
     *
     * @return boolean
     */
    public static function threadMatchesCriteria($criteria, $matchOnEmpty = false, array $thread)
    {
        if (!$criteria = XenForo_Helper_Criteria::unserializeCriteria($criteria)) {
            return (boolean) $matchOnEmpty;
        }

        foreach ($criteria as $criterion) {
            $data = $criterion['data'];

            switch ($criterion['rule']) {
                case 'nodes':
                    {
                        if (!isset($thread['node_id'])) {
                            return false;
                        }
                        if (empty($data['node_ids'])) {
                            return false;
                        }
                        if (!in_array($thread['node_id'], $data['node_ids'])) {
                            return false;
                        }
                    }
                    break;

                default:
                    {
                        $eventReturnValue = false;

                        XenForo_CodeEvent::fire('criteria_thread',
                            array(
                                $criterion['rule'],
                                $data,
                                $thread,
                                &$eventReturnValue
                            ));

                        if ($eventReturnValue === false) {
                            return false;
                        }
                    }
            }
        }

        return true;
    } /* END threadMatchesCriteria */

    /**
     * Determines if the given resource matches the criteria.
     *
     * @param array|string $criteria List of criteria, format: [] with keys rule
     * and data; may be serialized
     * @param boolean $matchOnEmpty If true and there's no criteria, true is
     * returned; otherwise, false
     * @param array $resource
     *
     * @return boolean
     */
    public static function resourceMatchesCriteria($criteria, $matchOnEmpty = false, array $resource)
    {
        if (!$criteria = XenForo_Helper_Criteria::unserializeCriteria($criteria)) {
            return (boolean) $matchOnEmpty;
        }

        foreach ($criteria as $criterion) {
            $data = $criterion['data'];

            switch ($criterion['rule']) {
                case 'categories':
                    {
                        if (!isset($resource['resource_category_id'])) {
                            return false;
                        }
                        if (empty($data['category_ids'])) {
                            return false;
                        }
                        if (!in_array($resource['resource_category_id'], $data['category_ids'])) {
                            return false;
                        }
                    }
                    break;

                default:
                    {
                        $eventReturnValue = false;

                        XenForo_CodeEvent::fire('criteria_resource',
                            array(
                                $criterion['rule'],
                                $data,
                                $resource,
                                &$eventReturnValue
                            ));

                        if ($eventReturnValue === false) {
                            return false;
                        }
                    }
            }
        }

        return true;
    } /* END resourceMatchesCriteria */

    /**
     * Determines if the given conversation matches the criteria.
     *
     * @param array|string $criteria List of criteria, format: [] with keys rule
     * and data; may be serialized
     * @param boolean $matchOnEmpty If true and there's no criteria, true is
     * returned; otherwise, false
     * @param array $conversation
     *
     * @return boolean
     */
    public static function conversationMatchesCriteria($criteria, $matchOnEmpty = false, array $conversation)
    {
        if (!$criteria = XenForo_Helper_Criteria::unserializeCriteria($criteria)) {
            return (boolean) $matchOnEmpty;
        }

        foreach ($criteria as $criterion) {
            $data = $criterion['data'];

            switch ($criterion['rule']) {
                case 'from':
                    {
                        if (!isset($data['username'])) {
                            return false;
                        }
                        if (!isset($conversation['username'])) {
                            return false;
                        }
                        if (strcasecmp($data['username'], $conversation['username']) != 0) {
                            return false;
                        }
                    }
                    break;

                default:
                    {
                        $eventReturnValue = false;

                        XenForo_CodeEvent::fire('criteria_conversation',
                            array(
                                $criterion['rule'],
                                $data,
                                $conversation,
                                &$eventReturnValue
                            ));

                        if ($eventReturnValue === false) {
                            return false;
                        }
                    }
            }
        }

        return true;
    } /* END conversationMatchesCriteria */

    /**
     * Determines if the given media matches the criteria.
     *
     * @param array|string $criteria List of criteria, format: [] with keys rule
     * and data; may be serialized
     * @param boolean $matchOnEmpty If true and there's no criteria, true is
     * returned; otherwise, false
     * @param array $media
     *
     * @return boolean
     */
    public static function mediaMatchesCriteria($criteria, $matchOnEmpty = false, array $media)
    {
        if (!$criteria = XenForo_Helper_Criteria::unserializeCriteria($criteria)) {
            return (boolean) $matchOnEmpty;
        }

        foreach ($criteria as $criterion) {
            $data = $criterion['data'];

            switch ($criterion['rule']) {
                case 'categories':
                    {
                        if (!isset($media['category_id'])) {
                            return false;
                        }
                        if (empty($data['category_ids'])) {
                            return false;
                        }
                        if (!in_array($media['category_id'], $data['category_ids'])) {
                            return false;
                        }
                    }
                    break;

                default:
                    {
                        $eventReturnValue = false;

                        XenForo_CodeEvent::fire('criteria_xengallery_media',
                            array(
                                $criterion['rule'],
                                $data,
                                $media,
                                &$eventReturnValue
                            ));

                        if ($eventReturnValue === false) {
                            return false;
                        }
                    }
            }
        }

        return true;
    } /* END mediaMatchesCriteria */

    /**
     * Gets the data that is needed to display a list of criteria options for
     * user selection.
     *
     * @return array
     */
    public static function getDataForMatchCriteriaSelection()
    {
        $data = array(
            'thread' => array(
                'nodes' => XenForo_Model::create('XenForo_Model_Node')->getAllNodes()
            )
        );

        if (XenForo_Application::$versionId >= 1020000) {
            $addOns = XenForo_Application::get('addOns');
        } else {
            /* @var $addOnModel XenForo_Model_AddOn */
            $addOnModel = $this->getModelFromCache('XenForo_Model_AddOn');
            $addOns = $addOnModel->getAllAddOns();
            foreach ($addOns as $addOnId => $addOn) {
                if (!$addOn['active']) {
                    unset($addOns[$addOnId]);
                }
            }
        }

        $isRmInstalled = isset($addOns['XenResource']);
        if ($isRmInstalled) {
            $data['resource'] = array(
                'categories' => XenForo_Model::create('XenResource_Model_Category')->getAllCategories()
            );
        }

        $isXmgInstalled = isset($addOns['XenGallery']);
        if ($isXmgInstalled) {
            /* @var $categoryModel XenGallery_Model_Category */
            $categoryModel = XenForo_Model::create('XenGallery_Model_Category');

            $data['xengallery_media'] = array(
                'categories' => $categoryModel->getAllCategories()
            );
        }

        return $data;
    } /* END getDataForMatchCriteriaSelection */

    /**
     * Gets the data that is needed to display a list of criteria options for
     * user selection.
     *
     * @return array
     */
    public static function getDataForCreateCriteriaSelection()
    {
        $data = array(
            'thread' => array(
                'nodes' => XenForo_Option_NodeChooser::getNodeOptions(0, false, 'Forum')
            )
        );

        if (XenForo_Application::$versionId >= 1020000) {
            $addOns = XenForo_Application::get('addOns');
        } else {
            /* @var $addOnModel XenForo_Model_AddOn */
            $addOnModel = $this->getModelFromCache('XenForo_Model_AddOn');
            $addOns = $addOnModel->getAllAddOns();
            foreach ($addOns as $addOnId => $addOn) {
                if (!$addOn['active']) {
                    unset($addOns[$addOnId]);
                }
            }
        }

        $isRmInstalled = isset($addOns['XenResource']);
        if ($isRmInstalled) {
            $data['resource'] = array(
                'categories' => XenForo_Model::create('XenResource_Model_Category')->getAllCategories()
            );
        }

        $isXmgInstalled = isset($addOns['XenGallery']);
        if ($isXmgInstalled) {
            $data['xengallery_media'] = array(
                'categories' => XenForo_Model::create('XenGallery_Model_Category')->getAllCategories()
            );
        }

        return $data;
    } /* END getDataForCreateCriteriaSelection */
}