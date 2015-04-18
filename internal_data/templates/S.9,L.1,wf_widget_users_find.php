<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'member_list');
$__output .= '

<div class="section widget ' . htmlspecialchars($widget['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '">
	<form action="' . XenForo_Template_Helper_Core::link('members', false, array()) . '" method="post" class="secondaryContent findMember">
		<h3><a href="' . XenForo_Template_Helper_Core::link('online', false, array()) . '" title="' . 'See all online users' . '">' . 'Find Member' . '</a></h3>

		<input type="search" name="username" placeholder="' . 'Name' . '..." results="0" class="textCtrl AutoComplete" data-autoSubmit="true" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
