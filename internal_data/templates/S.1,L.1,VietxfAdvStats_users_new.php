<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="VietXfAdvStats_SectionItem VietXfAdvStats_User">
	<div class="VietXfAdvStats_SectionItemBlock VietXfAdvStats_SectionItemTitle VietXfAdvStats_UserName">
		' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '
	</div>
	<div class="VietXfAdvStats_SectionItemBlock VietXfAdvStats_SectionItemInfo VietXfAdvStats_UserRegisterDate">
		' . XenForo_Template_Helper_Core::date($user['register_date'], '') . '
	</div>
</div>';
