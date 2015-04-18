<?php /*5a4b5bafce7afee049228fa83e0589a0761d7bfe*/

/**
 * @package    GoodForNothing Link Proxy
 * @version    1.0.1
 * @since      1.0.0 Alpha 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNLinkProxy_Api
{
    public static function preload($link)
    {

    }

    public static function getProxyLink($link)
    {
        if (self::_protocolWhiteListed($link) || self::_domainWhiteListed($link))
        {
            return $link;
        }

        return XenForo_Link::buildPublicLink('full:redirect', null, array(
            'to' => base64_encode($link)
        ));
    }

    protected static function _domainWhiteListed($link)
    {
        static $whiteList = null;

        if ($whiteList === null)
        {
            $whiteList = GFNLinkProxy_Options::getInstance()->get('whiteListDomain');
            $whiteList = preg_split('/\r?\n/', $whiteList, PREG_SPLIT_NO_EMPTY);

            foreach ($whiteList as $k => &$v)
            {
                $v = trim($v);

                if (empty($v))
                {
                    unset($whiteList[$k]);
                }
            }

            $whiteList[] = parse_url(XenForo_Application::getOptions()->get('boardUrl'), PHP_URL_HOST);
        }

        $domain = parse_url($link, PHP_URL_HOST);
        if (!$domain)
        {
            return false;
        }

        foreach ($whiteList as $check)
        {
            if (strpos($domain, $check) !== false)
            {
                return true;
            }
        }

        return false;
    }

    protected static function _protocolWhiteListed($link)
    {
        static $whiteList = null;

        if ($whiteList === null)
        {
            $whiteList = GFNLinkProxy_Options::getInstance()->get('whiteListProtocol');
            $whiteList = preg_split('/\r?\n/', $whiteList, PREG_SPLIT_NO_EMPTY);

            foreach ($whiteList as $k => &$v)
            {
                $v = trim($v);

                if (empty($v))
                {
                    unset($whiteList[$k]);
                }
            }
        }

        foreach ($whiteList as $check)
        {
            if (strpos($link, $check) === 0)
            {
                return true;
            }
        }

        return false;
    }
} 