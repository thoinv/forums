<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="section">
	<div class="secondaryContent statsList" id="boardStats">
		<h3>' . 'Thống kê diễn đàn' . '</h3>
		<div class="pairsJustified">
			<dl class="discussionCount"><dt>' . 'Đề tài thảo luận' . ':</dt>
				<dd>' . XenForo_Template_Helper_Core::numberFormat($BoardTotals['discussions'], '0') . '</dd></dl>
			<dl class="messageCount"><dt>' . 'Bài viết' . ':</dt>
				<dd>' . XenForo_Template_Helper_Core::numberFormat($BoardTotals['messages'], '0') . '</dd></dl>
			<dl class="memberCount"><dt>' . 'Thành viên' . ':</dt>
				<dd>' . XenForo_Template_Helper_Core::numberFormat($BoardTotals['users'], '0') . '</dd></dl>
			<dl class="mostCount"><dt>' . 'User Record' . ':</dt>
				<dd class="Tooltip" title="' . XenForo_Template_Helper_Core::datetime($BoardTotals['most_users']['time'], '') . '">' . XenForo_Template_Helper_Core::numberFormat($BoardTotals['most_users']['total'], '0') . '</dd></dl>
			<dl><dt>' . 'Thành viên mới nhất' . ':</dt>
				<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($BoardTotals['latestUser'],'',false,array(
'text' => 'rich'
))) . '</dd></dl>
			<!-- slot: forum_stats_extra -->
		</div>
	</div>
</div>';
