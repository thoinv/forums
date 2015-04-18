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
$this->addRequiredExternal('css', 'editor_dialog_advbimg');
$__compilerVar3 .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advbimg_manager_src.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advbimg_sender_src.js');
$__compilerVar3 .= '
';
}
else
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advbimg_manager.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advbimg_sender.js');
$__compilerVar3 .= '
';
}
$__compilerVar3 .= '

<form method="post" class="section cust_popup">
	<div id="adv_bimg" class="cust_popup_content fastbimg ' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" ' . $__compilerVar2 . '>
		<h1 class="heading cust_heading">' . 'Bimg Insertion Panel' . '</h1>
		<div id="formbox">

			<div class="secondaryContent">
				<ul id="options_width">
					<li class="global">
						<span id="url_phrase">' . 'URL:' . '</span> <input id="ctrl_src" name="src" type="text" class="textCtrl mceFocus miuFocus" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_urlfield_width') . '" />
						' . 'Width:' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /> <input id="ctrl_widthtype" name="widthtype" type="text" class="textCtrl" style="width:15px" readonly="true" value="px" />
					</li>
		
				</ul>
			</div>
		
			<div class="primaryContent">
				<div id="options_float">
					<ul id="float_select">
						<li id="normalSelect" class="normal active"><div class="img"></div><span id="normalText">' . 'Normal left' . '</span><span id="centerText" class="hidden">' . 'Normal center' . '</span><span id="rightText" class="hidden">' . 'Normal right' . '</span></li>
						<li class="fleft"><div class="img"></div><span>' . 'Float Left' . '</span></li>
						<li class="fright"><div class="img"></div><span>' . 'Float Right' . '</span></li>
					</ul>
					<p class="info">' . 'Information:' . ' <span>' . 'When using a float block, this block element (bbcode) must be inserted before the text block.' . '</span></p>
					<input id="ctrl_float" name="float" type="hidden" value="normal"/>
				</div>		
			</div>
		
			<div id="trigger_caption" class="subHeading">' . 'To use a caption, click here' . '</div>
			<div id="caption_content">
				<div class="secondaryContent">
					' . 'Type your caption here:' . '
					<textarea name="caption" id="ctrl_caption" style="display: block; width: 98%; height: 30px; resize: none" class="textCtrl caption"></textarea>
				</div>
		
				<div class="primaryContent">
					<div id="caption_position">
						<ul id="caption_select">
							<li class="bottom_out active"><div class="img"></div><span>' . 'Bottom out' . '</span></li>
							<li class="top_out"><div class="img"></div><span>' . 'Top out' . '</span></li>
							<li class="bottom_in"><div class="img"></div><span>' . 'Bottom in' . '</span></li>
							<li class="top_in"><div class="img"></div><span>' . 'Top in' . '</span></li>
						</ul>
		
						<input id="ctrl_caption_position" name="captionposition" type="hidden" value="bottom_out"/>
					</div>
				</div>
		
				<div class="secondaryContent">
					' . 'Text-align:' . '
					<select name="type" id="ctrl_caption_align" class="textCtrl">
						<option value="left">' . 'Left' . '</option>
						<option value="center">' . 'Center' . '</option>
						<option value="right">' . 'Right' . '</option>
					</select>
				</div>
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
