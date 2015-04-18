<?php /*36ec1fad87742b77829d93d1f4f09a40bfdc746f*/

/**
 * @package    GoodForNothing Core
 * @version    1.0.0 Alpha 4
 * @since      1.0.0 Alpha 4
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <https://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNCore_Installer_Handler_Style extends GFNCore_Installer_Handler_Abstract
{
    public function handle($addOnId)
    {
        try
        {
            $addOnId = strtolower($addOnId);
            $root = XenForo_Application::getInstance()->getRootDir() . '/styles';
            if ((!$root = realpath($root)) || !is_dir($root))
            {
                return;
            }

            $source = $root . '/default/' . $addOnId;
            if ((!$source = realpath($source)) || !is_dir($source))
            {
                return;
            }

            $available = GFNCore_Helper_Directory::read($root, false);

            foreach ($available as $i => $path)
            {
                if (is_dir($path) && (basename($path) != 'default'))
                {
                    $target = $path . '/' . $addOnId;
                    GFNCore_Helper_Directory::copy($source, $target);
                }
            }
        }
        catch (Exception $e) { XenForo_Error::logException($e, false); }
    }
}