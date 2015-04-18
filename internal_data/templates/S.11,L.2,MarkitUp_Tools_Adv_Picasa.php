<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar4 = '';
$__compilerVar4 .= 'isMiu';
$__compilerVar5 = '';
$__compilerVar5 .= '
		data-normal-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_normaltitlefield_width') . '"
		data-streched-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_stretchedtitlefield_width') . '"
		data-auto="' . 'Auto' . '"
	';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'editor_dialog_fast');
$__compilerVar6 .= '
';
$this->addRequiredExternal('css', 'editor_dialog_advpicasa');
$__compilerVar6 .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advpicasa_sender_src.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advpicasa_sender_src.js');
$__compilerVar6 .= '
';
}
else
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advpicasa_manager.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advpicasa_sender.js');
$__compilerVar6 .= '
';
}
$__compilerVar6 .= '

<form method="post" class="section cust_popup">
	<div id="adv_picasa" class="cust_popup_content fastpicasa ' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" ' . $__compilerVar5 . '>
		<h1 class="heading cust_heading">' . 'Picasa Sideshow Insertion Panel' . '</h1>
		<div id="topbox" class="secondaryContent">
			<div id="picasa_src">' . 'Picasa url:' . ' <input id="ctrl_src" name="source" type="text" class="textCtrl mceFocus miuFocus" style="width:385px" value="" /></div>
			<div id="picasa_options">
				<span id="picasa_width" class="picasa_option">' . 'Width:' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /></span> <span id="widthpx">px</span>
				<span id="picasa_height" class="picasa_option">' . 'Height:' . ' <input id="ctrl_height" name="height" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /></span> <span id="heightpx">px</span>
				<span id="picasa_int" class="picasa_option">' . 'Interval:' . ' <input id="ctrl_int" name="interval" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /></span> <span id="int_sec">' . 'second(s)' . '</span>
			</div>
		</div>
		<div class="sectionFooter">
			<input type="submit" id="insert" name="insert" value="' . 'Chèn' . '" class="button primary tinyTrigger miuTrigger" />
			<div style="float: right">
				<input type="button" id="cancel" name="cancel" value="' . 'Hủy bỏ' . '" class="button close" />
			</div>
		</div>
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
</form>';
$__output .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
