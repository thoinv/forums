<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'isMiu';
$__compilerVar2 = '';
$__compilerVar2 .= '
		data-normal-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_normaltitlefield_width') . '"
		data-streched-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_stretchedtitlefield_width') . '"
		data-auto="' . 'Auto' . '"
	';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'editor_dialog_fast');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'editor_dialog_advpicasa');
$__compilerVar3 .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advpicasa_sender_src.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advpicasa_sender_src.js');
$__compilerVar3 .= '
';
}
else
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advpicasa_manager.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advpicasa_sender.js');
$__compilerVar3 .= '
';
}
$__compilerVar3 .= '

<form method="post" class="section cust_popup">
	<div id="adv_picasa" class="cust_popup_content fastpicasa ' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" ' . $__compilerVar2 . '>
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
			<input type="submit" id="insert" name="insert" value="' . 'Insert' . '" class="button primary tinyTrigger miuTrigger" />
			<div style="float: right">
				<input type="button" id="cancel" name="cancel" value="' . 'Cancel' . '" class="button close" />
			</div>
		</div>
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
</form>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
