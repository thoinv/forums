<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (isset($forum['Tinhte_XenTag_maximumHashtags']))
{
$__output .= '
	';
$__extraData['head']['Tinhte_XenTag_maximumHashtags'] = '';
$__extraData['head']['Tinhte_XenTag_maximumHashtags'] .= '<script type="text/javascript">
window.Tinhte_XenTag_maximumHashtags = parseInt(\'' . htmlspecialchars($forum['Tinhte_XenTag_maximumHashtags'], ENT_QUOTES, 'UTF-8') . '\');
</script>';
$__output .= '
';
}
