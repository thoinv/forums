<?php /*00f460e48743ac60109cfc01cb8e0fbb24ae8ddf*/

/**
 * @package    GoodForNothing Notification
 * @version    1.0.2 Alpha 1
 * @since      1.0.1 Beta 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNNotify_Data_Sql_1000111 extends GFNCore_Data_Sql_Abstract
{
    public function install()
    {
        $this->table()->create('gfnnotify_notification', function(GFNCore_Db_Schema_Table_Create $table)
        {
            // Indices...
            $table->primary('notification_hash');

            // Columns...
            $table->string('notification_hash', 40);
        });
    }

    public function uninstall()
    {
        $this->table()->drop('gfnnotify_notification');
    }
} 