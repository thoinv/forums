<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!DOCTYPE html>
<html class="editorPopup">
<head>
	<title>' . 'Sedo_AdvBBcodeBar_template_accordion_panel' . '</title>

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
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advaccordion_manager.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advaccordion_sender.js');
$__output .= '

	';
$this->addRequiredExternal('css', 'editor_dialog');
$__output .= '
	';
$this->addRequiredExternal('css', 'editor_dialog_advaccordionie6');
$__output .= '
</head>
<body id="adv_accordion">

<form action="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '" method="post" onsubmit="AdvAccordionDialog.submit(); return false;" class="section">
<div id="adv_mode">
	<select name="type" id="ctrl_mode" class="textCtrl">
		<option value="accordion">' . 'Accordion' . '</option>
		<option value="tabs">' . 'Tabs' . '</option>
	</select>
</div>
<h1 class="heading">' . 'Slides Insertion Panel' . '</h1>
<div id="formbox">
	<div style="100%" id="topbox" class="secondaryContent">
		<div id="menu_right">
			<div>' . 'Block align:' . '
				<select name="type" id="ctrl_blockalign" class="textCtrl">
					<option value="bleft">' . 'Normal left' . '</option>
					<option value="bcenter">' . 'Normal center' . '</option>
					<option value="bright">' . 'Normal right' . '</option>
					<option value="fleft">' . 'Float left' . '</option>
					<option value="fright">' . 'Float right' . '</option>
				</select>
			</div>
			<div id="createSlide"><div class="button_create">' . 'Add a slide' . '</div></div>
		</div>
		<div id="menu_left">
			<span>' . 'Block width: ' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /> <input id="ctrl_widthtype" name="widthtype" type="text" class="textCtrl" style="width:15px" readonly="true" value="px" /></span>
			<div id="MasterHeight" class="CMD_Height">
				' . 'Slides height:' . ' <input id="ctrl_height" name="height" type="text" class="textCtrl" style="width:100px" value="' . 'Full display' . '" /> <span class="heightpx">px</span>
			</div>
		</div>
	</div>
	<div class="primaryContent">
		<ul id="model" style="display:none">
			<li id="slide_replaceid" class="slide">
				<div class="slide_manage"><div class="button_x deleteSlide"><span>x</span></div><div id="id_replaceid" class="CMD_Id displayid">replaceid</div></div>
				<div class="slide_title">
					<ul class="title_options">
						<li class="CMD_Title">' . 'Title:' . ' <input id="slide_title_replaceid" name="slidetitlereplaceid" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="" /></li>
						<li class="CMD_Align">
							<ul class="align_options">
								<li><div class="align_button align_left align_select_left"></div></li>
								<li><div class="align_button align_center"></div></li>
								<li><div class="align_button align_right"></div></li>
							</ul>
							<input id="slide_align_replaceid" name="slidealignreplaceid" type="hidden" value="left" />
						</li>
						<li class="CMD_Height">' . 'Height:' . ' <input id="slide_height_replaceid" name="slideheightreplaceid" type="text" class="textCtrl" style="width:100px;text-align:center" value="' . 'Full display' . '" /> <span class="heightpx">px</span></li>
						<li class="CMD_Open"><div class="openbox"><input id="slide_open_replaceid" name="slideopenreplaceid" type="checkbox" value="open" /> ' . 'Open?' . '</div></li>
					</ul>
				</div>
				<div class="CMD_Content slide_content"><textarea id="slide_content_replaceid" name="slidecontentreplaceid" style="display: block; width: 98%; height: 15px; resize: none" class="textCtrl"></textarea></div>
			</li>
		</ul>
		<ul id="slides" class="slides_container">
			<li id="slide_1" class="slide">
				<div class="slide_manage"><div id="id_1" class="CMD_Id displayid">1</div></div>
				<div class="slide_title">
					<ul class="title_options">
						<li class="CMD_Title">' . 'Title:' . ' <input id="slide_title_1" name="slidetitle1" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="" /></li>
						<li class="CMD_Align">
							<ul class="align_options">
								<li><div class="align_button align_left align_select_left"></div></li>
								<li><div class="align_button align_center"></div></li>
								<li><div class="align_button align_right"></div></li>
							</ul>
							<input id="slide_align_replaceid" name="slidealignreplaceid" type="hidden" value="left" />
						</li>
						<li class="CMD_Height">' . 'Height:' . ' <input id="slide_height_1" name="slideheight1" type="text" class="textCtrl" style="width:100px;text-align:center" value="' . 'Full display' . '" /> <span class="heightpx">px</span></li>
						<li class="CMD_Open"><div class="openbox"><input id="slide_open_1" name="slideopen1" type="checkbox" value="open" /> ' . 'Open?' . '</div></li>
					</ul>
				</div>
				<div class="CMD_Content slide_content"><textarea id="slide_content_1" name="slidecontent1" style="display: block; width: 98%; height: 15px; resize: none" class="textCtrl mceFocus"></textarea></div>
			</li>
		</ul>
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
