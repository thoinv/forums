<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Bài viết mới';
$__output .= '

<div class="section">
';
if ($visitor['user_id'] AND !$days AND !$recent)
{
$__output .= '
	' . 'Bạn có không có bài viết chưa đọc. Bạn có thể <a href="' . XenForo_Template_Helper_Core::link('find-new/posts', '', array(
'recent' => '1'
)) . '" rel="nofollow">xem tất cả các bài viết mới nhất</a> để thay thế.' . '
';
}
else
{
$__output .= '
	' . 'Không tìm thấy.' . '
';
}
$__output .= '
</div>';
