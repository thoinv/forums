<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $content['message']
)) . '</div>
';
if ($content['channel'])
{
$__output .= '
<dl class="secondaryContent pairsInline">
    <dt>' . 'Channel' . '</dt>
    <dd>' . htmlspecialchars($content['channel'], ENT_QUOTES, 'UTF-8') . '</dd>
</dl>
';
}
