<?php /*4e08019c1c868a6f4edc05646e665cec78638b5c*/

/**
 * @package    GoodForNothing Core
 * @version    1.0.0 Alpha 4
 * @since      1.0.0 Alpha 3
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNCore_Installer_Controller_Uninstall extends GFNCore_Installer_Controller_Abstract
{
    public function execute()
    {
        $installer = $this->_installer;
        $this->callHook('pre_uninstall');

        if ($this->hasSqlData())
        {
            $versions = $this->getAvailableSqlVersions();

            foreach ($versions as $version)
            {
                $class = $installer->getSqlDataClassPrefix() . $version;

                /** @var GFNCore_Installer_Data_Abstract $obj */
                $obj = new $class();
                $this->callHook('uninstall_sql_pre_' . $version, array($obj));
                $obj->uninstall($installer->getExistingData()->version_id);
                $this->callHook('uninstall_sql_post_' . $version, array($obj));
            }
        }

        $this->callHook('post_uninstall');
    }
} 