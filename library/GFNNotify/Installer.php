<?php /*5d3c1da457d3c1dc0876617c838efa479e22a066*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.2 Alpha 1
 * @since      1.0.1 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Installer extends GFNCore_Installer_Abstract
{
    public function getVersionId()
    {
        return 1000673;
    }

    public function getSqlDataPath()
    {
        return realpath(dirname(__FILE__) . '/Data/Sql');
    }

    public function getSqlDataClassPrefix()
    {
        return 'GFNNotify_Data_Sql_';
    }
} 