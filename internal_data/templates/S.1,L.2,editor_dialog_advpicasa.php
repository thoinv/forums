<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!DOCTYPE html>
<html class="editorPopup">
<head>
	<title>' . 'Picasa Sideshow Insertion Panel' . '</title>

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
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advpicasa_manager.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advpicasa_sender.js');
$__output .= '

	';
$this->addRequiredExternal('css', 'editor_dialog');
$__output .= '
	';
$this->addRequiredExternal('css', 'editor_dialog_advpicasa');
$__output .= '
</head>
<body id="adv_picasa">

<form action="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '" method="post" onsubmit="AdvPicasaDialog.submit(); return false;" class="section">
	<h1 class="heading">' . 'Picasa Sideshow Insertion Panel' . '</h1>
	<div id="topbox" class="secondaryContent">
		<div id="picasa_src">' . 'Picasa url:' . ' <input id="ctrl_src" name="source" type="text" class="textCtrl mceFocus" style="width:385px" value="" /></div>
		<div id="picasa_options">
			<span id="picasa_width" class="picasa_option">' . 'Width:' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /></span> <span id="widthpx">px</span>
			<span id="picasa_height" class="picasa_option">' . 'Height:' . ' <input id="ctrl_height" name="height" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /></span> <span id="heightpx">px</span>
			<span id="picasa_int" class="picasa_option">' . 'Interval:' . ' <input id="ctrl_int" name="interval" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /></span> <span id="int_sec">' . 'second(s)' . '</span>
		</div>
	</div>
	<div class="sectionFooter">
		<input type="submit" id="insert" name="insert" value="' . 'Chèn' . '" class="button primary" />
		<div style="float: right">
			<input type="button" id="cancel" name="cancel" value="' . 'Hủy bỏ' . '" class="button" onclick="tinyMCEPopup.close();" />
		</div>
	</div>
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

</body>
</html>';
