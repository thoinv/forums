<?php
class Starvnnet_UrlToImg_BBcode extends XFCP_Starvnnet_UrlToImg_BBcode
{
	public function isImage($url)
	{
		$pos = strrpos( $url, ".");
		if ($pos === false)
		return false;
		$ext = strtolower(trim(substr( $url, $pos)));
		$imgExts = array(".gif", ".jpg", ".jpeg", ".png", ".tiff", ".tif");
		if ( in_array($ext, $imgExts) )
		return true;
		return false;
	}
	
	public function renderTagUrl(array $tag, array $rendererStates)
	{
		if (!empty($tag['option']))
		{
			$url = $tag['option'];
			$text = $this->renderSubTree($tag['children'], $rendererStates);
		}
		else
		{
			$url = $this->stringifyTree($tag['children']);
			$text = urldecode($url);
			if (!preg_match('/./u', $text))
			{
				$text = $url;
			}
			$text = XenForo_Helper_String::censorString($text);

			if (!empty($rendererStates['shortenUrl']))
			{
				$length = utf8_strlen($text);
				if ($length > 100)
				{
					$text = utf8_substr_replace($text, '...', 35, $length - 35 - 45);
				}
			}

			$text = htmlspecialchars($text);
		}

		$url = $this->_getValidUrl($url);
		if (!$url)
		{
			return $text;
		}
		else
		{
			list($class, $target, $type) = XenForo_Helper_String::getLinkClassTarget($url);
			$class = $class ? " class=\"$class\"" : '';
			$target = $target ? " target=\"$target\"" : '';
			if ($type == 'internal')
			{
				$noFollow = '';
			}
			else
			{
				$noFollow = (empty($rendererStates['noFollowDefault']) ? '' : ' rel="nofollow"');
			}

			$url = XenForo_Helper_String::censorString($url);
			
			$test = $this->isImage($url);
			if($test){
				return sprintf($this->_imageTemplate,
					htmlspecialchars($url),
				$rendererStates['lightBox'] ? ' LbImage' : ''
				);
			}

			return $this->_wrapInHtml('<a href="' . htmlspecialchars($url) . '"' . $target . $class . $noFollow . '>', '</a>', $text);
		}
	}

	
}