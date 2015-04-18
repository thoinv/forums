<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
if (isset($forum['Tinhte_XenTag_maximumHashtags']))
{
$__compilerVar1 .= '
	';
$__extraData['head']['Tinhte_XenTag_maximumHashtags'] = '';
$__extraData['head']['Tinhte_XenTag_maximumHashtags'] .= '<script type="text/javascript">
window.Tinhte_XenTag_maximumHashtags = parseInt(\'' . htmlspecialchars($forum['Tinhte_XenTag_maximumHashtags'], ENT_QUOTES, 'UTF-8') . '\');
</script>';
$__compilerVar1 .= '
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
