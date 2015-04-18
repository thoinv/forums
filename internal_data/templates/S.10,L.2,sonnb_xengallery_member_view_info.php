<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($user['sonnb_xengallery_album_count'])
{
$__output .= '<dl><dt>' . 'Albums' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/authors', $user, array()) . '">' . XenForo_Template_Helper_Core::numberFormat($user['sonnb_xengallery_album_count'], '0') . '</a></dd></dl>';
}
$__output .= '
';
if ($user['sonnb_xengallery_photo_count'])
{
$__output .= '<dl><dt>' . 'Photos' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/photos', $user, array()) . '">' . XenForo_Template_Helper_Core::numberFormat($user['sonnb_xengallery_photo_count'], '0') . '</a></dd></dl>';
}
$__output .= '
';
if ($user['sonnb_xengallery_video_count'])
{
$__output .= '<dl><dt>' . 'Videos' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/videos', $user, array()) . '">' . XenForo_Template_Helper_Core::numberFormat($user['sonnb_xengallery_video_count'], '0') . '</a></dd></dl>';
}
