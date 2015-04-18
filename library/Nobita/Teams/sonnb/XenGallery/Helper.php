<?php

class Nobita_Teams_sonnb_XenGallery_Helper
{
	public static function getAlbumSort(&$order, &$orderDirection, &$defaultOrder = null, &$defaultOrderDirection = null)
	{
		$xenOptions = XenForo_Application::getOptions();

		$defaultOrder = $xenOptions->sonnbXG_sortAlbum;

		switch ($defaultOrder)
		{
			case 'content_count':
			case 'album_date':
			case 'comment_count':
			case 'view_count':
			case 'likes':
			case 'recently_liked':
			case 'album_updated_date':
				$defaultOrderDirection = 'desc';
				break;
			default:
				$defaultOrder = 'album_updated_date';
				$defaultOrderDirection = 'desc';
				break;
		}

		$orderCookie = XenForo_Helper_Cookie::getCookie('sonnbXG_album_order');

		if (empty($order))
		{
			if ($orderCookie === false)
			{
				$order = $defaultOrder;
				XenForo_Helper_Cookie::setCookie('sonnbXG_album_order', $order);
			}
			else
			{
				$order = $orderCookie;
			}
		}
		elseif ($orderCookie !== $order)
		{
			XenForo_Helper_Cookie::setCookie('sonnbXG_album_order', $order);
		}
		switch ($order)
		{
			case 'content_count':
			case 'album_date':
			case 'comment_count':
			case 'view_count':
			case 'likes':
			case 'recently_liked':
			case 'album_updated_date':
				$defaultOrderDirection = 'desc';
				break;
			default:
				$defaultOrderDirection = 'desc';
				break;
		}

		if (empty($orderDirection))
		{
			$orderDirection = $defaultOrderDirection;
		}
	}

	public static function getContentSort(&$order, &$orderDirection, &$defaultOrder = null, &$defaultOrderDirection = null)
	{
		$xenOptions = XenForo_Application::getOptions();

		$defaultOrder = $xenOptions->sonnbXG_sortPhoto;

		switch ($defaultOrder)
		{
			case 'content_updated_date':
			case 'content_date':
			case 'comment_count':
			case 'view_count':
			case 'likes':
			case 'recently_liked':
				$defaultOrderDirection = 'desc';
				break;
			case 'position':
			default:
				$defaultOrder = 'position';
				$defaultOrderDirection = 'asc';
				break;
		}

		$orderCookie = XenForo_Helper_Cookie::getCookie('sonnbXG_content_order');

		if (empty($order))
		{
			if ($orderCookie === false)
			{
				$order = $defaultOrder;
				XenForo_Helper_Cookie::setCookie('sonnbXG_content_order', $order);
			}
			else
			{
				$order = $orderCookie;
			}
		}
		elseif ($orderCookie !== $order)
		{
			XenForo_Helper_Cookie::setCookie('sonnbXG_content_order', $order);
		}

		switch ($order)
		{
			case 'content_updated_date':
			case 'content_date':
			case 'comment_count':
			case 'view_count':
			case 'likes':
			case 'recently_liked':
				$defaultOrderDirection = 'desc';
				break;
			case 'position':
			default:
				$defaultOrderDirection = 'asc';
				break;
		}

		if (empty($orderDirection))
		{
			$orderDirection = $defaultOrderDirection;
		}
	}
}