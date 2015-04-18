<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $content['message']
)) . '</div>
<dl class="secondaryContent pairsInline">
	<dt>' . 'Receiving Member' . ':</dt>
	<dd><a href="' . XenForo_Template_Helper_Core::link('members', array(
'user_id' => $content['profile_user_id'],
'username' => $content['profile_username']
), array()) . '">' . htmlspecialchars($content['profile_username'], ENT_QUOTES, 'UTF-8') . '</a></dd>
</dl>';
