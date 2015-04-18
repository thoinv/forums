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
$this->addRequiredExternal('css', 'editor_dialog_advarticle');
$__compilerVar3 .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advarticle_manager_src.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advarticle_sender_src.js');
$__compilerVar3 .= '
';
}
else
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advarticle_manager.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advarticle_sender.js');
$__compilerVar3 .= '
';
}
$__compilerVar3 .= '


<form method="post" class="section cust_popup">
	<div id="adv_article" class="cust_popup_content fastarticle ' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" ' . $__compilerVar2 . '>
		<h1 class="heading cust_heading">' . 'Article Insertion Panel' . '</h1>
		<div id="formbox">
			<div class="secondaryContent">
				' . 'Type your article here' . '
				<textarea name="text" id="ctrl_text" style="display: block; width: 98%; height: 176px; resize: none" class="textCtrl caption mceFocus miuFocus"></textarea>
				<input id="ctrl_src" name="source" type="text" class="textCtrl" style="width: 80px" value="' . 'Source' . '" /><span id="option">' . '(Optional)' . '</span>
				<input id="ctrl_src_phrase" name="source_phrase" type="hidden" value="' . 'Source' . '" />
			</div>
		</div>
		<div class="sectionFooter">
      			<div style="float: right">
      				<input type="button" id="cancel" name="cancel" value="' . 'Cancel' . '" class="button close" />
      			</div>
      			<input type="submit" id="insert" name="insert" value="' . 'Insert' . '" class="tinyTrigger miuTrigger button primary" />
      		</div>
      		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
</form>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
