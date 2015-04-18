<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__output .= $this->callTemplateHook('ad_above_top_breadcrumb', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
<!--<div class="facebookLike shareControl custom_share_bar">
	';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__output .= '
	<fb:like href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
</div>


<div class="plusone shareControl custom_share_bar">
	<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"></div>
</div>
-->

	';
