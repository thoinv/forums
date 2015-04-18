<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'editor_dialog_fast');
$__output .= '
';
$this->addRequiredExternal('css', 'editor_dialog_advarticle');
$__output .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advarticle_manager_src.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advarticle_sender_src.js');
$__output .= '
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advarticle_manager.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advarticle_sender.js');
$__output .= '
';
}
$__output .= '


<form method="post" class="section cust_popup">
	<div id="adv_article" class="cust_popup_content fastarticle ' . htmlspecialchars($miu, ENT_QUOTES, 'UTF-8') . '" ' . $miudatas . '>
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
