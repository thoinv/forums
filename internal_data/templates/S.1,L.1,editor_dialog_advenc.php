<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!DOCTYPE html>
<html class="editorPopup">
<head>
	<title>' . 'Text Box Insertion Panel' . '</title>

	<link rel="stylesheet" href="css.php?css=xenforo,public,form&amp;style=' . urlencode($_styleId) . '&amp;d=' . htmlspecialchars($visitorStyle['last_modified_date'], ENT_QUOTES, 'UTF-8') . '" />
	<!--XenForo_Require:CSS-->
	
	';
$__compilerVar1 = '';
$__compilerVar1 .= '	<script src="' . htmlspecialchars($jQuerySource, ENT_QUOTES, 'UTF-8') . '"></script>	
	';
if ($jQuerySource != $jQuerySourceLocal)
{
$__compilerVar1 .= '
		<script>if (!window.jQuery) { document.write(\'<scr\'+\'ipt type="text/javascript" src="' . htmlspecialchars($jQuerySourceLocal, ENT_QUOTES, 'UTF-8') . '"><\\/scr\'+\'ipt>\'); }</script>
	';
}
if ($xenOptions['uncompressedJs'] == 1 OR $xenOptions['uncompressedJs'] == 3)
{
$__compilerVar1 .= '
	<script src="' . htmlspecialchars($javaScriptSource, ENT_QUOTES, 'UTF-8') . '/jquery/jquery.xenforo.rollup.js?_v=' . htmlspecialchars($xenOptions['jsVersion'], ENT_QUOTES, 'UTF-8') . '"></script>';
}
$__compilerVar1 .= '	
	<script src="' . XenForo_Template_Helper_Core::callHelper('javaScriptUrl', array(
'0' => $javaScriptSource . '/xenforo/xenforo.js?_v=' . $xenOptions['jsVersion']
)) . '"></script>
';
if ($forum['node_id'] > 0)
{
$__compilerVar1 .= '<script>XenForo.node_name=\'' . XenForo_Template_Helper_Core::jsEscape($forum['title'], 'double') . ' (' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . ')\';</script>';
}
$__compilerVar1 .= '
<!--XenForo_Require:JS-->';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	<script> jQuery.extend(true, XenForo, { _csrfToken: "' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" }); </script>
	
	';
$this->addRequiredExternal('js', 'js/tinymce/tiny_mce_popup.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advenc_manager.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advenc_sender.js');
$__output .= '

	';
$this->addRequiredExternal('css', 'editor_dialog');
$__output .= '
	';
$this->addRequiredExternal('css', 'editor_dialog_advenc');
$__output .= '
</head>
<body id="adv_enc">

<form action="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '" method="post" onsubmit="AdvEncDialog.submit(); return false;" class="section">
<h1 class="heading">' . 'Text Box Insertion Panel' . '</h1>
<div id="formbox">
	<div style="width:100%" class="secondaryContent">
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
		<textarea name="text" id="ctrl_text" style="display: block; width: 98%; height: 72px; resize: none" class="textCtrl caption mceFocus"></textarea>
		
		<p class="info">' . 'Information:' . ' <span>' . 'This text box is a float element, so to display correctly it must be inserted before the main text block' . '</span></p>
	</div>
</div>
	<div class="sectionFooter">
		<div style="float: right">
			<input type="button" id="cancel" name="cancel" value="' . 'Cancel' . '" class="button" onclick="tinyMCEPopup.close();" />
		</div>
		<input type="submit" id="insert" name="insert" value="' . 'Insert' . '" class="button primary" />
	</div>
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>

</body>
</html>';
