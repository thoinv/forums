<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($user['sonnb_xengallery_album_count'])
{
$__output .= '<dt>' . 'Albums' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/authors', $user, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::numberFormat($user['sonnb_xengallery_album_count'], '0') . '</a></dd>';
}
$__output .= '
';
if ($user['sonnb_xengallery_photo_count'])
{
$__output .= '<dt>' . 'Photos' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/photos', $user, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::numberFormat($user['sonnb_xengallery_photo_count'], '0') . '</a></dd>';
}
$__output .= '
';
if ($user['sonnb_xengallery_video_count'])
{
$__output .= '<dt>' . 'Videos' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/videos', $user, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::numberFormat($user['sonnb_xengallery_video_count'], '0') . '</a></dd>';
}
