<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="pairsJustified">
	<dl class="discussionCount"><dt>' . 'Đề tài thảo luận' . ':</dt>
		<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['discussions'], '0') . '</dd></dl>
	<dl class="messageCount"><dt>' . 'Bài viết' . ':</dt>
		<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['messages'], '0') . '</dd></dl>
	<dl class="memberCount"><dt>' . 'Thành viên' . ':</dt>
		<dd>' . XenForo_Template_Helper_Core::numberFormat($boardTotals['users'], '0') . '</dd></dl>
	<dl><dt>' . 'Thành viên mới nhất' . ':</dt>
		<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($boardTotals['latestUser'],'',false,array())) . '</dd></dl>
	<!-- slot: forum_stats_extra -->
</div>';
