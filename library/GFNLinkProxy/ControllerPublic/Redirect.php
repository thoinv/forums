<?php /*26f579b8fa3a0d702043d5694ef09e376980d063*/

/**
 * @package    GoodForNothing Link Proxy
 * @version    1.0.2
 * @since      1.0.0 Alpha 1
 * @author     GoodForNothing Labs
 * @copyright  Copyright © 2012-2015 GoodForNothing Labs <http://gfnlabs.com/>
 * @license    https://gfnlabs.com/legal/license
 * @link       https://gfnlabs.com/
 */
class GFNLinkProxy_ControllerPublic_Redirect extends XenForo_ControllerPublic_Abstract
{
    public function actionIndex()
    {
        $options = GFNLinkProxy_Options::getInstance();

        if ($referer = $this->_request->getHeader('referer'))
        {
            if ($options->get('blockInvalidReferrer'))
            {
                if ($host = parse_url($referer, PHP_URL_HOST))
                {
                    if (!in_array($host, array(
                        $this->_request->getServer('SERVER_NAME'),
                        parse_url(XenForo_Application::getOptions()->get('boardUrl'), PHP_URL_HOST)
                    )))
                    {
                        return $this->responseNoPermission();
                    }
                }
            }
        }

        $url = base64_decode($this->_input->filterSingle('to', XenForo_Input::STRING));
        if (!$url)
        {
            return $this->responseNoPermission();
        }

        if (!parse_url($url))
        {
            return $this->responseNoPermission();
        }

        if ($options->get('enableAutoRedirect'))
        {
            if ($options->get('autoRedirectDelay') == 0)
            {
                return $this->responseRedirect(
                    XenForo_ControllerResponse_Redirect::RESOURCE_CANONICAL,
                    $url
                );
            }

            $title = $options->get('autoRedirectTitle');
            $message = $this->_parseMessage($options->get('autoRedirectMessage'), array(
                'board' => XenForo_Application::getOptions()->get('boardTitle'),
                'boardUrl' => XenForo_Application::getOptions()->get('boardUrl'),
                'url' => $url,
                'delay' => '<span class="delay">' . $options->get('autoRedirectDelay') . '</span>'
            ));
        }
        else
        {
            $title = $options->get('title');
            $message = $this->_parseMessage($options->get('message'), array(
                'board' => XenForo_Application::getOptions()->get('boardTitle'),
                'boardUrl' => XenForo_Application::getOptions()->get('boardUrl'),
                'url' => $url
            ));
        }

        $viewParams = array(
            'url' => $url,
            'referer' => $referer ? $referer : XenForo_Application::getOptions()->get('boardUrl'),
            'title' => $title,
            'message' => $message,
            'autoRedirect' => $options->get('enableAutoRedirect'),
            'delay' => $options->get('autoRedirectDelay')
        );

        return $this->responseView(
            'GFNLinkProxy_ViewPublic_Redirect',
            'gfnlinkproxy_redirect',
            $viewParams
        );
    }

    protected function _parseMessage($message, array $values)
    {
        $this->_values = $values;
        return preg_replace_callback('/\{([a-z]+)\}/i', array($this, '_replaceVariables'), $message);
    }

    protected $_values = array();

    protected function _replaceVariables($match)
    {
        if (array_key_exists($match[1], $this->_values))
        {
            return $this->_values[$match[1]];
        }

        return $match[0];
    }
} 