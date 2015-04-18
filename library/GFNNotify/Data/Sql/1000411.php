<?php /*2c0c885a5ec5663ff1bab94624d91472ec35b932*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.4 Beta 1
 * @since      1.0.4 Alpha 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <https://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Data_Sql_1000411 extends GFNCore_Data_Sql_Abstract
{
    public function install()
    {
        $this->table()->alter('xf_user_option', function(GFNCore_Db_Schema_Table_Alter $table)
        {
            $table->boolean('show_notification_popup')->default(1);
        });
    }

    public function uninstall()
    {
        $this->table()->alter('xf_user_option', function(GFNCore_Db_Schema_Table_Alter $table)
        {
            $table->drop('show_notification_popup');
        });
    }
}