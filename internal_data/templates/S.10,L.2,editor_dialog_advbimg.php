<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!DOCTYPE html>
<html class="editorPopup">
<head>
	<title>' . 'Bimg Insertion Panel' . '</title>

	<link rel="stylesheet" href="css.php?css=xenforo,public,form&amp;style=' . urlencode($_styleId) . '&amp;d=' . htmlspecialchars($visitorStyle['last_modified_date'], ENT_QUOTES, 'UTF-8') . '" />
	<!--XenForo_Require:CSS-->
	
	';
$__compilerVar2 = '';
$__compilerVar2 .= '	<script src="' . htmlspecialchars($jQuerySource, ENT_QUOTES, 'UTF-8') . '"></script>	
	';
if ($jQuerySource != $jQuerySourceLocal)
{
$__compilerVar2 .= '
		<script>if (!window.jQuery) { document.write(\'<scr\'+\'ipt type="text/javascript" src="' . htmlspecialchars($jQuerySourceLocal, ENT_QUOTES, 'UTF-8') . '"><\\/scr\'+\'ipt>\'); }</script>
	';
}
if ($xenOptions['uncompressedJs'] == 1 OR $xenOptions['uncompressedJs'] == 3)
{
$__compilerVar2 .= '
	<script src="' . htmlspecialchars($javaScriptSource, ENT_QUOTES, 'UTF-8') . '/jquery/jquery.xenforo.rollup.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
$__compilerVar2 .= '	
	<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/xenforo/xenforo.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>
';
if ($forum['node_id'] > 0)
{
$__compilerVar2 .= '<script>XenForo.node_name=\'' . XenForo_Template_Helper_Core::jsEscape($forum['title'], 'double') . ' (' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . ')\';</script>';
}
$__compilerVar2 .= '
<!--XenForo_Require:JS-->';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
	<script> jQuery.extend(true, XenForo, { _csrfToken: "' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" }); </script>
	
	';
$this->addRequiredExternal('js', 'js/tinymce/tiny_mce_popup.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advbimg_manager.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advbimg_sender.js');
$__output .= '

	';
$this->addRequiredExternal('css', 'editor_dialog');
$__output .= '
	';
$this->addRequiredExternal('css', 'editor_dialog_advbimg');
$__output .= '
</head>
<body id="adv_bimg">

<form action="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '" method="post" onsubmit="AdvBimgDialog.submit(); return false;" class="section">
<h1 class="heading">' . 'Bimg Insertion Panel' . '</h1>
<div id="formbox">
	<div class="secondaryContent">
		<ul id="options_width">
			<li class="global">
				<span id="url_phrase">' . 'URL:' . '</span> <input id="ctrl_src" name="src" type="text" class="textCtrl mceFocus" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_urlfield_width') . '" />
				' . 'Width:' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /> <input id="ctrl_widthtype" name="widthtype" type="text" class="textCtrl" style="width:15px" readonly="true" value="px" />
			</li>
<!--
			<li class="standards">
			 <input id="ctrl_standards" name="standards" type="checkbox" value="" /> <span>' . 'Resize to Forum standards?' . '</span> 
			</li>
-->
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
			<input type="button" id="cancel" name="cancel" value="' . 'Hủy bỏ' . '" class="button" onclick="tinyMCEPopup.close();" />
		</div>
		<input type="submit" id="insert" name="insert" value="' . 'Chèn' . '" class="button primary" />
	</div>
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>

</body>
</html>';
