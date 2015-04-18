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
$this->addRequiredExternal('css', 'editor_dialog_advenc');
$__compilerVar6 .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advenc_manager_src.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advenc_sender_src.js');
$__compilerVar6 .= '
';
}
else
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advenc_manager.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advenc_sender.js');
$__compilerVar6 .= '
';
}
$__compilerVar6 .= '

<form method="post" class="section cust_popup">
	<div id="adv_enc" class="cust_popup_content fastlatex ' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" ' . $__compilerVar5 . '>
		<h1 class="heading cust_heading">' . 'Text Box Insertion Panel' . '</h1>

      		<div class="secondaryContent">
      	' . 'Title:' . ' <input id="ctrl_title" name="title" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_normaltitlefield_width') . '" value="' . 'Auto' . '" />
      	' . 'Width:' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /> <input id="ctrl_widthtype" name="widthtype" type="text" class="textCtrl" style="width:15px" readonly="true" value="%" />
      		</div>

      		<div class="primaryContent">
      			<ul id="selectlist">
      			<li>
      				<ul id="skins">
      					<li class="active"><div id="skin1">' . 'Skin 1' . '</div></li>
      					<li><div id="skin2">' . 'Skin 2' . '</div></li>
      				</ul>
      				<input id="ctrl_skin" name="skin" type="hidden" value="skin1" />
      			</li>
      			<li>
      				<ul id="float">
      					<li><div id="fleft">' . 'Float left' . '</div></li>
      					<li class="active"><div id="fright">' . 'Float right' . '</div></li>
      				</ul>
      				<input id="ctrl_float" name="float" type="hidden" value="fright" />
      			</li>
      			</ul>
      		</div>

      		<div class="secondaryContent">
      			' . 'Type your text here' . '
      			<textarea name="text" id="ctrl_text" style="display: block; width: 98%; height: 72px; resize: none" class="textCtrl caption mceFocus miuFocus"></textarea>
      			
      			<p class="info">' . 'Information:' . ' <span>' . 'This text box is a float element, so to display correctly it must be inserted before the main text block' . '</span></p>
      		</div>


		<div class="sectionFooter">
			<div style="float: right">
				<input type="button" id="cancel" name="cancel" value="' . 'Hủy bỏ' . '" class="button close" />
			</div>
			<input type="submit" id="insert" name="insert" value="' . 'Chèn' . '" class="button primary tinyTrigger miuTrigger" />
		</div>
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
</form>';
$__output .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
